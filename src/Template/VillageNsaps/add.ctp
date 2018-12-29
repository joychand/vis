<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageNsap $villageNsap
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Nsaps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageNsaps form large-9 medium-8 columns content">
    <?= $this->Form->create($villageNsap,['autocomplete'=>'off']) ?>
    <fieldset>
        <legend><?= __('Add Village Nsap') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division:','options'=>$subdistricts,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true,'value'=>$selected]) ?>
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
         <?= $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr:','options'=>$years,'empty'=>'Select Yr.','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id="nsapsForm" class="dataForm">
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend>NSAP Form</legend>
        <?php
            
            echo $this->Form->control('total_widows_beneficiary',['required'=>true,'min'=>0,'label'=>'1. Total Widow Beneficiaries:']);
            echo $this->Form->control('total_handicap_beneficiary',['required'=>true,'min'=>0,'label'=>'2. Total Differently Abled Beneficiaries:']);
            echo $this->Form->control('total_ignoaps_beneficiary',['label'=>'3. Total IGNOAPS Beneficiary','required'=>true,'min'=>0]);
           // echo $this->Form->control('village_code');
        ?>
        </fieldset>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
