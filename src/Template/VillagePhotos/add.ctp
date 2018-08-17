<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillagePhoto $villagePhoto
 */

?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['controller'=>'Securityreport','action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List  Village Security Report Data'), ['controller'=>'Securityreport','action' => 'index']) ?></li>
       
    </ul>
</nav>
<div class="villagePhotos form large-9 medium-8 columns content" >
    <?= $this->Form->create($villagePhoto,['type'=>'file']) ?>
        <legend><?= __('Add Village Info and Photos') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true]) ?>
        <div id="photoForm">
        <?php
           echo $this->Form->control('Villages.VillageInfos.distance_from_ib',['label'=>'Distance from Intl. Border (in km)']);
           echo $this->Form->control('villagePhoto.0.photo',['type'=>'file','accept'=>'image/jpeg']);
           echo $this->Form->error('villagePhoto.0.photo');
           echo $this->Form->control('villagePhoto.1.photo',['type'=>'file']);
           echo $this->Form->control('villagePhoto.2.photo',['type'=>'file']);
           
           // echo $this->Form->control('village_code');
        ?>
        </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
