<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheme $scheme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $scheme->scheme_code],
                ['confirm' => __('Are you sure you want to delete # {0}?', $scheme->scheme_code)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schemes form large-9 medium-8 columns content">
    <?= $this->Form->create($scheme) ?>
    <fieldset>
        <legend><?= __('Edit Scheme') ?></legend>
        <?php
            echo $this->Form->control('scheme_name');
            echo $this->Form->control('department_id', ['options' => $departments, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
