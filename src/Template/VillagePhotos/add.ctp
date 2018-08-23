<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillagePhoto $villagePhoto
 */

?>
<?php $this->layout = 'scheme';?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['controller'=>'Securityreport','action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List  Village Security Report Data'), ['controller'=>'Securityreport','action' => 'index']) ?></li>
       
    </ul>
</nav>
<div class="villagePhotos form large-9 medium-8 columns content" >
    <?= $this->Form->create($villagePhoto,['type'=>'file','autocomplete'=>'off']) ?>
        <legend><?= __('Add Village Info and Photos') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true]) ?>
        <div id="photoForm" class="data">
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend>Village Info form </legend>
        
        <?php
           echo $this->Form->control('Villages.VillageInfos.distance_from_ib',['label'=>'Distance from Intl. Border (in km)','required'=>true]);
      
           echo $this->Form->control('villagePhoto.0.photo',['type'=>'file','accept'=>'image/jpeg', 'required'=>true,'label'=>'Village Photo 1 (size<=1mb, type:jpeg/png):']);
          echo $this->Form->error('villagePhoto.0.photo');
           echo $this->Form->control('villagePhoto.1.photo',['type'=>'file','label'=>'Village Photo 2 (size<=1mb, type:jpeg/png)']);
           echo $this->Form->control('villagePhoto.2.photo',['type'=>'file','label'=>'Village Photo 3 (size<=1mb, type:jpeg/png)']);
           
           // echo $this->Form->control('village_code');
        ?>
        </fieldset>
        </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
