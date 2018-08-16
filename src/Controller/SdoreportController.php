<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\BreadcrumbsHelper;
use Cake\ORM\TableRegistry;

/**
 * Sdoreport Controller
 *
 *
 * @method \App\Model\Entity\Sdoreport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdoreportController extends AppController
{
    public function isAuthorized($user)
        {
            //dump($user);
            $action = $this->request->getParam('action');
            // The add and tags actions are always allowed to logged in users.
            if (in_array($action, ['home','add', 'edit','delete','index','getvillage']) && in_array($user['role_id'],[9,13,14])) {
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
        $this->populations=TableRegistry::get('populations');
        $session = $this->request->getSession();
        $agency_id= $session->read('agency');
        $sdoreports = $this->paginate($this->populations->find('all')
        ->where(['counting_agency'=>$agency_id])
        ->contain(['Villages']) );

        $this->set(compact('sdoreports'));
    }

    /**
     * View method
     *
     * @param string|null $id Sdoreport id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($reference_year = null,$village_code = null,$counting_agency = null)
    {
        $this->populations=TableRegistry::get('populations');
        $sdoreport = $this->populations->get([$reference_year,$village_code,$counting_agency], [
            'contain' => ['Villages']
        ]);

        $this->set('sdoreport', $sdoreport);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       
        $this->populations=TableRegistry::get('populations');
       
        $this->agencies=TableRegistry::get('agencies');
      
        $this->subdistricts = TableRegistry::get('Subdistricts');
      
        $subdistricts=$this->subdistricts->find('list');
        $sdoreport = $this->populations->newEntity();
        

        if ($this->request->is('post')) {
            $session = $this->request->session();
            $agency_id= $session->read('agency');
            $recordExist=$this->populations->checkRecord($this->request->getData('reference_year'),$this->request->getData('village_code'),$agency_id);
            $sdoreport = $this->populations->patchEntity($sdoreport, $this->request->getData());         
            $sdoreport->counting_agency=$agency_id;   
            if($recordExist){
                $this->Flash->error(__('This Village SDO Report data already exist. Please go to update view if for any changes'));
            }
            
            else if ($this->populations->save($sdoreport,['validate'=>true])) 
            {
                    $this->Flash->success(__('The Village SDO Report data has been saved.'));
                   // $this->set(compact('subdist_name'));
                    return $this->redirect(['action' => 'add']);
    
             }
             else{
                $this->Flash->error(__('The Village SDO Report data could not be saved. Please, try again.'));
             }

             
        }
        $this->set(compact('sdoreport'));
       // $this->set(compact('villages'));
        $this->set(compact('subdistricts'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Sdoreport id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($reference_year = null,$village_code = null,$counting_agency = null)
    {
        $this->populations=TableRegistry::get('populations');
        $sdoreport = $this->populations->get([$reference_year,$village_code,$counting_agency], [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdoreport = $this->populations->patchEntity($sdoreport, $this->request->getData());
            if ($this->populations->save($sdoreport)) {
                $this->Flash->success(__('The Village SDOReport has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Village SDOReport could not be updated. Please, try again.'));
        }
        $this->set(compact('sdoreport'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sdoreport id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($reference_year = null,$village_code = null,$counting_agency = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->populations=TableRegistry::get('populations');
        $sdoreport = $this->populations->get([$reference_year,$village_code,$counting_agency]);
        //$securityreport = $this->Securityreport->get($id);
        if ($this->populations->delete($sdoreport)) {
            $this->Flash->success(__('The  Village SDO Report has been deleted.'));
        } else {
            $this->Flash->error(__('The  Village SDO Report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function home (){
        $session = $this->getRequest()->getSession();
        $session->write('agency',3);
        

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
            ])->where(['sub_district_code'=>$subdist_code])->order(['village_name'=>'ASC']);

          
             header('Content-Type: application/json');
             echo json_encode($villages);
             exit();
        }
    }

    
}
