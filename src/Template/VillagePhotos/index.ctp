<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillagePhoto[]|\Cake\Collection\CollectionInterface $villagePhotos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), [ 'controller'=>'Securityreport','action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Photo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villagePhotos index large-9 medium-8 columns content">
    <h3><?= __('Village Photos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('Village Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Sub-Division') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photos') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villagePhotos as $villagePhoto): ?>
            <tr>
                <td><?= h($villagePhoto->village->village_name) ?></td>
                <td><?= h($villagePhoto->village->subdistrict->subdistrict_name) ?></td>
              
                <td><?=  $this->Html->image('VillagePhotos/photo/thumbnail-'.$villagePhoto->photo, ['height' => '200px']); ?></td>
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $villagePhoto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $villagePhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $villagePhoto->id)]) ?>
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
