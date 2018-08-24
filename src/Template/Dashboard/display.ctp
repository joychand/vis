<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;

$this->layout = false;

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
    <?= $this->Html->css('dashboard.css')?>
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
    <?= $this->Html->script('jquery-3.3.1.min.js')?>
    <?= $this->Html->script('count.js')?>

     <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet"> 
    
                        
</head>
<body >

<header class="row">
    <div class="header-image"><?= $this->Html->image('Logo_kanglasha.png') ?></div>
    <div class="header-title">
        <h1>Village Information System (VIS) of Chandel District, Manipur</h1>

    </div>
</header>
<div class="row">
  <div class=" tiny-12 small-8 small-centered columns ">
      
          <ul class=" small button-group even-3">
            <li><a class="hollow button primary" href="#">Login <i class="fi-torso large" style="font-size: 1.2rem;"></i></a></li>
            <li><a class=" hollow button info" href="#">Report(Demo)</a></li>
            <li><a class="hollow button warning" href="#">Secondary</a></li>
          </ul>    
        
       
  </div>
</div>

<div class="large-4 medium-5 columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
       </div>
    
        <div class="card-info-content">
          <h3 class="lead" style="text-decoration: underline; color:#ffae00"> Angwandis</h3>
          <hr>
          <p  style="color:blue">Target Village: <span class="count"><?= $total_village?></span></p>
          <p style="color:green">Data Entered Village:<span class="count"> <?= $anganwadi_village_entered?></span></p>
          <p style="color:red">Remaining Village: <span class="count"><?= $total_village - $anganwadi_village_entered ?></span></p>
        </div>
    </div>    
</div>
<div class="large-4 medium-5 columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
      </div>
      <div class="card-info-content">
        <h3 class="lead" style="text-decoration: underline; color:#ffae00"> Health Infras</h3>
        <hr>
        <p  style="color:blue">Target Village: <span class="count"><?= $total_village?></span></p>
        <p style="color:green">Data Entered Village:<span class="count"> <?= $health_village_entered?></span></p>
        <p style="color:red">Remaining Village: <span class="count"><?= $total_village - $health_village_entered ?></span></p>
      </div>
    </div> 
</div>

<div class="large-4 medium-5 columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
      </div>
      <div class="card-info-content">
        <h3 class="lead" style="text-decoration: underline; color:violet"> Education</h3>
        <hr>
        <p  style="color:blue">Target Village: <span class="count"><?= $total_village?></span></p>
        <p style="color:green">Data Entered Village:<span class="count"> <?= $education_village_entered?></span></p>
        <p style="color:red">Remaining Village: <span class="count"><?= $total_village - $education_village_entered ?></span></p>
      </div>
    </div> 
</div>

<div class="large-4 medium-5 columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
      </div>
      <div class="card-info-content">
        <h3 class="lead" style="text-decoration: underline; color:blue"> CAF&PD</h3>
        <hr>
        <p  style="color:blue">Target Village: <span class="count"><?= $total_village?></span></p>
        <p style="color:green">Data Entered Village:<span class="count"> <?= $cafpd_village_entered?></span></p>
        <p style="color:red">Remaining Village: <span class="count"><?= $total_village - $cafpd_village_entered ?></span></p>
      </div>
    </div> 
</div>

  <div class="large-4 medium-5 columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
      </div>
      <div class="card-info-content">
        <h3 class="lead" style="text-decoration: underline; color:green"> NREGA</h3>
        <hr>
        <p  style="color:blue">Target Village: <span class="count"><?= $total_village?></span></p>
        <p style="color:green">Data Entered Village:<span class="count"> <?= $nrega_village_entered?></span></p>
        <p style="color:red">Remaining Village: <span class="count"><?= $total_village - $nrega_village_entered ?></span></p>
      </div>
    </div> 
</div> 

<div class="large-4 medium-5 columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
      </div>
      <div class="card-info-content">
        <h3 class="lead" style="text-decoration: underline; color:red"> NSAP</h3>
        <hr>
        <p  style="color:blue">Target Village: <span class="count"><?= $total_village?></span></p>
        <p style="color:green">Data Entered Village:<span class="count"> <?= $nsap_village_entered?></span></p>
        <p style="color:red">Remaining Village: <span class="count"><?= $total_village - $nsap_village_entered ?></span></p>
      </div>
    </div> 
</div>  
<div class="large-4 medium-5 columns">
    <div class="card-info primary">
      <div class="card-info-label">
        <div class="card-info-label-text">
        
        </div>
      </div>
      <div class="card-info-content">
        <h3 class="lead" style="text-decoration: underline; color:red"> Election</h3>
        <hr>
        <p  style="color:blue">Target Village: <span class="count"><?= $total_village?></span></p>
        <p style="color:green">Data Entered Village:<span class="count"> <?= $nsap_village_entered?></span></p>
        <p style="color:red">Remaining Village: <span class="count"><?= $total_village - $nsap_village_entered ?></span></p>
      </div>
    </div> 
</div>  

    






    
    

</body>
</html>