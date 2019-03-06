<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;


/**
 * Nregas Controller
 *
 * @property \App\Model\Table\NregasTable $Nregas
 *
 * @method \App\Model\Entity\Nrega[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NregasController extends AppController
{
    public function initialize()
    {
       parent::initialize();
       $this->loadComponent('RequestHandler');
       $this->loadComponent('Security');
   }
   public function beforeFilter(Event $event)
   {
    parent::beforeFilter($event);
 
 
         /** To disable form change detection for ajax method */
         $this->Security->setConfig('unlockedActions', ['getvillage','ajaxDelete','ajaxFilterSubdivision']);
      
       
   }


    public function isAuthorized($user)
        {
            //dump($user);
            $action = $this->request->getParam('action');
            // The add and tags actions are always allowed to logged in users.
            if (in_array($action, ['home','add', 'edit','delete','index','getvillage','ajaxFilterSubdivision','ajaxDelete']) && in_array($user['role_id'],[7,13,14,15])) {
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
        $this->request->allowMethod(['get','post']);

        $this->loadModel('Subdistricts');
        $subDivs=$this->Subdistricts->find('list'); 
        $nregas = $this->Nregas->find('all')
                      ->contain(['Villages'=>[
                          'fields'=>['Villages.village_name']
                      ]]);       

        $this->set(compact('nregas','subDivs'));

        // $nregas = $this->paginate($this->Nregas->find('all')
        //           ->contain(['Villages']));

        // $this->set(compact('nregas'));
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
        $this->request->allowMethod(['get','post']);

        $session = $this->request->session();
        $current_year = date('Y');
        $range = range($current_year, $current_year-10);
        $years = array_combine($range, $range);  
      
        
        $nrega = $this->Nregas->newEntity();
        if ($this->request->is('post')) {
            $session->write('selected',$this->request->getData('subdistrict'));
            $session->write('selected_ref_yr',$this->request->getData('nrega_reference_year'));  
            $recordExist=$this->Nregas->checkRecord($this->request->getData('nrega_reference_year'),$this->request->getData('village_code'));
            if($recordExist)
           {
            $this->Flash->error(__('The village nrega data already exist. Please goto edit to update data.'));
           }
           else {

            $nrega = $this->Nregas->patchEntity($nrega, $this->request->getData());
            if ($this->Nregas->save($nrega)) {
                $this->Flash->success(__('The nrega has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The nrega could not be saved. Please, try again.'));

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
        $this->set(compact('nrega','selected','selected_ref_yr','villages'));
        $this->set(compact('subdistricts','years'));
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
        $this->request->allowMethod(['get','post','put']);

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
        $this->request->allowMethod(['get','post']);

        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
       
    
   }
   public function getvillage()
    {
        $this->request->allowMethod(['post']);

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

    public function ajaxFilterSubdivision()
    {
        $this->request->allowMethod(['post']);

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
                      
            $query=$this->Nregas
                   ->find('all')               
                   ->contain(['Villages'=>[
                       'fields'=>['Villages.village_name']]
                       ])->where(['Nregas.village_code IN'=>$villages]);
           // debug($query);
            $this->set('query',$query);
            $this->set('_serialize', 'query');

        }
       
       
      
        
    }

    public function ajaxDelete()
    {
        $this->request->allowMethod(['delete','post']);

       // $this->autoRender = false;
       // $this->layout='ajax';
        $mesg="Delete Fail";
        
       // $this->request->allowMethod(['post', 'delete']);
        if ($this->request->is(['ajax', 'post'])) 
        {

            $nrega = $this->Nregas->get($this->request->getData('id'));
            if ($this->Nregas->delete($nrega)) {
               $mesg="Delete Success";
            } 
            else 
            {
               $mesg="Delete Fail";
            }
        }
        $this->RequestHandler->renderAs($this, 'json');
        $this->set('mesg',$mesg);
        $this->set('_serialize', 'mesg');

       
    }

   
}
