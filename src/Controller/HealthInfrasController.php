<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * HealthInfras Controller
 *
 * @property \App\Model\Table\HealthInfrasTable $HealthInfras
 *
 * @method \App\Model\Entity\HealthInfra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HealthInfrasController extends AppController
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
           
            if (in_array($action, ['home','add', 'edit','delete','index','getvillage','ajaxFilterSubdivision','ajaxDelete']) && in_array($user['role_id'],[5,13,14,15])) {
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
        $healthInfras = $this->HealthInfras->find('all')
                      ->contain(['Villages'=>[
                          'fields'=>['Villages.village_name']
                      ]]);       

        $this->set(compact('healthInfras','subDivs'));
    }

    /**
     * View method
     *
     * @param string|null $id Health Infra id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $healthInfra = $this->HealthInfras->get($id, [
            'contain' => []
        ]);

        $this->set('healthInfra', $healthInfra);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       
        $session = $this->request->session();
        $healthInfra = $this->HealthInfras->newEntity();
        if ($this->request->is('post')) {
           
            $session->write('selected',$this->request->getData('subdistrict'));
            $session->write('selected_ref_yr',$this->request->getData('health_reference_year'));  
            $recordexist=$this->HealthInfras->checkRecord($this->request->getData('health_reference_year'),$this->request->getData('village_code'));
           if($recordexist)
           {
            $this->Flash->error(__('The village Health record already exist. Please goto edit to update data.'));
           }
           else
           {
            $healthInfra = $this->HealthInfras->patchEntity($healthInfra, $this->request->getData());
            if ($this->HealthInfras->save($healthInfra)) {
                $this->Flash->success(__('The health infra has been saved.'));
              

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The health infra could not be saved. Please, try again.'));

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
        $this->set(compact('healthInfra','selected','selected_ref_yr','villages'));
        $this->set(compact('subdistricts'));
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Health Infra id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $healthInfra = $this->HealthInfras->get($id, [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $healthInfra = $this->HealthInfras->patchEntity($healthInfra, $this->request->getData());
            if ($this->HealthInfras->save($healthInfra)) {
                $this->Flash->success(__('The health infra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The health infra could not be saved. Please, try again.'));
        }
        $this->set(compact('healthInfra'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Health Infra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $healthInfra = $this->HealthInfras->get($id);
        if ($this->HealthInfras->delete($healthInfra)) {
            $this->Flash->success(__('The health infra has been deleted.'));
        } else {
            $this->Flash->error(__('The health infra could not be deleted. Please, try again.'));
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
            ])->where(['sub_district_code'=>$subdist_code])->order(['village_name'=>'ASC']);

          
             header('Content-Type: application/json');
             echo json_encode($villages);
             exit();
        }
    }

    public function home()
    {
        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
        
       
        
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
                      
            $query=$this->HealthInfras
                   ->find('all')               
                   ->contain(['Villages'=>[
                       'fields'=>['Villages.village_name']]
                       ])->where(['HealthInfras.village_code IN'=>$villages]);
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

            $healthInfra = $this->HealthInfras->get($this->request->getData('id'));
            if ($this->HealthInfras->delete($healthInfra)) {
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
