<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageElectoral[]|\Cake\Collection\CollectionInterface $villageElectorals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Electoral Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villageElectorals index large-9 medium-8 columns content">
    <h3><?= __('Village Electorals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
            <th scope="col"><?= $this->Paginator->sort('Village') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Ref. Yr.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('electoral_total_household') ?></th>
                <th scope="col"><?= $this->Paginator->sort('electoral_total_voter') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villageElectorals as $villageElectoral): ?>
            <tr>
            <td><?= h($villageElectoral->village->village_name) ?></td>
                <td><?= $this->Number->format($villageElectoral->reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($villageElectoral->electoral_total_household) ?></td>
                <td><?= $this->Number->format($villageElectoral->electoral_total_voter) ?></td>
               
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $villageElectoral->village_electoral_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $villageElectoral->village_electoral_id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageElectoral->village_electoral_id)]) ?>
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
