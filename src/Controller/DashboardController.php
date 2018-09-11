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
        $health_village_entered= $this->HealthInfras->find()->select('HealthInfras.village_code')->distinct()->count('HealthInfras.village_code');
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

    public function getEmptyVillage($modelToload=null,$agency=null)
    {
       // dump($modelToload);
      //  dump($agency);
        if(isset($modelToload) && !isset($agency))
        {
            
          $this->loadModel($modelToload);
          $this->loadModel('Villages');         
       //** for Chakpikarong Subdivision ==1895 *** */
            $chakpikarong=$this->Villages->find()
               
               ->contain('Subdistricts')
               ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
               ->distinct('Villages.village_code')
               ->notMatching($modelToload,function($q) 
               {
                   return $q;
               })->where(['Villages.subdistrict_code'=>'1895']);

        /** for Chandel Subdivision ==1894 */
            $chandel=$this->Villages->find()               
                             ->contain('Subdistricts')
                             ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
                             ->distinct('Villages.village_code')
                             ->notMatching($modelToload,function($q) 
                             {
                                    return $q;
                             })->where(['Villages.subdistrict_code'=>'1894']);  
        /*** for Khengjoy Subdivision === 6496***/                     
            $khengjoy=$this->Villages->find()               
                             ->contain('Subdistricts')
                             ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
                             ->distinct('Villages.village_code')
                             ->notMatching($modelToload,function($q) 
                             {
                                    return $q;
                             })->where(['Villages.subdistrict_code'=>'6496']);   
        }
        else if (isset($modelToload) && isset($agency))
        {
            $this->loadModel($modelToload);
            $this->loadModel('Villages');         
        //     $subquery=$this->$modelToload->find('all')->where(['counting_agency'=>2]);
        //    sql($subquery);
            $query=$this->Villages->find()
               
               ->contain('Subdistricts')
               ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
              
               ->distinct('Villages.village_code')
               ->notMatching($modelToload,function($q) use($agency)
               {
                   return $q->where(['counting_agency'=>$agency]);
               });


               //$query->orderAsc('Subdistricts.subdistrict_name');
           // sql($query); 

        }
        
        //  $query=$this->Villages->find()
               
        //        ->contain('Subdistricts')
        //        ->select(['village_code','village_name','Subdistricts.subdistrict_name'])
        //        ->distinct('Villages.village_code')
        //        ->matching($modelToload,function($q) 
        //        {
        //            return $q;
        //        });
         //$data=$query->select('village_code','village')      
          // sql($query); 
          // $data=$query->toList(); 
          // $this->paginate = ['order'=>['Subdistricts.subdistrict_name'=>'ASC']];
           $remaining_village=$this->paginate($query,['order'=>['Subdistricts.subdistrict_name']]);
           $this->set(compact('remaining_village'));
            
    }
}
    