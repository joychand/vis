<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * FoodSecurities Controller
 *
 * @property \App\Model\Table\FoodSecuritiesTable $FoodSecurities
 *
 * @method \App\Model\Entity\FoodSecurity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodSecuritiesController extends AppController
{

    /** Initialization method */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        //$this->set('title','CAF&PD');
    }

  /** Authorization method */
    public function isAuthorized($user)
    {
        //dump($user);
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'edit','delete','home','index','ajaxFilterSubdivision','ajaxDelete']) &&  in_array($user['role_id'],[2,13,14]) ) {
            return true;
        }
        
        
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Subdistricts');
        $subDivs=$this->Subdistricts->find('list'); 
        $foodSecurities = $this->FoodSecurities->find('all')
                      ->contain(['Villages'=>[
                          'fields'=>['Villages.village_name']
                      ]]);

        $this->set(compact('foodSecurities','subDivs'));

       // $this->set(compact(''));
    }

    /**
     * View method
     *
     * @param string|null $id Food Security id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $foodSecurity = $this->FoodSecurities->get($id, [
            'contain' => []
        ]);

        $this->set('foodSecurity', $foodSecurity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()

    {   
        $session = $this->request->session();
        
        $cat =$this->getRequest()->getSession()->read('category');
      
        $foodSecurity = $this->FoodSecurities->newEntity();
        if ($this->request->is('post')) {
            $session->write('selected',$this->request->getData('subdistrict'));
            $session->write('selected_ref_yr',$this->request->getData('reference_year'));  
            $recordexist=$this->FoodSecurities->checkRecord($this->request->getData('reference_year'),$this->request->getData('village_code'));
            if($recordexist)
            {
             $this->Flash->error(__('The village CAF & PD Data already exist. Please goto edit to update data.'));
            }
            else {
                $foodSecurity = $this->FoodSecurities->patchEntity($foodSecurity, $this->request->getData());
                if ($this->FoodSecurities->save($foodSecurity)) {
                    $this->Flash->success(__('The CAF&PD data has been saved.'));
                    $this->set(compact('subdist_name'));
                    return $this->redirect(['action' => 'add']);
                }
                $this->Flash->error(__('The CAF&PD data could not be saved. Please, try again.'));

            }
           
        }

        $this->subdistricts = TableRegistry::get('Subdistricts');
        $subdistricts=$this->subdistricts->find('list');
        if(!$session->check('selected') && $session->check('selected_ref_yr') )
        {
            $selected=null;
            $selected_ref_yr=null;
            $villages=null;
        }
        else
        {
            $selected=$session->consume('selected');
            $this->villages=TableRegistry::get('Villages');
            $villages=$this->villages->find('list',[
                'keyField'=>'village_code',
                'valueField'=>'village_name'
            ])->where(['sub_district_code'=>$selected])
            ->order(['villages.village_name'=>'ASC']);
             // dump ($villages);
            $selected_ref_yr=$session->consume('selected_ref_yr');
           // dump($selected);
        }
        $this->set(compact('foodSecurity','selected','selected_ref_yr','villages'));
        $this->set(compact('subdistricts'));
        $this->set(compact('cat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Food Security id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $foodSecurity = $this->FoodSecurities->get($id, [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foodSecurity = $this->FoodSecurities->patchEntity($foodSecurity, $this->request->getData());
            if ($this->FoodSecurities->save($foodSecurity)) {
                $this->Flash->success(__('The food security has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food security could not be saved. Please, try again.'));
        }
        $this->set(compact('foodSecurity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Food Security id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $foodSecurity = $this->FoodSecurities->get($id);
        if ($this->FoodSecurities->delete($foodSecurity)) {
            $this->Flash->success(__('The food security has been deleted.'));
        } else {
            $this->Flash->error(__('The food security could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function home()
    {
        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
       
    }
    public function getvillage()
    {
        
        $this->villages=TableRegistry::get('Villages');
        
        if ($this->request->is(['ajax', 'post'])) 
        {
            
            $subdist_code = $this->request->getData('subdistrict_code');
            $villages=$this->villages->find('list',[
                'keyField'=>'village_code',
                'valueField'=>'village_name'
            ])->where(['sub_district_code'=>$subdist_code]);

          
             header('Content-Type: application/json');
             echo json_encode($villages);
             exit();
        }
    }

    public function ajaxFilterSubdivision()
    {
       
        if ($this->request->is(['ajax', 'post'])) 
        {
           // $this->autoRender = false;
            $this->loadModel('Subdistricts');
            $this->loadModel('Villages');
          
          if($this->request->getData('subdistrict_code')){
            $subdist_code = $this->request->getData('subdistrict_code');
            $villages=$this->Villages->find()
                 ->select(['village_code'])
                 ->distinct()
                 ->where(['sub_district_code'=> $subdist_code]);
          }
           
          else{
            $villages=$this->Villages->find()
            ->select(['village_code'])
            ->distinct();
          }
                      
            $query=$this->FoodSecurities
                   ->find('all')               
                   ->contain(['Villages'=>[
                       'fields'=>['Villages.village_name']]
                       ])->where(['FoodSecurities.village_code IN'=>$villages]);
           // debug($query);
            $this->set('query',$query);
            $this->set('_serialize', 'query');

        }
       
       
      
        
    }

    public function ajaxDelete()
    {
       // $this->autoRender = false;
       // $this->layout='ajax';
        $mesg="Delete Fail";
        
       // $this->request->allowMethod(['post', 'delete']);
        if ($this->request->is(['ajax', 'post'])) 
        {

            $foodsecurity = $this->FoodSecurities->get($this->request->getData('id'));
            if ($this->FoodSecurities->delete($foodsecurity)) {
               $mesg="Delete Success";
            } 
            else 
            {
               $mesg="Delete Fail";
            }
        }
        $this->set('mesg',$mesg);
        $this->set('_serialize', 'mesg');

       
    }
}
