<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * VillagePhotos Controller
 *
 * @property \App\Model\Table\VillagePhotosTable $VillagePhotos
 *
 * @method \App\Model\Entity\VillagePhoto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillagePhotosController extends AppController
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
        if (in_array($action, ['home','add', 'edit','delete','index','getvillage']) && in_array($user['role_id'],[11,13,14,15])) {
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
        $query=$this->VillagePhotos->find('all')->contain(['Villages'=>['Subdistricts']])->order(['Villages.village_name'=>'ASC']);
        //debug ($query);
        $villagePhotos = $this->paginate( $query);

        $this->set(compact('villagePhotos'));
    }

    /**
     * View method
     *
     * @param string|null $id Village Photo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->request->allowMethod(['get','post']);
        $villagePhoto = $this->VillagePhotos->get($id, [
            'contain' => []
        ]);

        $this->set('villagePhoto', $villagePhoto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    
        public function add()
    {
        $this->request->allowMethod(['get','post']);

        $this->subdistricts = TableRegistry::get('Subdistricts');
       
        $villagePhoto = $this->VillagePhotos->newEntity(['associated'=>[
            'Villages.VillageInfos'
        ]]);
       // $villagePhoto = $this->VillagePhotos->newEntities();
        
        if ($this->request->is('post')) {
           //dump($this->request->getData());
            $photos=$this->request->getData('villagePhoto');
            for ($x = 0; $x <= 2; $x++) {
               
                if ($photos[$x]['photo']['error']!=0)
                {
                    unset ($photos[$x]);
                }
                else {
                    $photos[$x]['village_code']=$this->request->getData('village_code'); 
                }
                
               
            }
         
            $villagePhoto    = $this->VillagePhotos->patchEntities( $villagePhoto,$photos);
          
              if( !$this->VillagePhotos->saveMany($villagePhoto))
              {

                $this->Flash->error(__('The village photo  and info could not be saved Plz check the file size <= 1mb and file formats (jpeg,png,gif). Please, try again.'));
                return $this->redirect(['action' => 'add']);
              }

              else 
              {
                  $villageInfos=TableRegistry::get('villageInfos');
                  $villageInfo=$villageInfos->newEntity();
                  $villageInfo=$villageInfos->patchEntity($villageInfo,$this->request->getData('Villages.VillageInfos'));
                  $villageInfo->village_code=$this->request->getData('village_code');
                  if(!$villageInfos->save($villageInfo))
                  {
                    $this->Flash->error(__('The village photo  & info could not be saved. Please, try again.'));
                    return $this->redirect(['action' => 'add']);
                  }
                     

              }
                    
                     
            $this->Flash->success(__('The village photo & Info has been saved.'));

            return $this->redirect(['action' => 'add']);     
          
            
            
        }
        $subdistricts=$this->subdistricts->find('list');
      //  $fileuploads = $this->VillagePhotos->Fileuploads->find('list', ['limit' => 200]);
       $this->set(compact('villagePhoto','subdistricts'));
    }
    // }

    /**
     * Edit method
     *
     * @param string|null $id Village Photo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['get','post','put']);
        $villagePhoto = $this->VillagePhotos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $villagePhoto = $this->VillagePhotos->patchEntity($villagePhoto, $this->request->getData());
            if ($this->VillagePhotos->save($villagePhoto)) {
                $this->Flash->success(__('The village photo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The village photo could not be saved. Please, try again.'));
        }
        $this->set(compact('villagePhoto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Village Photo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $villagePhoto = $this->VillagePhotos->get($id);
        if ($this->VillagePhotos->delete($villagePhoto)) {
            $this->Flash->success(__('The village photo has been deleted.'));
        } else {
            $this->Flash->error(__('The village photo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
            ])->where(['sub_district_code'=>$subdist_code]);

          
             header('Content-Type: application/json');
             echo json_encode($villages);
             exit();
        }
    }

}
