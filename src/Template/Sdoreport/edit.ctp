<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anganwadi $anganwadi
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdoreport->reference_year],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdoreport->reference_year,$sdoreport->village_code,$sdoreport->counting_agency)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Village SDOReport'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="anganwadis form large-9 medium-8 columns content">
    <?= $this->Form->create($sdoreport) ?>
    <fieldset>
        <legend><?=  __('Edit Village SDO Report: ') ?>   </legend>
        <h6>Village Name: <strong><?= $sdoreport->village->village_name?></strong> Ref. Yr. :<strong><?= $sdoreport->reference_year ?> </strong> </h6>
        <?php
           
           
            echo $this->Form->control('total_household',['label'=>'Total Household No.:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_population',['label'=>'Total Population:','required'=>true,'min'=>0]);
           
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
