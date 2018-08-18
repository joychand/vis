<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\BreadcrumbsHelper;
use Cake\ORM\TableRegistry;

/**
 * Nercormp Controller
 *
 *
 * @method \App\Model\Entity\Nercormp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NercormpController extends AppController
{

    public function isAuthorized($user)
        {
            //dump($user);
            $action = $this->request->getParam('action');
            // The add and tags actions are always allowed to logged in users.
            if (in_array($action, ['home','add', 'edit','delete','index','getvillage']) && in_array($user['role_id'],[6,13,14])) {
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
        $nercormps = $this->paginate($this->populations->find('all')
        ->where(['counting_agency'=>$agency_id])
        ->contain(['Villages']) );
        $this->set(compact('nercormps'));
    }

    /**
     * View method
     *
     * @param string|null $id Nercormp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nercormp = $this->Nercormp->get($id, [
            'contain' => []
        ]);

        $this->set('nercormp', $nercormp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()

    {   
        $session = $this->request->session();
        $this->populations=TableRegistry::get('populations');
       
      
      
        
       
        $nercormp = $this->populations->newEntity();
        if ($this->request->is('post')) {
            $session->write('selected',$this->request->getData('subdistrict'));
            $session->write('selected_ref_yr',$this->request->getData('reference_year'));  
            $agency_id= $session->read('agency');
            $recordExist=$this->populations->checkRecord($this->request->getData('reference_year'),$this->request->getData('village_code'),$agency_id);
            $nercormp = $this->populations->patchEntity($nercormp, $this->request->getData());
            $nercormp->counting_agency=$agency_id;  
            if($recordExist){
                $this->Flash->error(__('This Village NERCORMP data already exist. Please go to update view if for any changes'));
            }
            else
             {
                if ($this->populations->save($nercormp)) {
                    $this->Flash->success(__('The Village data has been saved.'));
                    $this->set(compact('subdist_name'));
                    return $this->redirect(['action' => 'add']);
                }
                $this->Flash->error(__('The data could not be saved. Please, try again.'));

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
            ->order(['villages.village_code'=>'ASC']);
             // dump ($villages);
            $selected_ref_yr=$session->consume('selected_ref_yr');
           // dump($selected);
        }
        $this->set(compact('nercormp','selected','selected_ref_yr','villages'));
        $this->set(compact('subdistricts'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Nercormp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($reference_year = null,$village_code = null,$counting_agency = null)
    {
        $this->populations=TableRegistry::get('populations');
        $nercormp = $this->populations->get([$reference_year,$village_code,$counting_agency], [
            'contain' => ['Villages']
        ]);
       
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nercormp = $this->populations->patchEntity($nercormp, $this->request->getData());
            if ($this->populations->save($nercormp)) {
                $this->Flash->success(__('The nercormp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nercormp could not be saved. Please, try again.'));
        }
        $this->set(compact('nercormp'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nercormp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($reference_year = null,$village_code = null,$counting_agency = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->populations=TableRegistry::get('populations');
        debug($village_code);
        $nercormp = $this->populations->get([$reference_year,$village_code,$counting_agency]);
        debug($nercormp);
        if ($this->populations->delete($nercormp)) {
            $this->Flash->success(__('The nercormp has been deleted.'));
        } else {
            $this->Flash->error(__('The nercormp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function home()
    {
        $session = $this->getRequest()->getSession();
         $session->write('agency',1);
        

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
