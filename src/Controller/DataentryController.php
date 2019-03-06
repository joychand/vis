<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\View\Helper\BreadcrumbsHelper;

/**
 * Dataentry Controller
 *
 *
 * @method \App\Model\Entity\Dataentry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DataentryController extends AppController
{


    /**  isAuthorised Method */
    public function isAuthorized($user){
        $action = $this->request->getParam('action');
            // The add and tags actions are always allowed to logged in users.
            if (in_array($action, ['home','getVillage','getEmptyVillage','ajaxGetvillage','ajaxFilterSubdivision','ajaxGetVillageProfile']) &&  in_array($user['role_id'],[13,15])) 
            {
                return true;
            }

    }
    //
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $dataentry = $this->paginate($this->Dataentry);

        $this->set(compact('dataentry'));
    }

    public function browse()
    {
        $this->Breadcrumbs->add('DataEntry',
        ['controller' => 'Dataentry', 'action' => 'data']);
    }

    /**
     * View method
     *
     * @param string|null $id Dataentry id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataentry = $this->Dataentry->get($id, [
            'contain' => []
        ]);

        $this->set('dataentry', $dataentry);
    }

    public function home(){
        $this->request->allowMethod(['get','post']);
        $session = $this->getRequest()->getSession();
        $session->write('homecontroller', $this->request->params['controller']);
        if ($this->request->is('post')) {
              $Cat=$this->request->getData('category');
             
              $session->write('category',$Cat);
             //dump($this->request->params['controller']);

              
              switch($Cat){
                  case 0: return $this->redirect(['controller'=>'Anganwadis','action' => 'add']);
                           break;

                  case 1: return $this->redirect(['controller'=>'FoodSecurities','action' => 'add']);
                           break;
                  case 2: return $this->redirect(['controller'=>'EducationInfras','action' => 'add']);
                          break;
                  case 3: return $this->redirect(['controller'=>'VillageElectorals','action' => 'add']);
                          break;  
                  case 4 : return $this->redirect(['controller'=>'HealthInfras','action' => 'add']);
                           break;
                  case 5:   $session = $this->getRequest()->getSession();
                            $session->write('agency',1);
                            return $this->redirect(['controller'=>'Nercormp','action' => 'add']);
                             break;
                  case 6: return $this->redirect(['controller'=>'Nregas','action' => 'add']);
                           break;
                  case 7: return $this->redirect(['controller'=>'VillageNsaps','action' => 'add']);
                           break;
                 case 8:   $session = $this->getRequest()->getSession();
                            $session->write('agency',3);
                            return $this->redirect(['controller'=>'Sdoreport','action' => 'add']);
                           break;
                 case 9: return $this->redirect(['controller'=>'VillageSchemes','action' => 'add']);
                           break;
                 case 10: 
                           $session = $this->getRequest()->getSession();
                           $session->write('agency',2);
                           return $this->redirect(['controller'=>'Securityreport','action' => 'add']);
                           break;
                case 11: 
                           $session = $this->getRequest()->getSession();
                           $session->write('agency',4);
                           return $this->redirect(['controller'=>'Census','action' => 'add']);
                           break;
                case 12: 
                           $session = $this->getRequest()->getSession();
                           $session->write('agency',5);
                           return $this->redirect(['controller'=>'Hillhouse','action' => 'add']);
                           break; 
                case 13: 
                          
                           return $this->redirect(['controller'=>'ConnectivityInfras','action' => 'add']);
                           break; 
                case 14: 
                          
                           return $this->redirect(['controller'=>'PowerInfras','action' => 'add']);
                           break; 
                case 15: 
                          
                           return $this->redirect(['controller'=>'VillageDisableInfos','action' => 'add']);
                           break;                                   
              }
              


        }
      
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['get','post']);
        $dataentry = $this->Dataentry->newEntity();
        if ($this->request->is('post')) {
            $dataentry = $this->Dataentry->patchEntity($dataentry, $this->request->getData());
            if ($this->Dataentry->save($dataentry)) {
                $this->Flash->success(__('The dataentry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dataentry could not be saved. Please, try again.'));
        }
        $this->set(compact('dataentry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dataentry id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataentry = $this->Dataentry->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataentry = $this->Dataentry->patchEntity($dataentry, $this->request->getData());
            if ($this->Dataentry->save($dataentry)) {
                $this->Flash->success(__('The dataentry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dataentry could not be saved. Please, try again.'));
        }
        $this->set(compact('dataentry'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dataentry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataentry = $this->Dataentry->get($id);
        if ($this->Dataentry->delete($dataentry)) {
            $this->Flash->success(__('The dataentry has been deleted.'));
        } else {
            $this->Flash->error(__('The dataentry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function demography(){
        $session = $this->getRequest()->getSession();
        $session_variable= $session->read('category');
        $this->set(compact('session_variable'));
    }
    
    public function socialwelfare(){
        $session = $this->getRequest()->getSession();
        $session_variable= $session->read('category');
        $this->set(compact('session_variable'));
    }

    public function education(){
        if ($this->request->is('post')) {
            $subdistrict=$this->request->getData('subdistrict');
            $session = $this->getRequest()->getSession();
            $session->write('subdist',$subdistrict);
            return $this->redirect(['controller'=>'EducationInfras','action'=>'add']);
            }
        $this->subdistricts = TableRegistry::get('Subdistricts');
        $subdistricts=$this->subdistricts->find('list');
        $session = $this->getRequest()->getSession();
        $session_variable= $session->read('category');
        $this->set(compact('session_variable'));
        $this->set(compact('subdistricts'));
    }

    public function scheme()
    {
       
        if ($this->request->is('post')) {
            $subdistrict=$this->request->getData('subdistrict');
            $session = $this->getRequest()->getSession();
            $session->write('subdist',$subdistrict);
            return $this->redirect(['controller'=>'VillageSchemes','action'=>'add']);
            }
        $this->subdistricts = TableRegistry::get('Subdistricts');
        $subdistricts=$this->subdistricts->find('list');
        $session = $this->getRequest()->getSession();
        $session_variable= $session->read('category');
        $this->set(compact('session_variable'));
        $this->set(compact('subdistricts'));
    }

    public function foodsecurity(){
        if ($this->request->is('post')) {
            $subdistrict=$this->request->getData('subdistrict');
            $session = $this->getRequest()->getSession();
            $session->write('subdist',$subdistrict);
            return $this->redirect(['controller'=>'FoodSecurities','action'=>'add']);
            }
        $this->subdistricts = TableRegistry::get('Subdistricts');
        $subdistricts=$this->subdistricts->find('list');
        $session = $this->getRequest()->getSession();
        $session_variable= $session->read('category');
        $this->set(compact('session_variable'));
        $this->set(compact('subdistricts'));
    }
    public function health(){
        if ($this->request->is('post')) {
            $subdistrict=$this->request->getData('subdistrict');
            $session = $this->getRequest()->getSession();
            $session->write('subdist',$subdistrict);
            return $this->redirect(['controller'=>'HealthInfras','action'=>'add']);
            }
        $this->subdistricts = TableRegistry::get('Subdistricts');
        $subdistricts=$this->subdistricts->find('list');
        $session = $this->getRequest()->getSession();
        $session_variable= $session->read('category');
        $this->set(compact('session_variable'));
        $this->set(compact('subdistricts'));

    }
}
