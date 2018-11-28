<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;

// $this->layout = 'default';
 $loginUrl = $this->Url->build(['controller'=>'users','action' => 'login']); 
 $reportUrl = $this->Url->build(['controller'=>'Villageprofile','action'=>'home']);
 $get_empty_anganwadis=$this->Url->build(['action'=>'get_empty_village','Anganwadis']);
 $get_empty_health=$this->Url->build(['action'=>'get_empty_village','HealthInfras']);
 $get_empty_education=$this->Url->build(['action'=>'get_empty_village','EducationInfras']);
 $get_empty_cafpd=$this->Url->build(['action'=>'get_empty_village','FoodSecurities']);
 $get_empty_nrega=$this->Url->build(['action'=>'get_empty_village','Nregas']);
 $get_empty_nsaps=$this->Url->build(['action'=>'get_empty_village','VillageNsaps']);
 $get_empty_election=$this->Url->build(['action'=>'get_empty_village','VillageElectorals']);
 $get_empty_schemes=$this->Url->build(['action'=>'get_empty_village','VillageSchemes']);
 $get_empty_nercormp=$this->Url->build(['action'=>'get_empty_village','nercormp']);
 $get_empty_security=$this->Url->build(['action'=>'get_empty_village','security']);
 $get_empty_gtv=$this->Url->build(['action'=>'get_empty_village','gtv']);
 $get_empty_census=$this->Url->build(['action'=>'get_empty_village','census']);
 $get_empty_photo=$this->Url->build(['action'=>'get_empty_village','VillagePhotos']);

$cakeDescription = 'VIS: Chandel Village Information System';
?>
<?= $this->Html->script('count.js',['block'=>'scriptBottom'])?>

<div class="container small-centered medium-centered large-centered" style="padding:10px; padding-bottom:80px; ">



<div class="row"><legend style="text-align:center">Date Entry Status</legend></div>
 <div class="row fullWidth" > 
    <div class="large-3  columns">
        <div class="card-info primary">
          <div class="card-info-label">
            <div class="card-info-label-text">
            
            </div>
          </div>
        
            <div class="card-info-content">
              <h3 class="lead dash-title" style=" color:#ffae00"> Angwandis</h3>
              <hr class="dash-hr"> 
              <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
              <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $anganwadi_village_entered?></span></p>
              
              <a href="<?=$get_empty_anganwadis?>" ><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $anganwadi_village_entered ?> </span></p></a>
             
            </div>
        </div>    
    </div>
    <div class="large-3  columns">
        <div class="card-info primary">
          <div class="card-info-label">
            <div class="card-info-label-text">
            
            </div>
          </div>
          <div class="card-info-content">
            <h3 class="lead dash-title" style=" color:purple"> Health Infras</h3>
            <hr class="dash-hr"> 
            <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
            <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $health_village_entered?></span></p>
            <a href="<?=$get_empty_health?>" ><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $health_village_entered ?></span></p></a>
          </div>
        </div> 
    </div>

    <div class="large-3  columns">
        <div class="card-info primary">
          <div class="card-info-label">
            <div class="card-info-label-text">
            
            </div>
          </div>
          <div class="card-info-content">
            <h3 class="lead dash-title" style=" color:violet"> Education</h3>
            <hr class="dash-hr"> 
            <p class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
            <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $education_village_entered?></span></p>
            <a href="<?=$get_empty_education?>" ><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $education_village_entered ?></span></p></a>
          </div>
        </div> 
    </div>

    <div class="large-3  columns">
        <div class="card-info primary">
          <div class="card-info-label">
            <div class="card-info-label-text">
            
            </div>
          </div>
          <div class="card-info-content">
            <h3 class="lead dash-title" style="color:blue"> CAF&PD</h3>
            <hr class="dash-hr"> 
            <p class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
            <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $cafpd_village_entered?></span></p>
            <a href="<?=$get_empty_cafpd?>" ><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $cafpd_village_entered ?></span></p></a>
          </div>
        </div> 
    </div>
 </div>

 <div class="row fullWidth"> 
<div class="large-3  columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
      </div>
      <div class="card-info-content">
        <h3 class="lead dash-title" style="color:green;"> NREGA</h3>
        <hr class="dash-hr"> 
        <p class="dash-target">Target Village: <span class="count dash-span"  ><?= $total_village?></span></p>
        <p class="dash-entered">Data Entered Village:<span class="count dash-span" > <?= $nrega_village_entered?></span></p>
        <a href="<?=$get_empty_nrega?>"><p class="dash-remain">Remaining Village: <span class="count dash-span" ><?= $total_village - $nrega_village_entered ?></span></p></a>
      </div>
    </div> 
</div> 

<div class="large-3  columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
      </div>
      <div class="card-info-content">
        <h3 class="lead dash-title" style=" color:red"> NSAP</h3>
        <hr class="dash-hr"> 
        <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
        <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $nsap_village_entered?></span></p>
        <a href="<?=$get_empty_nsaps?>"><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $nsap_village_entered ?></span></p></a>
      </div>
    </div> 
</div>  
<div class="large-3  columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
      </div>
      <div class="card-info-content">
        <h3 class="lead dash-title" style=" color:orange"> Election</h3>
        <hr class="dash-hr"> 
        <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
        <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $election_entered_village?></span></p>
        <a href="<?=$get_empty_election?>"><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $election_entered_village ?></span></p></a>
      </div>
    </div> 
</div>
        <div class="large-3  columns">
            <div class="card-info primary">
              <div class="card-info-label">
                <div class="card-info-label-text">
                
                </div>
              </div>
              <div class="card-info-content">
                <h3 class="lead dash-title" style=" color:green"> Village Schemes</h3>
                <hr class="dash-hr"> 
                <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
                <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $village_scheme_entered?></span></p>
                <a href="<?=$get_empty_schemes?>"><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $village_scheme_entered ?></span></p></a>
              </div>
            </div> 
        </div>  
  


 </div> 

 <div class="row fullWidth"> 
        <div class="large-3  columns">
            <div class="card-info primary">
              <div class="card-info-label">
                <div class="card-info-label-text">
                
                </div>
              </div>
              <div class="card-info-content">
                <h3 class="lead dash-title" style=" color:purple"> NERCORMP<span style="font-size:.5em !important">(Demography)</span></h3>
                <hr class="dash-hr"> 
                <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
                <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $nercormp_entered?></span></p>
                <a href="<?=$get_empty_nercormp?>"><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $nercormp_entered ?></span></p></a>
              </div>
            </div> 
        </div> 
        
        <div class="large-3  columns">
            <div class="card-info primary">
              <div class="card-info-label">
                <div class="card-info-label-text">
                
                </div>
              </div>
              <div class="card-info-content">
                <h3 class="lead dash-title" style=" color:red"> Security<span style="font-size:.5em !important">(Demography)</span></h3>
                <hr class="dash-hr"> 
                <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
                <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $security_entered?></span></p>
                <a href="<?=$get_empty_security?>"><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $security_entered ?></span></p></a>
              </div>
            </div> 
        </div>  

        <div class="large-3  columns">
            <div class="card-info primary">
              <div class="card-info-label">
                <div class="card-info-label-text">
                
                </div>
              </div>
              <div class="card-info-content">
                <h3 class="lead dash-title" style=" color:green"> GTVReport<span style="font-size:.5em !important">(Demography)</span></h3>
                <hr class="dash-hr"> 
                <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
                <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $sdo_entered?></span></p>
                <a href="<?=$get_empty_gtv?>"><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $sdo_entered ?></span></p></a>
              </div>
            </div> 
        </div>  
        <div class="large-3  columns">
            <div class="card-info primary">
              <div class="card-info-label">
                <div class="card-info-label-text">
                
                </div>
              </div>
              <div class="card-info-content">
                <h3 class="lead dash-title" style=" color:purple"> Census<span style="font-size:.5em !important">(Demography)</span></h3>
                <hr class="dash-hr"> 
                <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
                <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $village_photos_entered?></span></p>
                <a href="<?=$get_empty_census?>"><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $village_photos_entered ?></span></p></a>
              </div>
            </div> 
        </div>
  </div>
        <div class="row fullWidth" >
        <div class=" large-3  columns end">
            <div class="card-info primary">
              <div class="card-info-label">
                <div class="card-info-label-text">
                
                </div>
              </div>
              <div class="card-info-content">
                <h3 class="lead dash-title" style=" color:purple"> VillagePhotos</h3>
                <hr class="dash-hr"> 
                <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
                <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $village_photos_entered?></span></p>
                <a href="<?=$get_empty_photo?>"><p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $village_photos_entered ?></span></p></a>
              </div>
            </div> 
        </div>   
        </div>
        

