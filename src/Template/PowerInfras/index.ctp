<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PowerInfra[]|\Cake\Collection\CollectionInterface $powerInfras
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Power Infra'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="powerInfras index large-9 medium-8 columns content">
    <h3><?= __('Power Infras') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('village_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('household_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('electrified_household_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($powerInfras as $powerInfra): ?>
            <tr>
                <td><?= $this->Number->format($powerInfra->id) ?></td>
                <td><?= h($powerInfra->village_code) ?></td>
                <td><?= $this->Number->format($powerInfra->household_no) ?></td>
                <td><?= $this->Number->format($powerInfra->electrified_household_no) ?></td>
                <td><?= $this->Number->format($powerInfra->reference_year) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $powerInfra->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $powerInfra->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $powerInfra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $powerInfra->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
