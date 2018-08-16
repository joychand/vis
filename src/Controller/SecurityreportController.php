<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Securityreport Controller
 *
 *
 * @method \App\Model\Entity\Securityreport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SecurityreportController extends AppController
{
    public function isAuthorized($user)
    {
        //dump($user);
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['home','add', 'edit','delete','index','getvillage']) && in_array($user['role_id'],[11,13,14])) {
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
       // $securityreport = $this->paginate($this->Securityreport);
        $this->populations=TableRegistry::get('populations');
        $session = $this->request->getSession();
        $agency_id= $session->read('agency');
        $securityreports = $this->paginate($this->populations->find('all')
        ->where(['counting_agency'=>$agency_id])
        ->contain(['Villages']) );

        //$this->set(compact('sdoreports'));
        $this->set(compact('securityreports'));
    }

    /**
     * View method
     *
     * @param string|null $id Securityreport id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $securityreport = $this->Securityreport->get($id, [
            'contain' => []
        ]);

        $this->set('securityreport', $securityreport);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       // $securityreport = $this->Securityreport->newEntity();
        $this->subdistricts = TableRegistry::get('Subdistricts');
        $this->populations=TableRegistry::get('populations');
       // $this->villages=TableRegistry::get('Villages');
      //  $this->agencies=TableRegistry::get('agencies');
       // $session = $this->request->session();
        //$village_name=$this->populations->villages->()
        //$subdist_code= $session->read('subdist');
       // $villages=$this->villages->find('list',[
           // 'keyField'=>'village_code',
           // 'valueField'=>'village_name'
        //])->where(['sub_district_code'=>$subdist_code]);
        //$this->subdistricts = TableRegistry::get('Subdistricts');
      
        $subdistricts=$this->subdistricts->find('list');
        $securityreport  = $this->populations->newEntity();
        

        if ($this->request->is('post')) {
            $session = $this->request->session();
            $agency_id= $session->read('agency');
            $recordExist=$this->populations->checkRecord($this->request->getData('reference_year'),$this->request->getData('village_code'),$agency_id);
            $securityreport  = $this->populations->patchEntity($securityreport, $this->request->getData());         
            $securityreport->counting_agency=$agency_id;   
            if($recordExist){
                $this->Flash->error(__('This Village Security Report data already exist. Please go to update view if for any changes'));
            }
            
            else if ($this->populations->save($securityreport ,['validate'=>true])) 
            {
                    $this->Flash->success(__('The Village Security Report data has been saved.'));
                   // $this->set(compact('subdist_name'));
                    return $this->redirect(['action' => 'add']);
    
             }
             else{
                $this->Flash->error(__('The Village Security Report data could not be saved. Please, try again.'));
             }

             
        }
        $this->set(compact('securityreport'));
       // $this->set(compact('villages'));
        $this->set(compact('subdistricts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Securityreport id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($reference_year = null,$village_code = null,$counting_agency = null)
    {
        $this->populations=TableRegistry::get('populations');
        $securityreport = $this->populations->get([$reference_year,$village_code,$counting_agency], [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $securityreport = $this->populations->patchEntity($securityreport, $this->request->getData());
            if ($this->populations->save($securityreport)) {
                $this->Flash->success(__('The Village SDOReport has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Village SDOReport could not be updated. Please, try again.'));
        }
        $this->set(compact('securityreport'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Securityreport id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($reference_year = null,$village_code = null,$counting_agency = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->populations=TableRegistry::get('populations');
        $securityreport = $this->populations->get([$reference_year,$village_code,$counting_agency]);
        //$securityreport = $this->Securityreport->get($id);
        if ($this->populations->delete($securityreport)) {
            $this->Flash->success(__('The securityreport has been deleted.'));
        } else {
            $this->Flash->error(__('The securityreport could not be deleted. Please, try again.'));
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

    public function home()
    {
        $session = $this->getRequest()->getSession();
        $session->write('agency',2);
        $session->write('homecontroller', $this->request->params['controller']);
       
    }
}
