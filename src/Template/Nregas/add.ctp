<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nrega $nrega
 */
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village NREGA Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="nregas form large-9 medium-8 columns content">
    <?= $this->Form->create($nrega,['autocomplete'=>'off']) ?>
    <fieldset>
        <legend><?= __('Add NREGA Village Data') ?></legend>
        
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division:','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'select Village:','id'=>'village','required'=>true,'options'=>$villages]) ?>
        <?= $this->Form->control('nrega_reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>$years,'empty'=>'Select Ref. Yr','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id="nregaForm" class="dataForm">
        <?php
           
            //echo $this->Form->control('nrega_reference_year');
            echo $this->Form->control('total_job_card',['Label'=>'1. Total Job Card:','required'=>true,'min'=>0]);
            //echo $this->Form->control('village_code');
        ?>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
