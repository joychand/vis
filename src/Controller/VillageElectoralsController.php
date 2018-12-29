<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * VillageElectorals Controller
 *
 * @property \App\Model\Table\VillageElectoralsTable $VillageElectorals
 *
 * @method \App\Model\Entity\VillageElectoral[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillageElectoralsController extends AppController
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
            if (in_array($action, ['home','add', 'edit','delete','index','getvillage','ajaxFilterSubdivision','ajaxDelete']) && in_array($user['role_id'],[4,13,14,15])) {
                return true;
            }

            
        }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

     public function home()
     {
        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
       


     }

     /** index function */

     public function index()
    {
        $this->loadModel('Subdistricts');
        $subDivs=$this->Subdistricts->find('list'); 
        $villageElectorals = $this->VillageElectorals->find('all')
                      ->contain(['Villages'=>[
                          'fields'=>['Villages.village_name']
                      ]]);

        $this->set(compact('villageElectorals','subDivs'));
    }
    // public function index()
    // {
    //     $villageElectorals = $this->paginate($this->VillageElectorals->find('all')->contain(['Villages']));

    //     $this->set(compact('villageElectorals'));
    // }

    /**
     * View method
     *
     * @param string|null $id Village Electoral id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $villageElectoral = $this->VillageElectorals->get($id, [
            'contain' => []
        ]);

        $this->set('villageElectoral', $villageElectoral);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->session();
        
        
        $villageElectoral = $this->VillageElectorals->newEntity();
        $current_year = date('Y');
        $range = range($current_year, $current_year-10);
        $years = array_combine($range, $range);
        if ($this->request->is('post')) {
            $session->write('selected',$this->request->getData('subdistrict'));
            $session->write('selected_ref_yr',$this->request->getData('reference_year')); 
            $recordexist=$this->VillageElectorals->checkRecord($this->request->getData('reference_year'),$this->request->getData('village_code'));
            if($recordexist)
            {
             $this->Flash->error(__('The village election data already exist. Please goto edit to update data.'));
            }
            else
            {
                $villageElectoral = $this->VillageElectorals->patchEntity($villageElectoral, $this->request->getData());
                if ($this->VillageElectorals->save($villageElectoral)) {
                $this->Flash->success(__('The village electoral has been saved.'));
                
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The village electoral could not be saved. Please, try again.'));

            }
            
        }
        $this->subdistricts = TableRegistry::get('Subdistricts');
        $subdistricts=$this->subdistricts->find('list');
        $this->set(compact('subdistricts','years'));
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
        $this->set(compact('villageElectoral','selected','selected_ref_yr','villages'));
       
      
    }

    /**
     * Edit method
     *
     * @param string|null $id Village Electoral id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $villageElectoral = $this->VillageElectorals->get($id, [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $villageElectoral = $this->VillageElectorals->patchEntity($villageElectoral, $this->request->getData());
            if ($this->VillageElectorals->save($villageElectoral)) {
                $this->Flash->success(__('The village electoral has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The village electoral could not be saved. Please, try again.'));
        }
        $this->set(compact('villageElectoral'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Village Electoral id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $villageElectoral = $this->VillageElectorals->get($id);
        if ($this->VillageElectorals->delete($villageElectoral)) {
            $this->Flash->success(__('The village electoral has been deleted.'));
        } else {
            $this->Flash->error(__('The village electoral could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
           //$this->autoRender = false;
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
                      
            $query=$this->VillageElectorals
                   ->find('all')               
                   ->contain(['Villages'=>[
                       'fields'=>['Villages.village_name']]
                       ])->where(['VillageElectorals.village_code IN'=>$villages]);
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

            $electorals = $this->VillageElectorals->get($this->request->getData('id'));
            if ($this->VillageElectorals->delete($electorals)) {
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
