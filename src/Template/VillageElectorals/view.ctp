<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageElectoral $villageElectoral
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Village Electoral'), ['action' => 'edit', $villageElectoral->village_electoral_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Village Electoral'), ['action' => 'delete', $villageElectoral->village_electoral_id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageElectoral->village_electoral_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Village Electorals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village Electoral'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="villageElectorals view large-9 medium-8 columns content">
    <h3><?= h($villageElectoral->village_electoral_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($villageElectoral->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village Electoral Id') ?></th>
            <td><?= $this->Number->format($villageElectoral->village_electoral_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference Year') ?></th>
            <td><?= $this->Number->format($villageElectoral->reference_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Electoral Total Household') ?></th>
            <td><?= $this->Number->format($villageElectoral->electoral_total_household) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Electoral Total Voter') ?></th>
            <td><?= $this->Number->format($villageElectoral->electoral_total_voter) ?></td>
        </tr>
    </table>
</div>
