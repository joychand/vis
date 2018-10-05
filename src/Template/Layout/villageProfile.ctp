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

$cakeDescription = 'VIS Chandel District, Manipur';
// $this->Html->scriptStart(['block' => true]);
// echo "function preventBack(){window.history.forward();}";
// echo 'setTimeout("preventBack()", 0);';
// echo " window.onunload=function(){null};";
   
   
// $this->Html->scriptEnd();
?>
<!DOCTYPE html>
<html>
<head>
<?=  $this->Html->script('jquery-3.3.1.min.js')?>
<?=  $this->Html->script('foundation.min.js')?> 
<?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
   
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?> 
    <!-- <?= $this->Html->css('foundation.min.css') ?> -->
    <?= $this->Html->css('nav-card') ?> 
    
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
  
    <?= $this->Html->css('foundation-icons/foundation-icons.css')?>
    <!-- <?= $this->Html->script('dropdown.js');?> -->
    <!-- <?= $this->Html->script('hideDash.js');?>  -->
    <?= $this->Html->script('dashSelect.js');?> 
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
            <li><?php  $user=$this->request->getSession()->read('Auth.User'); 
                       //dump($user);
                     if ( $user['role_id']==13)
                     {
                         echo $this->Html->link('Admin Home', array('controller' => 'Dataentry', 'action' => 'home'));
                         
                         
                         }?></li>
                <li><?php if ($this->Session->read('Auth')) {echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); }?></li>
                <li><?php if ($this->Session->read('Auth')) {
                    echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'changepassword', $user['user_id'])); }?></li>
               
               
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    
    <div class="container clearfix" style="padding:10px; padding-bottom:60px; ">
    
        <?= $this->fetch('content') ?>
    </div>
   
    
<div style=" width:100%;position:fixed;left:0;bottom: 0;background-color: #116d76;color: white;font-style: italic; font-size: 5px !important;">
        <p style="float:left;margin-left:5px;font-size: 13px !important;"> Designed and Developed by NIC Manipur &copy; Copyright 2018 NIC Manipur</p>
        <p style="float:right;margin-right:5px;font-size: 13px !important;">Village Information System of Chandel District, Manipur</p>
        <!-- <div style="clear: both;"></div> -->
</div>


 <script>
    $(document).foundation();

  </script>
 
   
    
</body>
<?= $this->fetch('scriptBottom') ?>
</html>