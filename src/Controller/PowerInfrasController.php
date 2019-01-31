<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PowerInfras Controller
 *
 * @property \App\Model\Table\PowerInfrasTable $PowerInfras
 *
 * @method \App\Model\Entity\PowerInfra[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PowerInfrasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $powerInfras = $this->paginate($this->PowerInfras);

        $this->set(compact('powerInfras'));
    }

    /**
     * View method
     *
     * @param string|null $id Power Infra id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $powerInfra = $this->PowerInfras->get($id, [
            'contain' => []
        ]);

        $this->set('powerInfra', $powerInfra);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $powerInfra = $this->PowerInfras->newEntity();
        if ($this->request->is('post')) {
            $powerInfra = $this->PowerInfras->patchEntity($powerInfra, $this->request->getData());
            if ($this->PowerInfras->save($powerInfra)) {
                $this->Flash->success(__('The power infra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The power infra could not be saved. Please, try again.'));
        }
        $this->set(compact('powerInfra'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Power Infra id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $powerInfra = $this->PowerInfras->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $powerInfra = $this->PowerInfras->patchEntity($powerInfra, $this->request->getData());
            if ($this->PowerInfras->save($powerInfra)) {
                $this->Flash->success(__('The power infra has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The power infra could not be saved. Please, try again.'));
        }
        $this->set(compact('powerInfra'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Power Infra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $powerInfra = $this->PowerInfras->get($id);
        if ($this->PowerInfras->delete($powerInfra)) {
            $this->Flash->success(__('The power infra has been deleted.'));
        } else {
            $this->Flash->error(__('The power infra could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
