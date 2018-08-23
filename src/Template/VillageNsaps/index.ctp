<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageNsap[]|\Cake\Collection\CollectionInterface $villageNsaps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village NSAP Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villageNsaps index large-9 medium-8 columns content">
    <h3><?= __('Village Nsaps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('village') ?></th>
               
                <th scope="col"><?= $this->Paginator->sort('widows_beneficiary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('handicap_beneficiary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ignoaps_beneficiary') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villageNsaps as $villageNsap): ?>
            <tr>
                 <td><?= h($villageNsap->village->village_name) ?></td>
                <td><?= $this->Number->format($villageNsap->total_widows_beneficiary) ?></td>
                <td><?= $this->Number->format($villageNsap->total_handicap_beneficiary) ?></td>
                <td><?= $this->Number->format($villageNsap->total_ignoaps_beneficiary) ?></td>
               
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $villageNsap->village_nsap_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $villageNsap->village_nsap_id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageNsap->village_nsap_id)]) ?>
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
