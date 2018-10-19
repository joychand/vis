
<?php $this->assign('title', 'Admin View');?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php
         $user=$this->request->getSession()->read('Auth.User');
         if ( $user['role_id']==15)
        {?>
        <li><?= $this->Html->link(__('Reports'), ['controller'=>'Villageprofile','action' => 'home']) ?></li>
        <?php }
        else {?>
        
        <li><?= $this->Html->link(__('New User'), ['controller'=>'Users','action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Manage User'), ['controller'=>'Users','action' => 'index']) ?></li><?php }?>
    </ul>
</nav>
<div  class=" large-9 medium-8 " style="margin: auto !important ;border: 3px !important; padding: 10px!important;">
    <h3 style="text-align: center">Welcome to  Village Information System of Chandel District, Manipur</h3>
 
 <fieldset>
<?= $this->Form->create() ?>
<?= $this->Form->control('category',['type'=>'select','required'=>true,'label'=>'Department/Schemes:','options'=>['Anganwadi','CAF&PD','Education(Infra)','Election','Health(Infra)','NERCORMP(Demography)','NREGA','NSAP','GTV Report (Demography)','VillageSchemes','Security Report(Demography)'],'empty'=>'Select Dept/Schemes']) ?> 

 <?= $this->Form->button('Next>>')?>
 <?= $this->Form->end()?>
 </fieldset>
</div>

