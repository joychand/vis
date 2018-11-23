
<?php $this->assign('title', 'DataEntry');?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php
         $user=$this->request->getSession()->read('Auth.User');
         if ( $user['role_id']==15)
        {?>
        <li><?= $this->Html->link($this->Html->tag('i','',array('class'=>'fi-graph-trend large')).__('Village Profile'), ['controller'=>'Villageprofile','action' => 'home'],['escape'=>false]) ?></li>
        <?php }
        else {?>
        
        <li><?= $this->Html->link($this->Html->tag('i','',array('class'=>'fi-torso large')).__('New User'), ['controller'=>'Users','action' => 'add'],['escape'=>false]) ?></li>
        <li><?= $this->Html->link($this->Html->tag('i','',['class'=>'fi-torsos-all']).__('Manage User'), ['controller'=>'Users','action' => 'index'],['escape'=>false]) ?></li><?php }?>
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

