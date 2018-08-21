<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Manager Controller
 *
 *
 * @method \App\Model\Entity\Manager[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManagerController extends AppController
{


    /**
     * isAuthorized method
     * 
     * 
     */

     public function isAuthorized($user)
     {
        $action = $this->request->getParam('action');
         if(in_array($action,['home']) && in_array($user['role_id'],[14]))
         {
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
        $manager = $this->paginate($this->Manager);

        $this->set(compact('manager'));
    }

    /**
     * View method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manager = $this->Manager->get($id, [
            'contain' => []
        ]);

        $this->set('manager', $manager);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $manager = $this->Manager->newEntity();
        if ($this->request->is('post')) {
            $manager = $this->Manager->patchEntity($manager, $this->request->getData());
            if ($this->Manager->save($manager)) {
                $this->Flash->success(__('The manager has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manager could not be saved. Please, try again.'));
        }
        $this->set(compact('manager'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $manager = $this->Manager->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $manager = $this->Manager->patchEntity($manager, $this->request->getData());
            if ($this->Manager->save($manager)) {
                $this->Flash->success(__('The manager has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manager could not be saved. Please, try again.'));
        }
        $this->set(compact('manager'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Manager id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manager = $this->Manager->get($id);
        if ($this->Manager->delete($manager)) {
            $this->Flash->success(__('The manager has been deleted.'));
        } else {
            $this->Flash->error(__('The manager could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function home()
    {
        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
    }
}
