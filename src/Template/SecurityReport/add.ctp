<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Populations $educationInfra
 */
?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('js.cookie.js', ['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<?php $this->Html->script('secutiyhidediv.js', ['block'=>true]);?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List  Village Security Report Data'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Add Village Photos and Intl Border Distance'), ['controller'=>'VillagePhotos','action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educationInfras form large-9 medium-8 columns content" >
    <?= $this->Form->create($securityreport,['id'=>'formSdo']) ?>
        <legend><?= __('Add Security Report Village Data') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
        <div id="securityForm">
        <?php
            echo $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr:','options'=> ['2011'=>'2011',
            '2012'=>'2012',
            '2013'=>'2013',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018'],'empty'=>'Select Ref. Yr','required'=>true,'value'=>$selected_ref_yr,'class'=>'ref_yr']);
            echo $this->Form->control('total_household',['label'=>'1. Total Household No.:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_population',['label'=>'2. Total Population:','required'=>true,'min'=>0]);
           
           // echo $this->Form->control('village_code');
        ?>
        </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>