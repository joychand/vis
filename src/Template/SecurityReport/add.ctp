<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Populations $educationInfra
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List  Village Security Report Data'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Add Village Photos and Intl Border Distance'), ['controller'=>'VillagePhotos','action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educationInfras form large-9 medium-8 columns content" >
    <?= $this->Form->create($securityreport,['id'=>'formSdo','autocomplete'=>'off']) ?>
        <legend><?= __('Add Security Report Village Data') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
        <?= $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr:','options'=> $years,'empty'=>'Select Ref. Yr','required'=>true,'value'=>$selected_ref_yr,'class'=>'ref_yr']);?>
        <div id="securityForm" class="dataForm">
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend>Security Report Form</legend>
        <?php
            
            echo $this->Form->control('total_household',['label'=>'1. Total Household No.:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_population',['label'=>'2. Total Population:','required'=>true,'min'=>0]);
           
           // echo $this->Form->control('village_code');
        ?>
        </fieldset>
        </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>