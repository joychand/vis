<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageDisableInfo[]|\Cake\Collection\CollectionInterface $villageDisableInfos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Village Disable Info'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villageDisableInfos index large-9 medium-8 columns content">
    <h3><?= __('Village Disable Infos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('village_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blind') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deaf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('others') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villageDisableInfos as $villageDisableInfo): ?>
            <tr>
                <td><?= $this->Number->format($villageDisableInfo->id) ?></td>
                <td><?= h($villageDisableInfo->village_code) ?></td>
                <td><?= $this->Number->format($villageDisableInfo->reference_year) ?></td>
                <td><?= $this->Number->format($villageDisableInfo->blind) ?></td>
                <td><?= $this->Number->format($villageDisableInfo->deaf) ?></td>
                <td><?= $this->Number->format($villageDisableInfo->others) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $villageDisableInfo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $villageDisableInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $villageDisableInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageDisableInfo->id)]) ?>
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
