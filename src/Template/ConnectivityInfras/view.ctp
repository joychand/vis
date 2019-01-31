<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConnectivityInfra $connectivityInfra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Connectivity Infra'), ['action' => 'edit', $connectivityInfra->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Connectivity Infra'), ['action' => 'delete', $connectivityInfra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connectivityInfra->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Connectivity Infras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Connectivity Infra'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="connectivityInfras view large-9 medium-8 columns content">
    <h3><?= h($connectivityInfra->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Approached Road Status') ?></th>
            <td><?= h($connectivityInfra->approached_road_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($connectivityInfra->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($connectivityInfra->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Distance From Appr Road') ?></th>
            <td><?= $this->Number->format($connectivityInfra->distance_from_appr_road) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Year') ?></th>
            <td><?= $this->Number->format($connectivityInfra->reference_year) ?></td>
        </tr>
    </table>
</div>
