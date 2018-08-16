<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Add New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Manage Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
           // echo $this->Form->control('user_creation_date', ['empty' => true]);
           //echo $this->Form->control('user_id');
            echo $this->Form->control('user_name',['label'=>'UserName','required'=>true]);
            echo $this->Form->control('password',['type'=>'password','required'=>true]);
            echo $this->Form->control('confirm_passwd',['type'=>'password','required'=>true,'label'=>'Confirm Password']);
            echo $this->Form->control('user_email',['label'=>'email','required'=>true]);
            echo $this->Form->control('user_mobile',['label'=>'Contact No.','required'=>true]);
            echo $this->Form->control('role_id',['type'=>'select','Label'=>'Role to be Assigned:','options'=>$roles,'empty'=>'Select role','required'=>true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
