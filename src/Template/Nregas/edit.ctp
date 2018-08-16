<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nrega $nrega
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nrega->village_nrega_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nrega->village_nrega_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Village NREGA Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="nregas form large-9 medium-8 columns content">
    <?= $this->Form->create($nrega) ?>
    <fieldset>
        <legend><?= __('Edit Nrega') ?></legend>
        <h6>Village Name:<strong><?= $nrega->village->village_name?></strong> Ref. Yr. : <strong><?= $nrega->nrega_reference_year?></strong> </h6>
        <?php
           // echo $this->Form->control('nrega_reference_year');
           echo $this->Form->control('total_job_card',['Label'=>'Total Job Card:','required'=>true,'min'=>0]);
           // echo $this->Form->control('village_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
