<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function initialize()
{
    parent::initialize();
   // $this->disableCache();
    // Add the 'add' action to the allowed actions list.
    $this->Auth->allow(['logout']);


}
public function isAuthorized($user)
{
    $action = $this->request->getParam('action');
    
    if (in_array($action, ['add', 'edit','delete','index']) && in_array($user['role_id'],[13])) {
        return true;
    }

    if (in_array($action, ['changepassword']))
    {
        return true;
    }


  
}

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    public function login()
    
    {
        Cache::disable();

        if($this->Auth->user()){
            $this->Flash->error(__('You are already logged in!'));
            //dump($this->getRequest()->getSession()->read('homecontroller'));
            return $this->redirect(['controller'=>$this->getRequest()->getSession()->read('homecontroller'), 'action' => 'home']);
        }
       // Cache::disable();
        if ($this->request->is('post')) 
        {
            $user = $this->Auth->identify();
           
            if ($user) {
               // debug($user->role_id);
                $this->Auth->setUser($user);
                $role_redirect=$this->Auth->User('role_id');
                //$user_name=$this->Auth->User('user_name');
              // dump($user_name);
                switch($role_redirect)
                {
                    case 1: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Anganwadis','action'=>'home']));
                            break;
                    case 2: return $this->redirect($this->Auth->redirectUrl(['controller'=>'FoodSecurities','action'=>'home']));
                            break;
                    case 3: return $this->redirect($this->Auth->redirectUrl(['controller'=>'EducationInfras','action'=>'home']));
                            break;
                    case 4: return $this->redirect($this->Auth->redirectUrl(['controller'=>'VillageElectorals','action'=>'home']));
                            break;
                    case 5: return $this->redirect($this->Auth->redirectUrl(['controller'=>'HealthInfras','action'=>'home']));
                            break;
                    case 6: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Nercormp','action'=>'home']));
                            break;
                    case 7: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Nregas','action'=>'home']));
                            break;
                    case 8: return $this->redirect($this->Auth->redirectUrl(['controller'=>'VillageNsaps','action'=>'home']));
                            break;
                    case 9: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Sdoreport','action'=>'home']));
                            break;
                    case 10: return $this->redirect($this->Auth->redirectUrl(['controller'=>'VillageSchemes','action'=>'home']));
                            break;
                    case 11: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Securityreport','action'=>'home']));
                            break; 
                    case 12: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Villageinfos','action'=>'home']));
                             break;
                    case 13: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Dataentry','action'=>'home']));
                             break;
                    case 14: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Manager','action'=>'home']));
                             break;
                    case 15: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Villageprofile','action'=>'home']));
                             break; 
                    case 16: return $this->redirect($this->Auth->redirectUrl(['controller'=>'Dashboard','action'=>'home']));
                             break;       


                }
               
                $this->Flash->success('You are now login to Chandel VIS.');
                return $this->redirect($this->Auth->redirectUrl(['controller'=>'Dataentry','action'=>'data']));
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
        {
          // $this->Flash->success('You are now logged out.');
          $this->getRequest()->getSession()->destroy();
          //$session->destroy();
          return $this->redirect($this->Auth->logout());
           // return $this->redirect(['controller'=>'Dashboard','action'=>'display']);
        }
            
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roles=$this->Users->users_roles->find('list',
        ['keyField'=>'users_role_id',
        'valueField'=>'user_role_name']);
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $userExist=$this->Users->userExist($this->request->getData('user_name'));
            if($userExist)
            {
                $this->Flash->error(__('User Name already Exist... Please another Username..'));

            }
            else
            {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
    
                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
           
           
        }
        $this->set(compact('user'));
        $this->set(compact('roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            //$this->redirect( Router::url( $this->referer(), true ) );
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changepassword($id=null)
    {
        $this->request->allowMethod(['get']);
        //$isUserAuthorized=false;
       // dump($this->Auth->user('user_id'));
        $isUserAuthorized=$this->Users->checkAuthorized(  $this->Auth->user('user_id'),$id); //checking change password for only login id
        if(!$isUserAuthorized)
        {
           $this->Flash->error(__('Your are not authorized to access the resources'));
           //$this->redirect( Router::url( $this->referer(), true ) );
           return $this->redirect($this->referer());
        }
        else
        {

            $user = $this->Users->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put']))
            {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user))
                 {
                    $redirectUrl = $this->Auth->logout();
                   // $this->Session->setFlash('Password has been changed.');
                    $this->Flash->success(__('The password has been successfully changed Plz login again with new password'));
                   return $this->redirect($redirectUrl);
                    //return $this->redirect(['action' => 'logout']);
                }
                $this->Flash->error(__('The password could not be changed. Please, try again.'));
            }
           

        }
        $this->set(compact('user'));

       

    }
}
