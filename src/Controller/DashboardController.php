<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Dashboard Controller
 *
 *
 * @method \App\Model\Entity\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{


    public function isAuthorized($user)
    {
        //dump($user);
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['display','getEmptyVillage']) && in_array($user['role_id'],[13,15,16])) {
            return true;
        }

        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function display()
    {
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
        $total_village=$this->Villages->find()->select('village_code')->distinct()->count('village_code');
        $health_village_entered= $this->HealthInfras->find()->count(' village_code');
        $anganwadi_village_entered= $this->Anganwadis->find()->select('Anganwadis.village_code')->distinct()->count('Anganwadis.village_code');
        $education_village_entered= $this->EducationInfras->find()->select('village_code')->distinct()->count('village_code');
        $election_entered_village= $this->VillageElectorals->find()->select('village_code')->distinct()->count('village_code');
        $cafpd_village_entered= $this->FoodSecurities->find()->select('village_code')->distinct()->count('village_code');
        $nrega_village_entered= $this->Nregas->find()->select('village_code')->distinct()->count('village_code');
        $nsap_village_entered= $this->VillageNsaps->find()->select('village_code')->distinct()->count('village_code');
        $village_scheme_entered = $this->VillageSchemes->find()->select('village_code')->distinct()->count('village_code');
        $village_photos_entered = $this->VillagePhotos->find()->select('village_code')->distinct()->count('village_code');
        $nercormp_entered=$this->Populations->find()->select('village_code')->where(['counting_agency'=>1])->distinct()->count('village_code');
        $security_entered=$this->Populations->find()->select('village_code')->where(['counting_agency'=>2])->distinct()->count('village_code');
        $sdo_entered=$this->Populations->find()->select('village_code')->where(['counting_agency'=>3])->distinct()->count('village_code');
       
       
        $this->set(compact('total_village','health_village_entered','anganwadi_village_entered','education_village_entered',
                            'cafpd_village_entered','nrega_village_entered','nsap_village_entered','village_scheme_entered',
                            'nercormp_entered','security_entered','sdo_entered','election_entered_village','village_photos_entered'));

       
    }

    public function villageEntered()
    {
        $this->loadModel('HealthInfras');
        $this->loadModel('Villages');
        
         $query=$this->Villages->find()
               
               ->contain('Subdistricts')
               ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
               ->distinct('Villages.village_code')
               ->matching('HealthInfras',function($q) 
               {
                   return $q;
               });
         //$data=$query->select('village_code','village')      
          // sql($query); 
           debug($query->toList());       
    }

    public function villageRemaining()
    {
        $this->loadModel('HealthInfras');
        $this->loadModel('Villages');
        // $query=$this->Villages->find()
               
        //        ->contain('Subdistricts')
        //        ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
        //        ->notMatching('HealthInfras',function($q) 
        //        {
        //            return $q;
        //        });
         $query=$this->Villages->find()
               
               ->contain('Subdistricts')
               ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
               ->distinct('Villages.village_code')
               ->matching('HealthInfras',function($q) 
               {
                   return $q;
               });
         //$data=$query->select('village_code','village')      
          // sql($query); 
           debug($query->toList());       
    }

    public function getEmptyVillage($modelToLoad)
    {
        $this->loadModel('Villages');
        $this->loadModel('Subdistricts');
        $subDivs=$this->Subdistricts->find('list'); 
       if (in_array($modelToLoad,['gtv','security','nercormp','census']))
        {
        switch($modelToLoad){
            
                case 'nercormp':   $query=$this->Villages->find()               
                                     ->contain('Subdistricts')
                                     ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
                                     ->distinct('Villages.village_code')
                                     ->notMatching('populations',function($q) 
                                     {
                                        return $q->where(['populations.counting_agency'=>1]);
                                      });
                                      
                            break;  
                case 'security':   $query=$this->Villages->find()               
                            ->contain('Subdistricts')
                            ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
                            ->distinct('Villages.village_code')
                            ->notMatching('populations',function($q) 
                            {
                               return $q->where(['populations.counting_agency'=>2]);
                             });
                             
                            break; 
                case 'gtv':   $query=$this->Villages->find()               
                            ->contain('Subdistricts')
                            ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
                            ->distinct('Villages.village_code')
                            ->notMatching('populations',function($q) 
                            {
                               return $q->where(['populations.counting_agency'=>3]);
                             });
                             
                            break; 
                case 'census':   $query=$this->Villages->find()               
                            ->contain('Subdistricts')
                            ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
                            ->distinct('Villages.village_code')
                            ->notMatching('populations',function($q) 
                            {
                               return $q->where(['populations.counting_agency'=>4]);
                             });
                             
                            break; 
            }

        }
        
      else{
        $query=$this->Villages->find()
               
        ->contain('Subdistricts')
        ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
        ->distinct('Villages.village_code')
        ->notMatching($modelToLoad,function($q) 
        {
            return $q;
        });  
      }
        switch($modelToLoad){

            case 'Anganwadis'   : $sectorName='ANGANWADI';
                                  break;
            case 'EducationInfras' : $sectorName='EDUCATION INFRA';
                                     break;
            case 'HealthInfras'   : $sectorName='HEALTH INFRA';
                                     break;
            case 'FoodSecurities' : $sectorName='CAF&PD';
                                        break;   
            case 'Nregas'   : $sectorName='NREGA';
                                        break;
            case 'VillageNsaps' : $sectorName='NSAP';
                                           break;
            case 'VillageElectorals'   : $sectorName='ELECTION';
                                           break;
            case 'VillageSchemes' : $sectorName='VILLAGE SCHEME';
                                              break; 
            case 'nercormp'   : $sectorName='NERCORMP';
                                              break;
            case 'gtv' : $sectorName='GTV';
                                                 break;
            case 'VillagePhotos'   : $sectorName='VILLAGE PHOTO';
                                                 break;
            case 'security' : $sectorName='SECURITY REPORT';
                                                    break; 
            case 'census' : $sectorName='CENSUS';
                                                    break;                                                                                            
        }
       
       $this->set(compact('query','subDivs','sectorName'));  
           
    }
}
    