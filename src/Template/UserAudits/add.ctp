<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserAudit $userAudit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User Audits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userAudits form large-9 medium-8 columns content">
    <?= $this->Form->create($userAudit) ?>
    <fieldset>
        <legend><?= __('Add User Audit') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('last_login');
            echo $this->Form->control('last_fail_login');
            echo $this->Form->control('fail_browser');
            echo $this->Form->control('success_browser');
            echo $this->Form->control('fail_ip');
            echo $this->Form->control('success_ip');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
