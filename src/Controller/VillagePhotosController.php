<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VillagePhotos Controller
 *
 * @property \App\Model\Table\VillagePhotosTable $VillagePhotos
 *
 * @method \App\Model\Entity\VillagePhoto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillagePhotosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $villagePhotos = $this->paginate($this->VillagePhotos);

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
        $villagePhoto = $this->VillagePhotos->newEntity();
       // $villagePhoto = $this->VillagePhotos->newEntities();

        if ($this->request->is('post')) {
           // dump($this->request->getData());
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
         // dump($photos);
            $villagePhoto    = $this->VillagePhotos->patchEntities( $villagePhoto,$photos);
           // dump($villagePhoto);
           // 
           // dump($villagePhoto);
           // foreach ($villagePhoto as $photo){
             // dump($villagePhoto);
              if( !$this->VillagePhotos->saveMany($villagePhoto)){

                $this->Flash->error(__('The village photo could not be saved. Please, try again.'));
                return $this->redirect(['action' => 'add']);
              }

              

           // }
                     
            $this->Flash->success(__('The village photo has been saved.'));

            return $this->redirect(['action' => 'add']);     
          
            
            
        }
      //  $fileuploads = $this->VillagePhotos->Fileuploads->find('list', ['limit' => 200]);
       $this->set(compact('villagePhoto'));
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
}
