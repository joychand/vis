<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anganwadi[]|\Cake\Collection\CollectionInterface $anganwadis
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Anganwadi Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="anganwadis index large-9 medium-8 columns content">
    <h3><?= __('Anganwadis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('village') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Ref.Yr.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_anganwadi_centre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_anganwadi_worker') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_enrolled_children') ?></th>
                <th scope="col"><?= $this->Paginator->sort('worker_mobile') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anganwadis as $anganwadi): ?>
            <tr>
                 <td><?= h($anganwadi->village->village_name) ?></td>
                <td><?= $this->Number->format($anganwadi->anganwadi_reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($anganwadi->total_anganwadi_centre) ?></td>
                <td><?= $this->Number->format($anganwadi->total_anganwadi_worker) ?></td>
                <td><?= $this->Number->format($anganwadi->total_enrolled_children) ?></td>
                <td><?= h($anganwadi->worker_mobile) ?></td>
               
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $anganwadi->anganwadi_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $anganwadi->anganwadi_id], ['confirm' => __('Are you sure you want to delete # {0}?', $anganwadi->anganwadi_id)]) ?>
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
