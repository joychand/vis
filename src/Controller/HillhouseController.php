<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Hillhouse Controller
 *
 *
 * @method \App\Model\Entity\Hillhouse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HillhouseController extends AppController
{
    public function initialize()
    {
       parent::initialize();
       $this->loadComponent('RequestHandler');
       //$this->loadComponent('Security');
    }



    public function isAuthorized($user)
    {
        //dump($user);
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['home','add', 'edit','delete','index','getvillage','ajaxFilterSubdivision','ajaxDelete']) && in_array($user['role_id'],[6,13,14,15])) {
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
        $this->populations=TableRegistry::get('populations');
        $session = $this->request->getSession();
        $agency_id= $session->read('agency');
        $subDivs=$this->Subdistricts->find('list'); 
        $hillhouses = $this->populations->find('all')
                     ->where(['counting_agency'=>$agency_id])
                      ->contain(['Villages'=>[
                          'fields'=>['Villages.village_name']
                      ]]);

        $this->set(compact('hillhouses','subDivs'));
    }

  

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->session();
        $this->populations=TableRegistry::get('populations');
        $current_year = date('Y');
        $range = range($current_year, $current_year-10);
        $years = array_combine($range, $range);     
       
        $hhtax = $this->populations->newEntity();
        if ($this->request->is('post')) {
            $session->write('selected',$this->request->getData('subdistrict'));
            $session->write('selected_ref_yr',$this->request->getData('reference_year'));  
            $agency_id= $session->read('agency');
            $recordExist=$this->populations->checkRecord($this->request->getData('reference_year'),$this->request->getData('village_code'),$agency_id);
            $hhtax = $this->populations->patchEntity($hhtax, $this->request->getData());
            $hhtax->counting_agency=$agency_id;  
            if($recordExist){
                $this->Flash->error(__('This Village Hill House Tax data already exist. Please go to update view if for any changes'));
            }
            else
             {
                if ($this->populations->save($hhtax)) {
                    $this->Flash->success(__('The Village data has been saved.'));
                    $this->set(compact('subdist_name'));
                    return $this->redirect(['action' => 'add']);
                }
                $this->Flash->error(__('The data could not be saved. Please, try again.'));

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
        $this->set(compact('hhtax','selected','selected_ref_yr','villages'));
        $this->set(compact('subdistricts','years'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Hillhouse id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($reference_year = null,$village_code = null,$counting_agency = null)
    {
        $this->populations=TableRegistry::get('populations');
        $Hillhouse = $this->populations->get([$reference_year,$village_code,$counting_agency], [
            'contain' => ['Villages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $Hillhouse = $this->populations->patchEntity($Hillhouse, $this->request->getData());
            if ($this->populations->save($hillhouse)) {
                $this->Flash->success(__('The Hillhouse Data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Hillhouse could not be saved. Please, try again.'));
        }
        $this->set(compact('Hillhouse'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hillhouse id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($reference_year = null,$village_code = null,$counting_agency = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->populations=TableRegistry::get('populations');
        $hillhouse = $this->populations->get([$reference_year,$village_code,$counting_agency]);
        if ($this->populations->delete($hillhouse)) {
            $this->Flash->success(__('The Hillhouse data has been deleted.'));
        } else {
            $this->Flash->error(__('The Hillhouse could not be deleted. Please, try again.'));
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
            ])->where(['sub_district_code'=>$subdist_code])->order(['village_name'=>'ASC']);

          
             header('Content-Type: application/json');
             echo json_encode($villages);
             exit();
        }
    }

    public function ajaxFilterSubdivision()
    {
       
        if ($this->request->is(['ajax', 'post'])) 
        {
           //$this->autoRender = false;
            $this->loadModel('Subdistricts');
            $this->loadModel('Villages');
            $this->populations=TableRegistry::get('populations');
             $session = $this->request->getSession();
             $agency_id= $session->read('agency');
          
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
                      
            $query=$this->populations
                   ->find('all',['conditions'=>['counting_agency'=>$agency_id]])               
                   ->contain(['Villages'=>[
                       'fields'=>['Villages.village_name']]
                       ])->where(['populations.village_code IN'=>$villages]);
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
            $this->populations=TableRegistry::get('populations');
            $nercormp =  $this->populations->get([$this->request->getData('ref'),$this->request->getData('village_code'),$this->request->getData('counting_agency')]);
            if ($this->populations->delete($nercormp)) {
               $mesg="Delete Success";
            } 
            else 
            {
               $mesg="Delete Fail";
            }
        }
        $this->set('mesg',$mesg);
        $this->set('_serialize', 'mesg');

       
    }
}
