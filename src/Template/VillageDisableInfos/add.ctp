<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageDisableInfo $villageDisableInfo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Village Disable Infos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageDisableInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($villageDisableInfo,['autocomplete'=>'off']) ?>
    <fieldset>
        <legend><?= __('Add Village Disability Info') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village','id'=>'village','empty'=>'Select Village','required'=>true,'options'=>$villages]) ?>
        <?= $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>$years,'empty'=>'Select Yr.','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id="DisableForm" class="dataForm">
            <fieldset  class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
                <legend>Village Disability Infos Form</legend>
                <?php
                       // echo $this->Form->control('village_code');
                       // echo $this->Form->control('reference_year');
                        echo $this->Form->control('blind',['label'=>'1. People with Blind Disability (Nos)','required'=>true]);
                        echo $this->Form->control('deaf',['label'=>'2. People with Deaf Disability(Nos)','required'=>true]);
                        echo $this->Form->control('others',['label'=>'3. Others Disabilities(Nos)','required'=>true]);
                ?>
            </fieldset>
        </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
