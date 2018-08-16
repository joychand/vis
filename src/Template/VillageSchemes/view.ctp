<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageScheme $villageScheme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Village Scheme'), ['action' => 'edit', $villageScheme->village_scheme_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Village Scheme'), ['action' => 'delete', $villageScheme->village_scheme_id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageScheme->village_scheme_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Village Schemes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village Scheme'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="villageSchemes view large-9 medium-8 columns content">
    <h3><?= h($villageScheme->village_scheme_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($villageScheme->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scheme Status') ?></th>
            <td><?= h($villageScheme->scheme_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scheme Code') ?></th>
            <td><?= h($villageScheme->scheme_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village Scheme Id') ?></th>
            <td><?= $this->Number->format($villageScheme->village_scheme_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scheme Financial Year') ?></th>
            <td><?= $this->Number->format($villageScheme->scheme_financial_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sanction Amount') ?></th>
            <td><?= $this->Number->format($villageScheme->sanction_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Latitude') ?></th>
            <td><?= $this->Number->format($villageScheme->location_latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Longitude') ?></th>
            <td><?= $this->Number->format($villageScheme->location_longitude) ?></td>
        </tr>
    </table>
</div>
