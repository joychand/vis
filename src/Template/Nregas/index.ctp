<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nrega[]|\Cake\Collection\CollectionInterface $nregas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Schem Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Nrega'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nregas index large-9 medium-8 columns content">
    <h3><?= __('Nregas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              <th scope="col"><?= $this->Paginator->sort('Village:') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Ref.Yr:') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_job_card') ?></th>
                
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nregas as $nrega): ?>
            <tr>
                 <td><?= h($nrega->village->village_name) ?></td>
                
                <td><?= $this->Number->format($nrega->nrega_reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($nrega->total_job_card) ?></td>
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nrega->village_nrega_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nrega->village_nrega_id], ['confirm' => __('Are you sure you want to delete # {0}?', $nrega->village_nrega_id)]) ?>
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
