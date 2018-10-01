<?php
    $this->layout = false;
    $cakeDescription = 'CVIS: Chandel Village Information System';
?>
<!DOCTYPE html>
<html >
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
    <?= $this->Html->css('nav-card') ?> 
    
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
    <?= $this->Html->script('jquery-3.3.1.min.js')?>
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
    <?= $this->Html->script('dropdown.js');?>
   
   

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
    <div class="large-6 medium-8 small-9 small-centered medium-centered large-centered columns">
        <?= $this->Form->create() ?>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <div class="row">
       
            <fieldset style="padding:0 !important">    
                <legend><?= __('Village Profile') ?></legend>  </fieldset>        
       
        </div>
        <div class="row">
            <?= $this->Form->control('subdistrict_code',['type'=>'select','label'=>'Sub-Division:','options'=>$subdivision,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true]) ?>
        </div>
        <div class="row">
            <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true]) ?> 
        </div>
     
         <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
    <!-- <div class="row"> -->
    
     <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:navy !important; background-clip: content-box;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/pharmacy.svg" style="width:150px;height:90px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">HealthInfra</h3>
            </a>
        </div>
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" >
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/education.svg" style="width:150px;height:90px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">EducationInfra</h3>
            </a>
        </div>
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#"  style="background:purple !important;  background-clip: content-box;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/baby-white.svg" style="width:150px;height:90px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Anganwadi</h3>
                
            </a>
        </div> 
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/population.svg" style="width:150px;height:90px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Demography</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total Population: 664</h6>
                    <h6 class="dashboard-nav-card-kpi">Total Household: 64</h6>
                </div> 
            </a>
        </div>         
    <!-- </div> -->
    
         
        <!-- <div class="row"> -->
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:red !important;  background-clip: content-box;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/social-care.svg" style="width:150px;height:90px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">NSAP</h3>
                <div class="dashboard-nav-card-content">
                    <h6 class="dashboard-nav-card-kpi">Total Beneficiary: 64</h6>
                   
                </div>  
                <!-- <h6 class="dashboard-nav-card-content">Total Beneficiary: 64</h6>
                <h6 class="dashboard-nav-card-content2">dfgdf: 64</h6> -->
            </a>
        </div>
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#" style="background:green !important;  background-clip: content-box;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/nrega.svg" style="width:150px;height:90px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">NREGA</h3>
            </a>
        </div>
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/picture.svg" style="width:150px;height:90px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Photo</h3>
                
            </a>
        </div> 
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#"  style="background:violet !important;  background-clip: content-box;">
                <!-- <i class="dashboard-nav-card-icon fi-torso large" aria-hidden="true"></i> -->
                <img  class="dashboard-nav-card-icon" src="img/population.svg" style="width:150px;height:90px" alt="sdfd">
                <h3 class="dashboard-nav-card-title">Demography</h3>
            </a>
        </div>         
        <!-- </div> -->
          
    
</div>


</body>
</html>