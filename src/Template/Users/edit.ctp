<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->user_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
           // echo $this->Form->control('user_creation_date', ['empty' => true]);
            echo $this->Form->control('user_name',['label'=>'UserName']);
           // echo $this->Form->control('password',['type'=>'password','required'=>true]);
           // echo $this->Form->control('confirm_passwd',['type'=>'password','required'=>true,'label'=>'Confirm Password']);
            echo $this->Form->control('user_email');
            echo $this->Form->control('user_mobile');
            echo $this->Form->control('role_id',['type'=>'select','label'=>'User roles:','empty'=>'-Assigned Roles-','id'=>'roles','options'=>$user_roles,'required'=>true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
