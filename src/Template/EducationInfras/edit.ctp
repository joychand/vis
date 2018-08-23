<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EducationInfra $educationInfra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
       
        <li><?= $this->Html->link(__(' Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $educationInfras->education_infra_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $educationInfras->education_infra_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Village Education Infras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="educationInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($educationInfras) ?>
    <fieldset>
        <legend><?= __('Edit Village Education Infra Data') ?></legend>
        <h6>Village Name:<strong><?= $educationInfras->village->village_name?></strong> Ref. Yr. : <strong><?= $educationInfras->education_reference_year?></strong> </h6>
        <?php
          //  echo $this->Form->control('education_reference_year');
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
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
