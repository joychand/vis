
<?php $this->assign('title', 'Admin View');?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller'=>'Users','action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Manage User'), ['controller'=>'Users','action' => 'index']) ?></li>
    </ul>
</nav>
<div  class=" large-6 medium-5 " style="margin: auto !important ;border: 3px !important; padding: 10px!important;">
    <h3 style="text-align: center">Welcome to  Village Infromation System of Chandel Distict, Manipur</h3>
 
 <fieldset>
<?= $this->Form->create() ?>
<?= $this->Form->control('category',['type'=>'select','label'=>'Department/Schemes:','options'=>['Anganwadi','CAF&PD','Education(Infra)','Election','Health(Infra)','NERCORMP(Demography)','NREGA','NSAP','SDO Report (Demography)','Schemes','Security Report(Demography)'],'empty'=>'Select Dept/Schemes']) ?> 

 <?= $this->Form->button('Next>>')?>
 <?= $this->Form->end()?>
 </fieldset>
</div>

