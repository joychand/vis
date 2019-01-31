<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConnectivityInfra $connectivityInfra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Connectivity Infras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="connectivityInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($connectivityInfra,['autocomplete'=>'off']) ?>
    <fieldset>
        <legend><?= __('Add Connectivity Infra') ?></legend>
         <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village','id'=>'village','empty'=>'Select Village','required'=>true,'options'=>$villages]) ?>
         <?= $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>$years,'empty'=>'Select Yr.','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id="connectivityForm" class="dataForm">
            <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
                <legend>Connectivity Infra Form</legend>
                    <?php
                    echo $this->Form->control('approached_road_status',['label'=>'1. Approached Road Status','type'=>'select','required'=>'true','options'=>['Y'=>'Yes','N'=>'No'],'empty'=>'-select-']);
                    echo $this->Form->control('distance_from_appr_road',['label'=>'2. Distance from Appr Road (km) ']);
                    ?>
            </fieldset>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
