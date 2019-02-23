<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserAudits Controller
 *
 * @property \App\Model\Table\UserAuditsTable $UserAudits
 *
 * @method \App\Model\Entity\UserAudit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserAuditsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $userAudits = $this->paginate($this->UserAudits);

        $this->set(compact('userAudits'));
    }

    /**
     * View method
     *
     * @param string|null $id User Audit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userAudit = $this->UserAudits->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userAudit', $userAudit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function logSuccess($client_ip ,$client)
    {
        $userAudit = $this->UserAudits->newEntity();
        if ($this->request->is('post')) {
            $userAudit = $this->UserAudits->patchEntity($userAudit, $this->request->getData());
            if ($this->UserAudits->save($userAudit)) {
                $this->Flash->success(__('The user audit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user audit could not be saved. Please, try again.'));
        }
        $users = $this->UserAudits->Users->find('list', ['limit' => 200]);
        $this->set(compact('userAudit', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Audit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userAudit = $this->UserAudits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userAudit = $this->UserAudits->patchEntity($userAudit, $this->request->getData());
            if ($this->UserAudits->save($userAudit)) {
                $this->Flash->success(__('The user audit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user audit could not be saved. Please, try again.'));
        }
        $users = $this->UserAudits->Users->find('list', ['limit' => 200]);
        $this->set(compact('userAudit', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Audit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userAudit = $this->UserAudits->get($id);
        if ($this->UserAudits->delete($userAudit)) {
            $this->Flash->success(__('The user audit has been deleted.'));
        } else {
            $this->Flash->error(__('The user audit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
