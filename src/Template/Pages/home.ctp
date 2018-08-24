<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

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

<div class="large-4 medium-5 columns">
<?php  $cell = $this->cell('Anganwadis'); ?>
<?= $cell ?>
</div>
<div class="large-4 medium-5 columns">
<?php  $cell = $this->cell('HealthInfras'); ?>
<?= $cell ?>
</div>
<div class="large-4 medium-5 columns">
<div class="card-info primary">
  <div class="card-info-label">
    <div class="card-info-label-text">
      AngWdi
    </div>
  </div>
  <div class="card-info-content">
  <h3 class="lead">Anganwadi</h3>
    <div><span class="count">356</span></div>
    <p>Data Entered Village: 21</p>
    <p>Remaining Village: 21</p>
  </div>
</div>
</div>
<div class="large-4 medium-5 columns">
<div class="card-info primary">
  <div class="card-info-label">
    <div class="card-info-label-text">
      Elec
    </div>
  </div>
  <div class="card-info-content">
  <h3 class="lead">Election</h3>
    <p>Target Village: 356</p>
    <p>Data Entered Village: 21</p>
    <p>Remaining Village: 21</p>
  </div>
</div>
</div>
<div class="large-4 medium-5 columns">
<div class="card-info primary">
  <div class="card-info-label">
    <div class="card-info-label-text">
     NER
    </div>
  </div>
  <div class="card-info-content">
  <h3 class="lead">NERCOMP(DemoGraphy)</h3>
    <p>Target Village: 356</p>
    <p>Data Entered Village: 21</p>
    <p>Remaining Village: 21</p>
  </div>
</div>
</div>

<div class="large-4 medium-5 columns">
<div class="card-info primary">
  <div class="card-info-label">
    <div class="card-info-label-text">
      NSAP
    </div>
  </div>
  <div class="card-info-content">
  <h3 class="lead">NSAP</h3>
    <p>Target Village: 356</p>
    <p>Data Entered Village: 21</p>
    <p>Remaining Village: 21</p>
  </div>
</div>
</div>

<div class="large-4 medium-5 columns">
<div class="card-info primary">
  <div class="card-info-label">
    <div class="card-info-label-text">
      SDO
    </div>
  </div>
  <div class="card-info-content">
  <h3 class="lead">SDO Report(Demography)</h3>
    <p>Target Village: 356</p>
    <p>Data Entered Village: 21</p>
    <p>Remaining Village: 21</p>
  </div>
</div>
</div>

<div class="large-4 medium-5 columns">
<div class="card-info primary">
  <div class="card-info-label">
    <div class="card-info-label-text">
     Secu
    </div>
  </div>
  <div class="card-info-content">
  <h3 class="lead">Security Report(Demography)  </h3>
    <p>Target Village: 356</p>
    <p>Data Entered Village: 21</p>
    <p>Remaining Village: 21</p>
  </div>
</div>
</div>



    


    






    
    <!-- <div style="margin: auto;  width: 50%; border: 3px;padding: 10px;">
        <h1 style="text-align: center"><?= $this->HTML->link('Dataentry',['controller'=>'Dataentry','action'=>'data']) ?></h1>
    </div> -->


</body>
</html>
