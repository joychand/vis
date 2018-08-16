<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anganwadi $anganwadi
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Anganwadi'), ['action' => 'edit', $anganwadi->anganwadi_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Anganwadi'), ['action' => 'delete', $anganwadi->anganwadi_id], ['confirm' => __('Are you sure you want to delete # {0}?', $anganwadi->anganwadi_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Anganwadis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Anganwadi'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="anganwadis view large-9 medium-8 columns content">
    <h3><?= h($anganwadi->anganwadi_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Worker Mobile') ?></th>
            <td><?= h($anganwadi->worker_mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($anganwadi->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Anganwadi Id') ?></th>
            <td><?= $this->Number->format($anganwadi->anganwadi_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Anganwadi Reference Year') ?></th>
            <td><?= $this->Number->format($anganwadi->anganwadi_reference_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Anganwadi Centre') ?></th>
            <td><?= $this->Number->format($anganwadi->total_anganwadi_centre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Anganwadi Worker') ?></th>
            <td><?= $this->Number->format($anganwadi->total_anganwadi_worker) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Enrolled Children') ?></th>
            <td><?= $this->Number->format($anganwadi->total_enrolled_children) ?></td>
        </tr>
    </table>
</div>
