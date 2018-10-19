<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboard Controller
 *
 *
 * @method \App\Model\Entity\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{

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
}
    