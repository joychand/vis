<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageNsap $villageNsap
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Village Nsap'), ['action' => 'edit', $villageNsap->village_nsap_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Village Nsap'), ['action' => 'delete', $villageNsap->village_nsap_id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageNsap->village_nsap_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Village Nsaps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village Nsap'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="villageNsaps view large-9 medium-8 columns content">
    <h3><?= h($villageNsap->village_nsap_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($villageNsap->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village Nsap Id') ?></th>
            <td><?= $this->Number->format($villageNsap->village_nsap_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Widows Beneficiary') ?></th>
            <td><?= $this->Number->format($villageNsap->total_widows_beneficiary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Handicap Beneficiary') ?></th>
            <td><?= $this->Number->format($villageNsap->total_handicap_beneficiary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Ignoaps Beneficiary') ?></th>
            <td><?= $this->Number->format($villageNsap->total_ignoaps_beneficiary) ?></td>
        </tr>
    </table>
</div>
