<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
               
                <th scope="col"><?= $this->Paginator->sort('user_name') ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('user_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Created On') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                
                <td><?= h($user->user_name) ?></td>
               
                <td><?= h($user->user_email) ?></td>
                <td><?= h($user->user_mobile) ?></td>
                <td><?= h($user->user_creation_date->i18nFormat(\IntlDateFormatter::SHORT)) ?>
                <!-- <td><?= h($this->Time->format ($user->user_creation_date, \IntlDateFormatter::SHORT, null, 'Asia/Kolkata')) ?></td> -->
                <td class="actions">
                  
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]) ?>
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
