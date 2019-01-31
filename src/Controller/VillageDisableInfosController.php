<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VillageDisableInfos Controller
 *
 * @property \App\Model\Table\VillageDisableInfosTable $VillageDisableInfos
 *
 * @method \App\Model\Entity\VillageDisableInfo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillageDisableInfosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $villageDisableInfos = $this->paginate($this->VillageDisableInfos);

        $this->set(compact('villageDisableInfos'));
    }

    /**
     * View method
     *
     * @param string|null $id Village Disable Info id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $villageDisableInfo = $this->VillageDisableInfos->get($id, [
            'contain' => []
        ]);

        $this->set('villageDisableInfo', $villageDisableInfo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $villageDisableInfo = $this->VillageDisableInfos->newEntity();
        if ($this->request->is('post')) {
            $villageDisableInfo = $this->VillageDisableInfos->patchEntity($villageDisableInfo, $this->request->getData());
            if ($this->VillageDisableInfos->save($villageDisableInfo)) {
                $this->Flash->success(__('The village disable info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The village disable info could not be saved. Please, try again.'));
        }
        $this->set(compact('villageDisableInfo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Village Disable Info id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $villageDisableInfo = $this->VillageDisableInfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $villageDisableInfo = $this->VillageDisableInfos->patchEntity($villageDisableInfo, $this->request->getData());
            if ($this->VillageDisableInfos->save($villageDisableInfo)) {
                $this->Flash->success(__('The village disable info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The village disable info could not be saved. Please, try again.'));
        }
        $this->set(compact('villageDisableInfo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Village Disable Info id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $villageDisableInfo = $this->VillageDisableInfos->get($id);
        if ($this->VillageDisableInfos->delete($villageDisableInfo)) {
            $this->Flash->success(__('The village disable info has been deleted.'));
        } else {
            $this->Flash->error(__('The village disable info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
