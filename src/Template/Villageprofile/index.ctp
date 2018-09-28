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
       
            <fieldset>    
                <legend><?= __('Village Profile') ?></legend>        
       
        </div>
        <div class="row">
            <?= $this->Form->control('subdistrict_code',['type'=>'select','label'=>'Sub-Division:','options'=>$subdivision,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true]) ?>
        </div>
        <div class="row">
            <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true]) ?> 
        </div>
     </fieldset>  
         <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
    
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#">
                <i class="dashboard-nav-card-icon fa fa-users" aria-hidden="true"></i>
                <h3 class="dashboard-nav-card-title">Visitors</h3>
            </a>
        </div>
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#">
                <i class="dashboard-nav-card-icon fa fa-users" aria-hidden="true"></i>
                <h3 class="dashboard-nav-card-title">Visitors</h3>
            </a>
        </div>
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#">
                <i class="dashboard-nav-card-icon fa fa-users" aria-hidden="true"></i>
                <h3 class="dashboard-nav-card-title">Visitors</h3>
            </a>
        </div> 
        <div class="large-3 medium-6 small-12  columns">
            <a class="dashboard-nav-card" href="#">
                <i class="dashboard-nav-card-icon fa fa-users" aria-hidden="true"></i>
                <h3 class="dashboard-nav-card-title">Visitors</h3>
            </a>
        </div>           
  
    
</div>


</body>
</html>