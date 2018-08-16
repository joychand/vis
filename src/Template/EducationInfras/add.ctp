<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EducationInfra $educationInfra
 */
?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<?php $this->Html->script('eduhidediv.js', ['block'=>true]);?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Change Password'), ['controller'=>'Users','action' => 'changePassword']) ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Education Infras'), ['action' => 'index']) ?></li>
                
    </ul>
</nav>
<div class="educationInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($educationInfras) ?>
    <fieldset>
        <legend><?= __('Add Education Infra') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division:','options'=>$subdistricts,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true]) ?>
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true]) ?>
        <div id="eduForm">
        <?php
            echo $this->Form->control('education_reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>['2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018'],'empty'=>'Select Yr.','required'=>true]);
            echo $this->Form->control('total_govt_school',['label'=>'Total Govt. School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_adc_school',['label'=>'Total ADC School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_private_school',['label'=>'Total Private School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_primary_school',['label'=>'Total Primary School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_primary_student',['label'=>'Total Primary Student:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_jhs',['label'=>'Total Jr High School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_jhs_student',['label'=>'Total Jr HS Student:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_secondary_school',['label'=>'Total Secondary School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_secondary_student',['label'=>'Total Secondary Student:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_hrsec_school',['label'=>'Total Hr.Secondary School:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_hrsec_student',['label'=>'Total Hr. Secondary Student:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_college',['label'=>'No. of College:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_college_professor',['label'=>'No. of Professor:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_college_assoc_prof',['label'=>'No. of Assoc. Prof','required'=>true,'min'=>0]);
            echo $this->Form->control('total_college_asstt_prof',['label'=>'No. of Asst. Prof','required'=>true,'min'=>0]);
           // echo $this->Form->control('village_code');
        ?>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
