<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PowerInfra $powerInfra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $powerInfra->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $powerInfra->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Power Infras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="powerInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($powerInfra) ?>
    <fieldset>
        <legend><?= __('Edit Village Power Infra') ?></legend>
        <h6>Village Name:<strong><?= $powerInfra->village->village_name?></strong> Ref. Yr. : <strong><?= $powerInfra->reference_year?></strong> </h6>
        <?php
           // echo $this->Form->control('village_code');
            echo $this->Form->control('household_no',['label'=>'1.Total Household','required'=>'true']);
            echo $this->Form->control('electrified_household_no',['label'=>'2.Electrified Household','required'=>'true']);
           // echo $this->Form->control('reference_year');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
