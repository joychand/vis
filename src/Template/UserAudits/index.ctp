<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserAudit[]|\Cake\Collection\CollectionInterface $userAudits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Audit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userAudits index large-9 medium-8 columns content">
    <h3><?= __('User Audits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_fail_login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fail_browser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('success_browser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fail_ip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('success_ip') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userAudits as $userAudit): ?>
            <tr>
                <td><?= $this->Number->format($userAudit->id) ?></td>
                <td><?= $userAudit->has('user') ? $this->Html->link($userAudit->user->user_id, ['controller' => 'Users', 'action' => 'view', $userAudit->user->user_id]) : '' ?></td>
                <td><?= h($userAudit->last_login) ?></td>
                <td><?= h($userAudit->last_fail_login) ?></td>
                <td><?= h($userAudit->fail_browser) ?></td>
                <td><?= h($userAudit->success_browser) ?></td>
                <td><?= h($userAudit->fail_ip) ?></td>
                <td><?= h($userAudit->success_ip) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userAudit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userAudit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userAudit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userAudit->id)]) ?>
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
