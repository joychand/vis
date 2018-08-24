<?php $this->layout = 'manager';?>

<?= $this->Html->css('bootstrap.min.css', ['block'=>true]) ?>
<?= $this->Html->script('bootstrap.min.js', ['block'=>true]) ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Manage Schemes'), ['controller'=>'Schemes','action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Manage Departments'), ['controller'=>'Departments','action' => 'index']) ?></li>
    </ul>
</nav>


<div  class="form large-9 medium-8 columns content " >
    <h3 style="text-align: center; color:green">Welcome to  Village Infromation System of Chandel Distict, Manipur </h3> 
 <h4 align="center">You are logged in as : VIS Manager </h4>
 <div class="text-center">
 
 </div>
 
</div>