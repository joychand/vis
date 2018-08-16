<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anganwadi $anganwadi
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit SDO Report'), ['action' => 'edit', $sdoreport->reference_year]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete SDOReport'), ['action' => 'delete', $sdoreport->reference_year], ['confirm' => __('Are you sure you want to delete # {0}?', $sdoreport->reference_year)]) ?> </li>
        <li><?= $this->Html->link(__('List Village SDOReport'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village SDOReport'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="anganwadis view large-9 medium-8 columns content">
    <h3> SDO Report for Village: <?= h($sdoreport->village->village_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village Name:') ?></th>
            <td><?= h($sdoreport->village->village_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref. Yr.') ?></th>
            <td><?= $this->Number->format($sdoreport->reference_year,['pattern'=>'####']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Population of the Village:') ?></th>
            <td><?= $this->Number->format($sdoreport->total_population) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Household no. of the Village:') ?></th>
            <td><?= $this->Number->format($sdoreport->total_household) ?></td>
        </tr>
       
    </table>
</div>
