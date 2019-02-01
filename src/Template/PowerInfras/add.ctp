<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PowerInfra $powerInfra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Village Power Infras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="powerInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($powerInfra,['autocomplete'=>'off']) ?>
    <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
    <fieldset>
        <legend><?= __('Add Village Power Infra Data') ?></legend>
        <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village','id'=>'village','empty'=>'Select Village','required'=>true,'options'=>$villages]) ?>
        <?= $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>$years,'empty'=>'Select Yr.','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id="PowerForm" class="dataForm">
            <fieldset "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
                <legend>Village Power Infra Form</legend>
            
            
                <?php
                    //echo $this->Form->control('village_code');
                    echo $this->Form->control('household_no',['label'=>'1.Total Household','required'=>'true']);
                    echo $this->Form->control('electrified_household_no',['label'=>'2.Electrified Household','required'=>'true']);
                    //echo $this->Form->control('reference_year');
                ?>
            </fieldset>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
