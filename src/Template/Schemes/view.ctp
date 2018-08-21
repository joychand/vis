<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheme $scheme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Scheme'), ['action' => 'edit', $scheme->scheme_code]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Scheme'), ['action' => 'delete', $scheme->scheme_code], ['confirm' => __('Are you sure you want to delete # {0}?', $scheme->scheme_code)]) ?> </li>
        <li><?= $this->Html->link(__('List Schemes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheme'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schemes view large-9 medium-8 columns content">
    <h3><?= h($scheme->scheme_code) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Scheme Name') ?></th>
            <td><?= h($scheme->scheme_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Department') ?></th>
            <td><?= $scheme->has('department') ? $this->Html->link($scheme->department->name, ['controller' => 'Departments', 'action' => 'view', $scheme->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scheme Code') ?></th>
            <td><?= $this->Number->format($scheme->scheme_code) ?></td>
        </tr>
    </table>
</div>
