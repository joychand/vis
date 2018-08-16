<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HealthInfra $healthInfra
 */
?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<?php $this->Html->script('healthhidediv.js', ['block'=>true]);?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Health Infras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="healthInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($healthInfra) ?>
    <fieldset>
        <legend><?= __('Add Health Infra') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true]) ?>
        <div id="healthForm">
        <?php
            echo $this->Form->control('health_reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>['2011'=>'2011',
            '2012'=>'2012',
            '2013'=>'2013',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018'],'empty'=>'Select Ref. Yr','required'=>true]);
            echo $this->Form->control('no_of_chc',['label'=>'No. of CHC','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_phc',['label'=>'No. of PHC','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_phsc',['label'=>'No. of PHSC','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_doctors',['label'=>'No. of Doctors','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_anm',['label'=>'No. of ANM','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_staff_nurse',['label'=>'No. of Staff Nurse','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_asha',['label'=>'No. of ASHA Worker','required'=>true,'min'=>0]);
            echo $this->Form->control('asha_mobile',['label'=>'ASHA Worker Mobile No.','required'=>true]);
            //echo $this->Form->control('village_code');
        ?>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
