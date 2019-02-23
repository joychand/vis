<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserAudit $userAudit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Audit'), ['action' => 'edit', $userAudit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Audit'), ['action' => 'delete', $userAudit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userAudit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Audits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Audit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userAudits view large-9 medium-8 columns content">
    <h3><?= h($userAudit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $userAudit->has('user') ? $this->Html->link($userAudit->user->user_id, ['controller' => 'Users', 'action' => 'view', $userAudit->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fail Browser') ?></th>
            <td><?= h($userAudit->fail_browser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Success Browser') ?></th>
            <td><?= h($userAudit->success_browser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fail Ip') ?></th>
            <td><?= h($userAudit->fail_ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Success Ip') ?></th>
            <td><?= h($userAudit->success_ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userAudit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Login') ?></th>
            <td><?= h($userAudit->last_login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Fail Login') ?></th>
            <td><?= h($userAudit->last_fail_login) ?></td>
        </tr>
    </table>
</div>
