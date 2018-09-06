<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


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
    public function index()
    {
        $session = $this->request->session();
        if ($this->request->is('post')) {
            //debug($this->request->getData('subdistrict_code'));
            $session->write('subdivision',$this->request->getData('subdistrict_code'));
            $session->write('village',$this->request->getData('village_code'));
            return $this->redirect(['action' => 'view']);
        }
        $this->loadModel('Subdistricts');
        $this->loadModel('Villages');
       
        $subdivision= $this->Subdistricts->find('list');       
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
                'vill_anganwadi','vill_nsap','vill_cafpd','vill_edn'));
    }

    public function getvillage()
    {
        
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
}
