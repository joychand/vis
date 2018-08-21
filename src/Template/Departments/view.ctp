<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schemes'), ['controller' => 'Schemes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Scheme'), ['controller' => 'Schemes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="departments view large-9 medium-8 columns content">
    <h3><?= h($department->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($department->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($department->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Schemes') ?></h4>
        <?php if (!empty($department->schemes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Scheme Name') ?></th>
                <th scope="col"><?= __('Department Id') ?></th>
                <th scope="col"><?= __('Scheme Code') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($department->schemes as $schemes): ?>
            <tr>
                <td><?= h($schemes->scheme_name) ?></td>
                <td><?= h($schemes->department_id) ?></td>
                <td><?= h($schemes->scheme_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Schemes', 'action' => 'view', $schemes->scheme_code]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Schemes', 'action' => 'edit', $schemes->scheme_code]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schemes', 'action' => 'delete', $schemes->scheme_code], ['confirm' => __('Are you sure you want to delete # {0}?', $schemes->scheme_code)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
