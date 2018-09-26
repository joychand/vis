<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * VillageNsaps Controller
 *
 * @property \App\Model\Table\VillageNsapsTable $VillageNsaps
 *
 * @method \App\Model\Entity\VillageNsap[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillageNsapsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    public function isAuthorized($user)
        {
            //dump($user);
            $action = $this->request->getParam('action');
            // The add and tags actions are always allowed to logged in users.
            if (in_array($action, ['home','add', 'edit','delete','index','getvillage','ajaxFilterSubdivision','ajaxDelete']) && in_array($user['role_id'],[8,13,14])) {
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
        $villageNsaps = $this->VillageNsaps->find('all')
                      ->contain(['Villages'=>[
                          'fields'=>['Villages.village_name']
                      ]]);       

        $this->set(compact('villageNsaps','subDivs'));




        // $villageNsaps = $this->paginate($this->VillageNsaps->find('all')
        //                 ->contain(['Villages']));

        // $this->set(compact('villageNsaps'));
    }

    /**
     * View method
     *
     * @param string|null $id Village Nsap id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $villageNsap = $this->VillageNsaps->get($id, [
            'contain' => []
        ]);

        $this->set('villageNsap', $villageNsap);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->session();
        $villageNsap = $this->VillageNsaps->newEntity();

        if ($this->request->is('post')) {
            $session->write('selected',$this->request->getData('subdistrict'));
            $session->write('selected_ref_yr',$this->request->getData('reference_year')); 
            $recordexist=$this->VillageNsaps->checkRecord($this->request->getData('reference_year'),$this->request->getData('village_code'));
           if($recordexist)
           {
            $this->Flash->error(__('The village nsap already exist. Please goto edit to update data.'));
           }
           else 
           {
            $villageNsap = $this->VillageNsaps->patchEntity($villageNsap, $this->request->getData());
            if ($this->VillageNsaps->save($villageNsap)) {
                $this->Flash->success(__('The village nsap has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The village nsap could not be saved. Please, try again.'));

           }
           
        }
        $this->subdistricts = TableRegistry::get('Subdistricts');
        
        $subdistricts=$this->subdistricts->find('list');
        $this->set(compact('subdistricts'));
        if(!$session->check('selected') && $session->check('selected_ref_yr') ) //check if not postback
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
        $this->set(compact('villageNsap','villages','selected','selected_ref_yr'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Village Nsap id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $villageNsap = $this->VillageNsaps->get($id, [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $villageNsap = $this->VillageNsaps->patchEntity($villageNsap, $this->request->getData());
            if ($this->VillageNsaps->save($villageNsap)) {
                $this->Flash->success(__('The village nsap has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The village nsap could not be saved. Please, try again.'));
        }
        $this->set(compact('villageNsap'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Village Nsap id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $villageNsap = $this->VillageNsaps->get($id);
        if ($this->VillageNsaps->delete($villageNsap)) {
            $this->Flash->success(__('The village nsap has been deleted.'));
        } else {
            $this->Flash->error(__('The village nsap could not be deleted. Please, try again.'));
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
                      
            $query=$this->VillageNsaps
                   ->find('all')               
                   ->contain(['Villages'=>[
                       'fields'=>['Villages.village_name']]
                       ])->where(['VillageNsaps.village_code IN'=>$villages]);
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

            $nsap = $this->VillageNsaps->get($this->request->getData('id'));
            if ($this->VillageNsaps->delete($nsap)) {
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
