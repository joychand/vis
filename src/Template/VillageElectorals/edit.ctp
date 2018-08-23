<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageElectoral $villageElectoral
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $villageElectoral->village_electoral_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $villageElectoral->village_electoral_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Village Electorals'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageElectorals form large-9 medium-8 columns content">
    <?= $this->Form->create($villageElectoral) ?>
    <h6>Village Name:<strong><?= $villageElectoral->village->village_name?></strong> Ref. Yr. : <strong><?= $villageElectoral->reference_year?></strong> </h6>
    <fieldset>
        <legend><?= __('Edit Village Electoral') ?></legend>
        <?php
           // echo $this->Form->control('reference_year');
           echo $this->Form->control('electoral_total_household',['required'=>true,'min'=>0]);
           echo $this->Form->control('electoral_total_voter',['required'=>true,'min'=>0]);
           // echo $this->Form->control('village_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
