<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * EducationInfras Controller
 *
 * @property \App\Model\Table\EducationInfrasTable $EducationInfras
 *
 * @method \App\Model\Entity\EducationInfra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EducationInfrasController extends AppController
{

    /**
     * isAuthorized method
     * 
     */
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        //till now role_id are hardcoded.. needs to be updated with general function
        if (in_array($action, ['home','add', 'edit','delete','index']) && in_array($user['role_id'],[3,13,14])) {
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
        $educationInfras = $this->paginate($this->EducationInfras->find('all')->contain(['Villages']));

        $this->set(compact('educationInfras'));
    }

    /**
     * View method
     *
     * @param string|null $id Education Infra id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $educationInfra = $this->EducationInfras->get($id, [
            'contain' => []
        ]);

        $this->set('educationInfra', $educationInfra);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()

    {
        $session = $this->request->session();
        $educationInfras = $this->EducationInfras->newEntity();
        if ($this->request->is('post')) {
            if ($this->request->is('post')) {
                $session->write('selected',$this->request->getData('subdistrict'));
                $session->write('selected_ref_yr',$this->request->getData('education_reference_year'));  
                $recordexist=$this->EducationInfras->checkRecord($this->request->getData('education_reference_year'),$this->request->getData('village_code'));
               if($recordexist)
               {
                $this->Flash->error(__('The village Education Infras Data already exist. Please goto edit to update data.'));
               }
               else 
               {

                    $educationInfras = $this->EducationInfras->patchEntity($educationInfras, $this->request->getData());
                    if ($this->EducationInfras->save($educationInfras)) 
                    {
                
                        $this->Flash->success(__('The education infra has been saved.'));                
                    
                        return $this->redirect(['action' => 'add']);
                    }
                    $this->Flash->error(__('The education infra could not be saved. Please, try again.'));
               }
            
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
    $this->set(compact('educationInfras','selected','selected_ref_yr','villages'));
    $this->set(compact('subdistricts'));
}

    /**
     * Edit method
     *
     * @param string|null $id Education Infra id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $educationInfras = $this->EducationInfras->get($id, [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $educationInfras = $this->EducationInfras->patchEntity($educationInfras, $this->request->getData());
            if ($this->EducationInfras->save($educationInfras)) {
                $this->Flash->success(__('The education infra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The education infra could not be saved. Please, try again.'));
        }
        $this->set(compact('educationInfras'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Education Infra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $educationInfra = $this->EducationInfras->get($id);
        if ($this->EducationInfras->delete($educationInfra)) {
            $this->Flash->success(__('The education infra has been deleted.'));
        } else {
            $this->Flash->error(__('The education infra could not be deleted. Please, try again.'));
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

        $session->write('homecontroller', $this->request->params['controller']);
       
    }
}
