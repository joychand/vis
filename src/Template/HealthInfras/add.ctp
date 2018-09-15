<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HealthInfra $healthInfra
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Health Infras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="healthInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($healthInfra,['autocomplete'=>'off']) ?>
    <fieldset>
        <legend><?= __('Add Village Health Infra') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
       <?= $this->Form->control('health_reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>['2011'=>'2011',
            '2012'=>'2012',
            '2013'=>'2013',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018'],'empty'=>'Select Ref. Yr','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id="healthForm" class="dataForm">
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend>HealthInfras Form</legend>
        <?php
           
           echo $this->Form->control('name_of_health_centre',['label'=>'1. Name of CHC/PHC/PHSC:','required'=>true]);
            // echo $this->Form->control('no_of_chc',['label'=>'1. No. of CHC','required'=>true,'min'=>0]);
            // echo $this->Form->control('no_of_phc',['label'=>'2. No. of PHC','required'=>true,'min'=>0]);
            // echo $this->Form->control('no_of_phsc',['label'=>'3. No. of PHSC','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_doctors',['label'=>'2. No. of Doctors','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_anm',['label'=>'3. No. of ANM','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_staff_nurse',['label'=>'4. No. of Staff Nurse','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_asha',['label'=>'5. No. of ASHA Worker','required'=>true,'min'=>0]);
            echo $this->Form->control('asha_mobile',['label'=>'6. ASHA Worker Mobile No.(One of Worker)','required'=>true,'maxlength'=>'10',"pattern"=>'^[789]\d{9}$','oninvalid'=>'setCustomValidity(\'Plz enter a valid mobile\')', 'oninput'=>'setCustomValidity(\'\')']);
            //echo $this->Form->control('village_code');
        ?>
        </fieldset>
        
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
