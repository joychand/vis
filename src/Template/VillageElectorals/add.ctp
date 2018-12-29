<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageElectoral $villageElectoral
 */
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Electorals Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageElectorals form large-9 medium-8 columns content">
    <?= $this->Form->create($villageElectoral,['autocomplete'=>'off']) ?>
    <fieldset>
        <legend><?= __('Add Village Electoral') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division:','options'=>$subdistricts,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true,'value'=>$selected]) ?>
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
         <?= $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>$years,'required'=>true,'empty'=>'Select Ref. Yr.','class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id ="electionForm" class="dataForm">
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend>Election Form</legend>
        <?php
            
            echo $this->Form->control('electoral_total_household',['required'=>true,'min'=>0,'label'=>'1. Total Household']);
            echo $this->Form->control('electoral_total_voter',['required'=>true,'min'=>0, 'label'=>'2. Total Voter']);
           // echo $this->Form->control('village_code');
        ?>
        </fieldset>
        </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
