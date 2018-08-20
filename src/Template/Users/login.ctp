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


$this->layout = false;


$cakeDescription = 'VIS:  Village Information System';
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
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
    
                        
</head>
<body class="home">

<header class="row">
    <div class="header-image"><?= $this->Html->image('Logo_kanglasha.png') ?></div>
    <div class="header-title">
        <h1>Village Information System (VIS) of Chandel District, Manipur</h1>

    </div>
</header>
<?= $this->Flash->render() ?>
    <div class=" large-5 medium-4 " style="margin: auto !important ;border: 3px !important; padding: 10px!important;">
        <h3 align="center">Login</h3>
        <?= $this->Form->create() ?>
        <?= $this->Form->control('user_name',['required'=>true]) ?>
        <?= $this->Form->control('password',['type'=>'password','required'=>true]) ?>
        
        <?= $this->Form->button('Login') ?>
        <?= $this->Form->end() ?>
    </div>
    

</div>
<div style=" width:100%;position:fixed;left:0;bottom: 0;background-color: #116d76;color: white;font-style: italic; font-size: 13px;">
        <p style="float:left;margin-left:5px;">Designed and Developed by NIC Manipur &copy; Copyright 2018 NIC Manipur</p>
        <p style="float:right;margin-right:5px;">Village Information System of Chandel District, Manipur</p>
        <!-- <div style="clear: both;"></div> -->
</div>
</body>
</html>

















