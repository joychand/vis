<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * PowerInfras Controller
 *
 * @property \App\Model\Table\PowerInfrasTable $PowerInfras
 *
 * @method \App\Model\Entity\PowerInfra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PowerInfrasController extends AppController
{

    public function initialize()
    {
       parent::initialize();
       $this->loadComponent('RequestHandler');
       //$this->loadComponent('Security');
   }


    public function isAuthorized($user)
    {
        //dump($user);
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['home','add', 'edit','delete','index','getvillage','ajaxFilterSubdivision','ajaxDelete']) && in_array($user['role_id'],[7,13,14,15])) {
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
        $powerInfras = $this->PowerInfras->find('all')->contain(['Villages'=>['fields'=>['Villages.village_name'] ]]);

        $this->set(compact('powerInfras','subDivs'));
    }

    /**
     * View method
     *
     * @param string|null $id Power Infra id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $powerInfra = $this->PowerInfras->get($id, [
            'contain' => []
        ]);

        $this->set('powerInfra', $powerInfra);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()

    {
        $session = $this->request->session();
       
        $current_year = date('Y');
        $range = range($current_year, $current_year-10);
        $years = array_combine($range, $range);
        $powerInfra = $this->PowerInfras->newEntity();
        if ($this->request->is('post')) 
        {

            $session->write('selected',$this->request->getData('subdistrict'));
            $session->write('selected_ref_yr',$this->request->getData('reference_year')); 
            $recordexist=$this->PowerInfras->checkRecord($this->request->getData('reference_year'),$this->request->getData('village_code'));
            if($recordexist)
                {
                    $this->Flash->error(__('The village Power Infra Data already exist. Please goto edit to update data.'));
                }
            else
                {
                    $powerInfra = $this->PowerInfras->patchEntity($powerInfra, $this->request->getData());
                    if ($this->PowerInfras->save($powerInfra)) {
                        $this->Flash->success(__('The power infra has been saved.'));
        
                        return $this->redirect(['action' => 'add']);
                    }
                    $this->Flash->error(__('The power infra could not be saved. Please, try again.'));

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
      
        $this->set(compact('subdistricts'));
        $this->set(compact('powerInfra','selected','selected_ref_yr','villages','years'));

       // $this->set(compact('powerInfra'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Power Infra id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $powerInfra = $this->PowerInfras->get($id, [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $powerInfra = $this->PowerInfras->patchEntity($powerInfra, $this->request->getData());
            if ($this->PowerInfras->save($powerInfra)) {
                $this->Flash->success(__('The power infra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The power infra could not be saved. Please, try again.'));
        }
        $this->set(compact('powerInfra'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Power Infra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $powerInfra = $this->PowerInfras->get($id);
        if ($this->PowerInfras->delete($powerInfra)) {
            $this->Flash->success(__('The power infra has been deleted.'));
        } else {
            $this->Flash->error(__('The power infra could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getvillage()
    {
        
        $this->villages=TableRegistry::get('Villages');
        
        if ($this->request->is(['ajax', 'post'])) 
        {
            
            $subdist_code = $this->request->getData('subdistrict_code');
            $query=$this->villages->find('list',[
                'keyField'=>'village_code',
                'valueField'=>'village_name'
            ])->where(['sub_district_code'=>$subdist_code])
            ->order(['villages.village_name'=>'ASC']);
            $villages=$query->toArray();
           
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
                      
            $query=$this->PowerInfras
                   ->find('all')               
                   ->contain(['Villages'=>[
                       'fields'=>['Villages.village_name']]
                       ])->where(['PowerInfras.village_code IN'=>$villages]);
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

            $powerinfra = $this->PowerInfras->get($this->request->getData('id'));
            if ($this->PowerInfras->delete($powerinfra)) {
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
