<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheme[]|\Cake\Collection\CollectionInterface $schemes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Scheme'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schemes index large-9 medium-8 columns content">
    <h3><?= __('Schemes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('scheme_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SanctionedAmount(Lakhs)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scheme_status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schemes as $scheme): ?>
            <tr>
                <td><?= h($scheme->scheme_name) ?></td>
                <td><?= $scheme->has('department') ? $this->Html->link($scheme->department->name, ['controller' => 'Departments', 'action' => 'view', $scheme->department->id]) : '' ?></td>
                <td><?= $this->Number->precision($scheme->sanction_amount,2) ?></td>
                <td><?= h($scheme->scheme_status) ?></td>
                <td class="actions">
                    <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $scheme->scheme_code]) ?> -->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scheme->scheme_code]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scheme->scheme_code], ['confirm' => __('Are you sure you want to delete # {0}?', $scheme->scheme_code)]) ?>
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
