<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\sdoreport[]|\Cake\Collection\CollectionInterface $securityreport
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Village SecurityReport'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="securityreport index large-9 medium-8 columns content">
    <h3><?= __('Village Secuity Report') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('reference_year') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('village_code') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('village_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_population') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_household') ?></th>
              
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($securityreports as $securityreport): ?>
            <tr>
                
                <td><?= $this->Number->format($securityreport->reference_year,['pattern'=>'####']) ?></td>
                <!-- <td><?= h($securityreport->village_code) ?></td> -->
                <td><?= h($securityreport->village->village_name) ?></td>
                <td><?= $this->Number->format($securityreport->total_population) ?></td>
                <td><?= $this->Number->format($securityreport->total_household) ?></td>
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $securityreport->reference_year,$securityreport->village_code,$securityreport->counting_agency]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $securityreport->reference_year,$securityreport->village_code,$securityreport->counting_agency], ['confirm' => __('Are you sure you want to delete this village data # {1}?', $securityreport->reference_year,$securityreport->village_code,$securityreport->counting_agency)]) ?>
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