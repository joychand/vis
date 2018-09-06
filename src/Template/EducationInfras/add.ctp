<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EducationInfra $educationInfra
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Education Infras'), ['action' => 'index']) ?></li>
                
    </ul>
</nav>
<div class="educationInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($educationInfras) ?>
    <fieldset>
        <legend><?= __('Add Education Infra') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division:','options'=>$subdistricts,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true,'value'=>$selected]) ?>
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
         <?= $this->Form->control('education_reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>['2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018'],'empty'=>'Select Yr.','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id="eduForm" class="dataForm">
        
           
            <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
            <legend>School Types:</legend>
            <?php 
            echo $this->Form->control('total_govt_school',['label'=>'1.Total Govt. School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_adc_school',['label'=>'2.Total ADC School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_private_school',['label'=>'3.Total Private School:','required'=>true,'min'=>0]);?>
            </fieldset>
            <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
            <legend>Primary School:</legend>
            <?php 
            
            echo $this->Form->control('total_primary_school',['label'=>'4.Total Primary School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_primary_student',['label'=>'5.Total Primary Student:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_primary_teacher',['label'=>'6.Total Primary Teacher:','required'=>true,'min'=>0]);?>
            </fieldset>
            <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
            <legend>Junior High School:</legend>
            <?php
            echo $this->Form->control('total_jhs',['label'=>'6.Total Jr High School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_jhs_student',['label'=>'7.Total Jr HS Student:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_jhs_teacher',['label'=>'8.Total JHS Teacher:','required'=>true,'min'=>0]);?>
            </fieldset>
            <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
            <legend>Sec. School:</legend>
            <?php
            echo $this->Form->control('total_secondary_school',['label'=>'8.Total Secondary School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_secondary_student',['label'=>'9.Total Secondary Student:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_secondary_teacher',['label'=>'10.Total Sec Teacher:','required'=>true,'min'=>0]);?>
            </fieldset>
            <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
            <legend>Hr. Sec. School:</legend>
            <?php
            echo $this->Form->control('total_hrsec_school',['label'=>'11.Total Hr.Secondary School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_hrsec_student',['label'=>'12.Total Hr. Secondary Student:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_hrsec_teacher',['label'=>'13.Total Hr.Sec Teacher:','required'=>true,'min'=>0]);?>
            </fieldset>
            
           
       
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
