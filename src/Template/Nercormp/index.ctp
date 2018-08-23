<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\sdoreport[]|\Cake\Collection\CollectionInterface $sdoreports
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village NERCORMP DATA'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdoreports index large-9 medium-8 columns content">
    <h3><?= __('Village NERCORMP') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('reference_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('village_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('village_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_population') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_household') ?></th>
              
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nercormps as $nercormp): ?>
            <tr>
                
                <td><?= $this->Number->format($nercormp->reference_year,['pattern'=>'####']) ?></td>
                <td><?= h($nercormp->village_code) ?></td>
                <td><?= h($nercormp->village->village_name) ?></td>
                <td><?= $this->Number->format($nercormp->total_population) ?></td>
                <td><?= $this->Number->format($nercormp->total_household) ?></td>
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nercormp->reference_year,$nercormp->village_code,$nercormp->counting_agency]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nercormp->reference_year,$nercormp->village_code,$nercormp->counting_agency], ['confirm' => __('Are you sure you want to delete  the village # {1}?', $nercormp->reference_year,$nercormp->village_code,$nercormp->counting_agency)]) ?>
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
