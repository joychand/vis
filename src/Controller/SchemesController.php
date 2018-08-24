<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Schemes Controller
 *
 * @property \App\Model\Table\SchemesTable $Schemes
 *
 * @method \App\Model\Entity\Scheme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchemesController extends AppController
{

/*** isAuthorized() */

    public function isAuthorized($user)
    {
        //dump($user);
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'edit','delete','home','index']) &&  in_array($user['role_id'],[13,14]) ) {
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
        $this->paginate = [
            'contain' => ['Departments']
        ];
        $schemes = $this->paginate($this->Schemes);

        $this->set(compact('schemes'));
    }

    /**
     * View method
     *
     * @param string|null $id Scheme id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scheme = $this->Schemes->get($id, [
            'contain' => ['Departments']
        ]);

        $this->set('scheme', $scheme);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scheme = $this->Schemes->newEntity();
        if ($this->request->is('post')) {
            $scheme = $this->Schemes->patchEntity($scheme, $this->request->getData());
            if ($this->Schemes->save($scheme)) {
                $this->Flash->success(__('The scheme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheme could not be saved. Please, try again.'));
        }
        $departments = $this->Schemes->Departments->find('list', ['limit' => 200]);
        $this->set(compact('scheme', 'departments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scheme id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scheme = $this->Schemes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheme = $this->Schemes->patchEntity($scheme, $this->request->getData());
            if ($this->Schemes->save($scheme)) {
                $this->Flash->success(__('The scheme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scheme could not be saved. Please, try again.'));
        }
        $departments = $this->Schemes->Departments->find('list', ['limit' => 200]);
        $this->set(compact('scheme', 'departments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scheme id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scheme = $this->Schemes->get($id);
        if ($this->Schemes->delete($scheme)) {
            $this->Flash->success(__('The scheme has been deleted.'));
        } else {
            $this->Flash->error(__('The scheme could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
