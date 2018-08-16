<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nrega $nrega
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Nrega'), ['action' => 'edit', $nrega->village_nrega_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Nrega'), ['action' => 'delete', $nrega->village_nrega_id], ['confirm' => __('Are you sure you want to delete # {0}?', $nrega->village_nrega_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nregas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Nrega'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nregas view large-9 medium-8 columns content">
    <h3><?= h($nrega->village_nrega_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($nrega->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village Nrega Id') ?></th>
            <td><?= $this->Number->format($nrega->village_nrega_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nrega Reference Year') ?></th>
            <td><?= $this->Number->format($nrega->nrega_reference_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Job Card') ?></th>
            <td><?= $this->Number->format($nrega->total_job_card) ?></td>
        </tr>
    </table>
</div>
