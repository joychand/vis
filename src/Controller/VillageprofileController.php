<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;


/**
 * Villageprofile Controller
 *
 *
 * @method \App\Model\Entity\Villageprofile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillageprofileController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
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
         $this->Security->setConfig('unlockedActions', ['getvillage','ajaxDelete','ajaxGetVillageProfile']);
      
       
   }

   public function isAuthorized($user)
   {
       //dump($user);
       $action = $this->request->getParam('action');
       // The add and tags actions are always allowed to logged in users.
       if (in_array($action, ['home','getvillage','ajaxGetVillageProfile']) && in_array($user['role_id'],[13,15,16])) {
           return true;
       }

       
   }

    public function home()
    {
        $this->request->allowMethod(['get','post']);

        $session = $this->getRequest()->getSession();

        $session->write('homecontroller', $this->request->params['controller']);
        if ($this->request->is('post')) {
            //debug($this->request->getData('subdistrict_code'));
            $session->write('subdivision',$this->request->getData('subdistrict_code'));
            $session->write('village',$this->request->getData('village_code'));
            return $this->redirect(['action' => 'view']);
        }
        $this->loadModel('Subdistricts');
        $this->loadModel('Villages');
       
        $user_name=$this->Auth->User('user_name');
        switch($user_name)
        {
            case 'sdo.chakpikarong': $subdivision= $this->Subdistricts->find('list')->where(['subdistrict_code'=>'1895']);
                                     break;  
            case 'sdo.chandel': $subdivision= $this->Subdistricts->find('list')->where(['subdistrict_code'=>'1894']);;
                                     break; 
            case 'sdo.khengjoy': $subdivision= $this->Subdistricts->find('list')->where(['subdistrict_code'=>'6496']);;
                                     break;
            case 'dc.chandel': $subdivision= $this->Subdistricts->find('list');
                                     break;   
             case 'admin': $subdivision= $this->Subdistricts->find('list');
                                     break;     
        }
        //$subdivision= $this->Subdistricts->find('list');       
        $this->set(compact('subdivision'));
    }

    /**
     * View method
     *
     * @param string|null $id Villageprofile id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->request->allowMethod(['get','post']);

        $session = $this->request->session();
        $this->loadModel('Subdistricts');
        $this->loadModel('Villages');
        $this->loadModel('HealthInfras');
        $this->loadModel('Anganwadis');
        $this->loadModel('Villages');
        $this->loadModel('EducationInfras');
        $this->loadModel('FoodSecurities');
        $this->loadModel('Nregas');
        $this->loadModel('VillageNsaps');
        $this->loadModel('VillageSchemes');
        $this->loadModel('Populations');
        $this->loadModel('VillageElectorals');
        $this->loadModel('VillagePhotos');
        $subdivision_code=$session->read('subdivision');
        $village_code=$session->read('village');
        $village=$this->Villages->find()->select(['village_name'])->where(['village_code'=>$village_code])->first();
        $subdivision=$this->Subdistricts->find()->select(['subdistrict_name'])->where(['subdistrict_code'=>$subdivision_code])->first();
        
        //******demograpy queries******//
        $gtv_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>3]);       
        $village_gtv = $this->Populations->find('all')->where(['Populations.reference_year'=> $gtv_subquery
                       ->select(['latest_ref'=>$gtv_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>3])
                       ->first();

         $sec_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>2]);       
         $village_sec = $this->Populations->find('all')->where(['Populations.reference_year'=> $sec_subquery
                         ->select(['latest_ref'=>$sec_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>2])
                         ->first();

        $nercormp_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>1]);       
        $village_nercormp = $this->Populations->find('all')->where(['Populations.reference_year'=> $nercormp_subquery
                        ->select(['latest_ref'=>$nercormp_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>1])
                        ->first();
        $census_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>4]);       
        $village_census = $this->Populations->find('all')->where(['Populations.reference_year'=> $census_subquery
                                        ->select(['latest_ref'=>$census_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>1])
                                        ->first();               
        //*** end demography queries **//        

        $health_subquery=$this->HealthInfras->find()->where(['HealthInfras.village_code'=>$village_code]);
        $vill_health=$this->HealthInfras->find('all')->where(['HealthInfras.health_reference_year'=> $health_subquery
                    ->select(['latest_ref'=>$health_subquery->func()->max('HealthInfras.health_reference_year')]),'HealthInfras.village_code'=>$village_code])
                    ->first();
       
         $ang_subquery=$this->Anganwadis->find()->where(['Anganwadis.village_code'=>$village_code]);
         $vill_anganwadi=$this->Anganwadis->find('all')->where(['anganwadi_reference_year'=> $ang_subquery
                        ->select(['latest_ref'=>$ang_subquery->func()->max('anganwadi_reference_year')]),'Anganwadis.village_code'=>$village_code])
                        ->first();
        $nsap_subquery=$this->VillageNsaps->find()->where(['VillageNsaps.village_code'=>$village_code]);
        $vill_nsap=$this->VillageNsaps->find('all')->where(['reference_year'=> $nsap_subquery
                                       ->select(['latest_ref'=>$nsap_subquery->func()->max('reference_year')]),'VillageNsaps.village_code'=>$village_code])
                                       ->first(); 
                                       
        $cafpd_subquery=$this->FoodSecurities->find()->where(['FoodSecurities.village_code'=>$village_code]);
        $vill_cafpd=$this->FoodSecurities->find('all')->where(['reference_year'=> $cafpd_subquery
                                                                      ->select(['latest_ref'=>$cafpd_subquery->func()->max('reference_year')]),'FoodSecurities.village_code'=>$village_code])
                                                                      ->first();  
        $edn_subquery=$this->EducationInfras->find()->where(['EducationInfras.village_code'=>$village_code]);
        $vill_edn=$this->EducationInfras->find('all')->where(['education_reference_year'=> $edn_subquery
                                          ->select(['latest_ref'=>$edn_subquery->func()->max('education_reference_year')]),'EducationInfras.village_code'=>$village_code])
                                          ->first();  
        $this->set(compact('vill_health','village','subdivision','village_gtv','village_sec','village_nercormp',
                'vill_anganwadi','vill_nsap','vill_cafpd','vill_edn','village_census'));
    }

    public function getvillage()
    {
        $this->request->allowMethod(['post']);

        $this->villages=TableRegistry::get('Villages');
        
        if ($this->request->is(['ajax', 'post'])) 
        {
            
            $subdist_code = $this->request->getData('subdistrict_code');
            $query=$this->villages->find('list',[
                'keyField'=>'village_code',
                'valueField'=>'village_name'
            ])->where(['sub_district_code'=>$subdist_code])
            ->order(['villages.village_name'=>'ASC']);
            $villages=$query->toArray();
           
             header('Content-Type: application/json');
             echo json_encode($villages);
             exit();
        }
    }

    public function ajaxGetVillageProfile()
    {
        $this->request->allowMethod(['get','post']);

        // $this->autoRender = false;
        //$session = $this->request->session();
        if ($this->request->is(['ajax','post'])){

            $this->loadModel('Subdistricts');
            $this->loadModel('Villages');
            $this->loadModel('HealthInfras');
            $this->loadModel('Anganwadis');
            $this->loadModel('Villages');
            $this->loadModel('EducationInfras');
            $this->loadModel('FoodSecurities');
            $this->loadModel('Nregas');
            $this->loadModel('VillageNsaps');
            $this->loadModel('VillageSchemes');
            $this->loadModel('Populations');
            $this->loadModel('VillageElectorals');
            $this->loadModel('VillagePhotos');
            $this->loadModel('VillageDisableInfos');
            $this->loadModel('PowerInfras');
            $this->loadModel('ConnectivityInfras');
            // $subdivision_code=$session->read('subdivision');
            // $village_code=$session->read('village');
            $subdivision_code='1894';
            $village_code=$this->request->getData('village_code');
            $village=$this->Villages->find()->select(['village_name'])->where(['village_code'=>$village_code])->first();
            $subdivision=$this->Subdistricts->find()->select(['subdistrict_name'])->where(['subdistrict_code'=>$subdivision_code])->first();
            
            //******demograpy queries******//
            $gtv_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>3]);       
            $village_gtv = $this->Populations->find('all')->where(['Populations.reference_year'=> $gtv_subquery
                           ->select(['latest_ref'=>$gtv_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>3])
                           ->first();
    
             $sec_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>2]);       
             $village_sec = $this->Populations->find('all')->where(['Populations.reference_year'=> $sec_subquery
                             ->select(['latest_ref'=>$sec_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>2])
                             ->first();
    
            $nercormp_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>1]);       
            $village_nercormp = $this->Populations->find('all')->where(['Populations.reference_year'=> $nercormp_subquery
                            ->select(['latest_ref'=>$nercormp_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>1])
                            ->first();
             $census_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>4]);       
             $village_census = $this->Populations->find('all')->where(['Populations.reference_year'=> $census_subquery
                                ->select(['latest_ref'=>$census_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>4])
                                ->first();
             $hillhouse_subquery= $this->Populations->find()->where(['Populations.village_code'=>$village_code, 'Populations.counting_agency'=>5]);       
             $village_hillhouse = $this->Populations->find('all')->where(['Populations.reference_year'=> $hillhouse_subquery
                                 ->select(['latest_ref'=>$hillhouse_subquery->func()->max('Populations.reference_year')]),'Populations.village_code'=>$village_code, 'Populations.counting_agency'=>5])
                                 ->first();
            //*** end demography queries **//        
            //*** Health Infra queries */
            $health_subquery=$this->HealthInfras->find()->where(['HealthInfras.village_code'=>$village_code]);
            $vill_health=$this->HealthInfras->find('all')->where(['HealthInfras.health_reference_year'=> $health_subquery
                        ->select(['latest_ref'=>$health_subquery->func()->max('HealthInfras.health_reference_year')]),'HealthInfras.village_code'=>$village_code])
                        ->first();
            /*****end of Health queries *******/
            /**  Anganwadis queries** */
             $ang_subquery=$this->Anganwadis->find()->where(['Anganwadis.village_code'=>$village_code]);
             $vill_anganwadi=$this->Anganwadis->find('all')->where(['anganwadi_reference_year'=> $ang_subquery
                            ->select(['latest_ref'=>$ang_subquery->func()->max('anganwadi_reference_year')]),'Anganwadis.village_code'=>$village_code])
                            ->first();
            /**** NSAP queries******/
            $nsap_subquery=$this->VillageNsaps->find()->where(['VillageNsaps.village_code'=>$village_code]);
            $vill_nsap=$this->VillageNsaps->find('all')->where(['reference_year'=> $nsap_subquery
                                           ->select(['latest_ref'=>$nsap_subquery->func()->max('reference_year')]),'VillageNsaps.village_code'=>$village_code])
                                           ->first(); 
                                           
            $cafpd_subquery=$this->FoodSecurities->find()->where(['FoodSecurities.village_code'=>$village_code]);
            $vill_cafpd=$this->FoodSecurities->find('all')->where(['reference_year'=> $cafpd_subquery
                                                                          ->select(['latest_ref'=>$cafpd_subquery->func()->max('reference_year')]),'FoodSecurities.village_code'=>$village_code])
                                                                          ->first();  
            $edn_subquery=$this->EducationInfras->find()->where(['EducationInfras.village_code'=>$village_code]);
            $vill_edn=$this->EducationInfras->find('all')->where(['education_reference_year'=> $edn_subquery
                                              ->select(['latest_ref'=>$edn_subquery->func()->max('education_reference_year')]),'EducationInfras.village_code'=>$village_code])
                                              ->first();  
            $nrega_subquery=$this->Nregas->find()->where(['Nregas.village_code'=>$village_code]);
            $vill_nrega=$this->Nregas->find('all')->where(['nrega_reference_year'=> $nrega_subquery
                                                                                ->select(['latest_ref'=>$nrega_subquery->func()->max('nrega_reference_year')]),'Nregas.village_code'=>$village_code])
                                                                                ->first();
            $election_subquery=$this->VillageElectorals->find()->where(['VillageElectorals.village_code'=>$village_code]);
            $vill_electoral=$this->VillageElectorals->find('all')->where(['reference_year'=> $election_subquery
                                                            ->select(['latest_ref'=>$election_subquery->func()->max('reference_year')]),'VillageElectorals.village_code'=>$village_code])
              
                                                            ->first();
            /** Power Infras Query */
             $power_subquery=$this->PowerInfras->find()->where(['PowerInfras.village_code'=>$village_code]);
             $vill_power=$this->PowerInfras->find('all')->where(['reference_year'=> $power_subquery
                                   ->select(['latest_ref'=>$power_subquery->func()->max('reference_year')]),'PowerInfras.village_code'=>$village_code])
                                   ->first();
            /** Connectivity Infras Query */
            $connectivity_subquery=$this->ConnectivityInfras->find()->where(['ConnectivityInfras.village_code'=>$village_code]);
            $vill_connectivity=$this->ConnectivityInfras->find('all')->where(['reference_year'=> $connectivity_subquery
                                  ->select(['latest_ref'=>$connectivity_subquery->func()->max('reference_year')]),'ConnectivityInfras.village_code'=>$village_code])
                                  ->first(); 
            /** VillageDisableInfos Query */
            $disable_subquery=$this->VillageDisableInfos->find()->where(['VillageDisableInfos.village_code'=>$village_code]);
            $vill_disable=$this->VillageDisableInfos->find('all')->where(['reference_year'=> $disable_subquery
                                  ->select(['latest_ref'=>$disable_subquery->func()->max('reference_year')]),'VillageDisableInfos.village_code'=>$village_code])
                                  ->first(); 
            $village_photos=$this->VillagePhotos->find()->where(['VillagePhotos.village_code'=>$village_code]);                                                                                                      
            $this->set(compact('vill_health','village','subdivision','village_gtv','village_sec','village_nercormp','village_census','village_hillhouse',
                    'vill_anganwadi','vill_nsap','vill_cafpd','vill_edn','vill_nrega','vill_electoral','village_photos','vill_power','vill_connectivity','vill_disable'));
            $this->set( '_serialize',['vill_health','village','subdivision','village_gtv','village_sec','village_nercormp','village_census','village_hillhouse',
                    'vill_anganwadi','vill_nsap','vill_cafpd','vill_edn','vill_nrega','vill_electoral','village_photos','vill_power','vill_connectivity','vill_disable']);
        }
      
    // $this->set('hello',$vill_health);
    // $this->set('_serialize','hello');

    }

}
