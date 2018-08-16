<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * VillageSchemes Controller
 *
 * @property \App\Model\Table\VillageSchemesTable $VillageSchemes
 *
 * @method \App\Model\Entity\VillageScheme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillageSchemesController extends AppController
{
    public function isAuthorized($user)
    {
        //dump($user);
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['home','add', 'edit','delete','index','getvillage']) && in_array($user['role_id'],[10,13,14])) {
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
        $villageSchemes = $this->paginate($this->VillageSchemes->find('all')
                          ->contain(['Villages','schemes']));

        $this->set(compact('villageSchemes'));
    }

    /**
     * View method
     *
     * @param string|null $id Village Scheme id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $villageScheme = $this->VillageSchemes->get($id, [
            'contain' => []
        ]);

        $this->set('villageScheme', $villageScheme);
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
        $schemes= $this->VillageSchemes->schemes->find('list',[
            'keyField'=>'scheme_code',
          'valueField'=>'scheme_name'
        ]);
                  //->select (['scheme_code','scheme_name']);
          //$schemes=$query->toList() ;
       //debug($schemes);
        $villageScheme = $this->VillageSchemes->newEntity();
        if ($this->request->is('post')) {
            $villageScheme = $this->VillageSchemes->patchEntity($villageScheme, $this->request->getData());
            if ($this->VillageSchemes->save($villageScheme)) {
                $this->Flash->success(__('The village scheme has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The village scheme could not be saved. Please, try again.'));
        }
        $this->set(compact('villageScheme'));
        $this->set(compact('subdistricts'));
        $this->set(compact('schemes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Village Scheme id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $villageScheme = $this->VillageSchemes->get($id, [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $villageScheme = $this->VillageSchemes->patchEntity($villageScheme, $this->request->getData());
            if ($this->VillageSchemes->save($villageScheme)) {
                $this->Flash->success(__('The village scheme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The village scheme could not be saved. Please, try again.'));
        }
        $this->set(compact('villageScheme'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Village Scheme id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $villageScheme = $this->VillageSchemes->get($id);
        if ($this->VillageSchemes->delete($villageScheme)) {
            $this->Flash->success(__('The village scheme has been deleted.'));
        } else {
            $this->Flash->error(__('The village scheme could not be deleted. Please, try again.'));
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

    public function home (){
        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
       
    }
}
