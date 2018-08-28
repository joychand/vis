<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;

$this->layout = false;
 $loginUrl = $this->Url->build(['controller'=>'users','action' => 'login']); 

$cakeDescription = 'CVIS: Chandel Village Information System';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?> 
    <!-- <?= $this->Html->css('dashboard.css')?> --> 
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
    <?= $this->Html->script('jquery-3.3.1.min.js')?>
    <?= $this->Html->script('count.js')?>

     <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> 
    
                        
</head>
<body >
<div class="container" style="padding:10px; padding-bottom:80px; ">
<header class="row " style:"width:100% !important">
    <div class="small-2 medium-2 columns" style="padding:10px !important;"><?= $this->Html->image('Logo_kanglasha.png') ?></div>
       <div class="small-10 medium-10 columns" style="text-align:right">
        <h1 style=" font-weight:300;font-size:1.1em;padding-bottom:0;">Village Information System (VIS)  </h1>
        <h1 style="font-size:.9em;padding-top:0;">Chandel District, Manipur  </h1>
       </div> 
       

  
    
</header>
<div class="row">
  <div class=" small-centered columns ">
      
          <ul class=" stack-for-small button-group even-3 round">
            <li><a class="hollow button primary" href="<?=$loginUrl?>" target="_blank" >LogIn <i class="fi-torso large" style="font-size: .9rem;"></i></a></li>
            <li><a class=" hollow button info" href="#">Report(Demo)</a></li>
            <li><a class="hollow button warning" href="#">Help</a></li>
          </ul>    
        
       
  </div>
</div>
<div class="row fullWidth" >
    <div class="large-3 medium-4 columns">
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
              <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $anganwadi_village_entered ?></span></p>
            </div>
        </div>    
    </div>
    <div class="large-3 medium-4 columns">
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
            <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $health_village_entered ?></span></p>
          </div>
        </div> 
    </div>

    <div class="large-3 medium-4 columns">
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
            <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $education_village_entered ?></span></p>
          </div>
        </div> 
    </div>

    <div class="large-3 medium-4 columns">
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
            <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $cafpd_village_entered ?></span></p>
          </div>
        </div> 
    </div>
</div>

<div class="row fullWidth">
<div class="large-3 medium-4 columns">
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
        <p class="dash-remain">Remaining Village: <span class="count dash-span" ><?= $total_village - $nrega_village_entered ?></span></p>
      </div>
    </div> 
</div> 

<div class="large-3 medium-4 columns">
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
        <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $nsap_village_entered ?></span></p>
      </div>
    </div> 
</div>  
<div class="large-3 medium-4 columns">
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
        <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $election_entered_village ?></span></p>
      </div>
    </div> 
</div>
        <div class="large-3 medium-4 columns">
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
                <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $village_scheme_entered ?></span></p>
              </div>
            </div> 
        </div>  
  


</div>

<div class="row fullWidth">
        <div class="large-3 medium-4 columns">
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
                <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $nercormp_entered ?></span></p>
              </div>
            </div> 
        </div> 
        
        <div class="large-3 medium-4 columns">
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
                <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $security_entered ?></span></p>
              </div>
            </div> 
        </div>  

        <div class="large-3 medium-4 columns">
            <div class="card-info primary">
              <div class="card-info-label">
                <div class="card-info-label-text">
                
                </div>
              </div>
              <div class="card-info-content">
                <h3 class="lead dash-title" style=" color:green"> SDOReport<span style="font-size:.5em !important">(Demography)</span></h3>
                <hr class="dash-hr"> 
                <p  class="dash-target">Target Village: <span class="count dash-span"><?= $total_village?></span></p>
                <p class="dash-entered">Data Entered Village:<span class="count dash-span"> <?= $sdo_entered?></span></p>
                <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $sdo_entered ?></span></p>
              </div>
            </div> 
        </div>  
        <div class="large-3 medium-4 columns">
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
                <p class="dash-remain">Remaining Village: <span class="count dash-span"><?= $total_village - $village_photos_entered ?></span></p>
              </div>
            </div> 
        </div>  

</div> <!--  end of row div -->
        
       
</div>

<div style=" width:100%;position:fixed;left:0;bottom: 0;background-color: #116d76;color: white;font-style: italic; font-size: 5px !important;">
        <p style="float:left;margin-left:5px;font-size: 13px !important;"> Designed and Developed by NIC Manipur &copy; Copyright 2018 NIC Manipur</p>
        <p style="float:right;margin-right:5px;font-size: 13px !important;">Village Information System of Chandel District, Manipur</p>
      
</div>
     






    
    

</body>
</html>