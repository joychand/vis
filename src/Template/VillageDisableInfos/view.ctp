<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageDisableInfo $villageDisableInfo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Village Disable Info'), ['action' => 'edit', $villageDisableInfo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Village Disable Info'), ['action' => 'delete', $villageDisableInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageDisableInfo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Village Disable Infos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village Disable Info'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="villageDisableInfos view large-9 medium-8 columns content">
    <h3><?= h($villageDisableInfo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($villageDisableInfo->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($villageDisableInfo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Year') ?></th>
            <td><?= $this->Number->format($villageDisableInfo->reference_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Blind') ?></th>
            <td><?= $this->Number->format($villageDisableInfo->blind) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deaf') ?></th>
            <td><?= $this->Number->format($villageDisableInfo->deaf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Others') ?></th>
            <td><?= $this->Number->format($villageDisableInfo->others) ?></td>
        </tr>
    </table>
</div>
