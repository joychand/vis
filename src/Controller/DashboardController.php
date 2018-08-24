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
        $total_village=$this->Villages->find()->count('DISTINCT `village_code`');
        $health_village_entered= $this->HealthInfras->find()->count(' village_code');
        $anganwadi_village_entered= $this->Anganwadis->find()->select('Anganwadis.village_code')->distinct()->count('Anganwadis.village_code');
        $education_village_entered= $this->EducationInfras->find()->select('village_code')->distinct()->count('village_code');
        $cafpd_village_entered= $this->FoodSecurities->find()->select('village_code')->distinct()->count('village_code');
        $nrega_village_entered= $this->Nregas->find()->select('village_code')->distinct()->count('village_code');
        $nsap_village_entered= $this->VillageNsaps->find()->select('village_code')->distinct()->count('village_code');
        $this->set(compact('total_village','health_village_entered','anganwadi_village_entered','education_village_entered',
                            'cafpd_village_entered','nrega_village_entered','nsap_village_entered'));

       
    }
}
    