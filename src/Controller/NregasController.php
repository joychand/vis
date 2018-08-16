<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Nregas Controller
 *
 * @property \App\Model\Table\NregasTable $Nregas
 *
 * @method \App\Model\Entity\Nrega[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NregasController extends AppController
{

    public function isAuthorized($user)
        {
            //dump($user);
            $action = $this->request->getParam('action');
            // The add and tags actions are always allowed to logged in users.
            if (in_array($action, ['home','add', 'edit','delete','index','getvillage']) && in_array($user['role_id'],[7,13,14])) {
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
        $nregas = $this->paginate($this->Nregas->find('all')
                  ->contain(['Villages']));

        $this->set(compact('nregas'));
    }

    /**
     * View method
     *
     * @param string|null $id Nrega id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nrega = $this->Nregas->get($id, [
            'contain' => []
        ]);

        $this->set('nrega', $nrega);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()

    {
        $this->subdistricts = TableRegistry::get('Subdistricts');
        $subdistricts=$this->subdistricts->find('list');
      
        
        $nrega = $this->Nregas->newEntity();
        if ($this->request->is('post')) {
            $recordExist=$this->Nregas->checkRecord($this->request->getData('nrega_reference_year'),$this->request->getData('village_code'));
            if($recordExist)
           {
            $this->Flash->error(__('The village nrega data already exist. Please goto edit to update data.'));
           }
           else {

            $nrega = $this->Nregas->patchEntity($nrega, $this->request->getData());
            if ($this->Nregas->save($nrega)) {
                $this->Flash->success(__('The nrega has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nrega could not be saved. Please, try again.'));

           }
            
        }
        $this->set(compact('nrega'));
        $this->set(compact('subdistricts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nrega id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nrega = $this->Nregas->get($id, [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nrega = $this->Nregas->patchEntity($nrega, $this->request->getData());
            if ($this->Nregas->save($nrega)) {
                $this->Flash->success(__('The nrega has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nrega could not be saved. Please, try again.'));
        }
        $this->set(compact('nrega'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nrega id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nrega = $this->Nregas->get($id);
        if ($this->Nregas->delete($nrega)) {
            $this->Flash->success(__('The nrega has been deleted.'));
        } else {
            $this->Flash->error(__('The nrega could not be deleted. Please, try again.'));
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
            ])->where(['sub_district_code'=>$subdist_code])->order(['village_name'=>'ASC']);

          
             header('Content-Type: application/json');
             echo json_encode($villages);
             exit();
        }
    }
}
