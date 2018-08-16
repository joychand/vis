<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HealthInfra $healthInfra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $healthInfra->health_infra_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $healthInfra->health_infra_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Village Health Infras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="healthInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($healthInfra) ?>
    <h6>Village name: <strong><?= $healthInfra->village->village_name ?></strong> Ref.Yr.:<strong><?= $healthInfra->health_reference_year ?></strong>  </h6>
    <fieldset>
        <legend><?= __('Edit Health Infra') ?></legend>
        <?php
            
            echo $this->Form->control('no_of_chc',['label'=>'No. of CHC','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_phc',['label'=>'No. of PHC','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_phsc',['label'=>'No. of PHSC','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_doctors',['label'=>'No. of Doctors','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_anm',['label'=>'No. of ANM','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_staff_nurse',['label'=>'No. of Staff Nurse','required'=>true,'min'=>0]);
            echo $this->Form->control('no_of_asha',['label'=>'No. of ASHA Worker','required'=>true,'min'=>0]);
            echo $this->Form->control('asha_mobile',['label'=>'ASHA Worker Mobile No.','required'=>true]);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
