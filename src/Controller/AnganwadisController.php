<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Anganwadis Controller
 *
 * @property \App\Model\Table\AnganwadisTable $Anganwadis
 *
 * @method \App\Model\Entity\Anganwadi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnganwadisController extends AppController
{
    //public $helpers = array('Js');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
   public function initialize()
    {
       parent::initialize();
       $this->loadComponent('RequestHandler');
       //$this->loadComponent('Security');
   }
    public function beforeFilter(Event $event)
    {
       if( $this->request->is('ajax')){
            $this->getEventManager()->off($this->Csrf);
        }

        
    }
    
     
    public function isAuthorized($user)
        {
            //dump($user);
            $action = $this->request->getParam('action');
            // The add and tags actions are always allowed to logged in users.
            if (in_array($action, ['home','add', 'edit','delete','index','getvillage','ajaxDelete']) && in_array($user['role_id'],[1,13,14])) {
                return true;
            }

            
        }

    public function index()
    {
        $this->loadModel('Subdistricts');
        $subDivs=$this->Subdistricts->find('list'); 
        $anganwadis = $this->Anganwadis->find('all')
                      ->contain(['Villages'=>[
                          'fields'=>['Villages.village_name']
                      ]]);

        $this->set(compact('anganwadis','subDivs'));
    }

    /**
     * View method
     *
     * @param string|null $id Anganwadi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anganwadi = $this->Anganwadis->get($id, [
            'contain' => []
        ]);

        $this->set('anganwadi', $anganwadi);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $session = $this->request->session();
        $anganwadi = $this->Anganwadis->newEntity();
        if ($this->request->is('post')) {
            $session->write('selected',$this->request->getData('subdistrict'));
            $session->write('selected_ref_yr',$this->request->getData('anganwadi_reference_year')); 
            $recordexist=$this->Anganwadis->checkRecord($this->request->getData('anganwadi_reference_year'),$this->request->getData('village_code'));
            if($recordexist)
            {
             $this->Flash->error(__('The village Anganwadis Data already exist. Please goto edit to update data.'));
            }
          else
          {
            $anganwadi = $this->Anganwadis->patchEntity($anganwadi, $this->request->getData());
            if ($this->Anganwadis->save($anganwadi)) {
                $this->Flash->success(__('The Village Anganwadi has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The Village anganwadi could not be saved. Please, try again.'));

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
        $this->set(compact('anganwadi','selected','selected_ref_yr','villages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Anganwadi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anganwadi = $this->Anganwadis->get($id, [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $anganwadi = $this->Anganwadis->patchEntity($anganwadi, $this->request->getData());
            if ($this->Anganwadis->save($anganwadi)) {
                $this->Flash->success(__('The anganwadi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The anganwadi could not be saved. Please, try again.'));
        }
        $this->set(compact('anganwadi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Anganwadi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $anganwadi = $this->Anganwadis->get($id);
        if ($this->Anganwadis->delete($anganwadi)) {
            $this->Flash->success(__('The anganwadi has been deleted.'));
        } else {
            $this->Flash->error(__('The anganwadi could not be deleted. Please, try again.'));
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

    public function home()
    {
        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
       

    }

    public function ajaxFilterSubdivision()
    {
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
                  
        $query=$this->Anganwadis
               ->find()
               ->select(['anganwadi_id','anganwadi_reference_year','total_anganwadi_centre','total_anganwadi_worker','total_enrolled_children','anganwadi_worker_name',
                        'worker_mobile'])
               ->contain(['Villages'=>[
                   'fields'=>['Villages.village_name']]
                   ])->where(['Anganwadis.village_code IN'=>$villages]);
       // debug($query);
        $this->set('query',$query);
        $this->set('_serialize', 'query');
      
        
    }

    public function ajaxDelete()
    {
        $mesg="Delete Fail";

       // $this->request->allowMethod(['post', 'delete']);
        if ($this->request->is(['ajax', 'post'])) 
        {

            $anganwadi = $this->Anganwadis->get($this->request->getData('id'));
            if ($this->Anganwadis->delete($anganwadi)) {
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
