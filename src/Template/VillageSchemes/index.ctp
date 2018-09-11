<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageScheme[]|\Cake\Collection\CollectionInterface $villageSchemes
 */
?>
<?php $this->layout = 'scheme';?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Scheme'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villageSchemes index large-9 medium-8 columns content">
    <h3><?= __('Village Schemes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Scheme_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Village_Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Start_Fin_Yr.') ?></th>
             
                
                <th scope="col"><?= $this->Paginator->sort('Description') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villageSchemes as $villageScheme): ?>
            <tr>
                
                <td><?= h($villageScheme->scheme->scheme_name) ?></td>
                <td><?= h($villageScheme->village->village_name) ?></td>
                <td><?= h(strval($this->Number->format($villageScheme->village_scheme_start_fin_yr,['pattern'=>'####'])).'-'.strval($this->Number->format(($villageScheme->village_scheme_start_fin_yr+1),['pattern'=>'####']))) ?></td>
               
               
                <td><?= h($villageScheme->village_scheme_description) ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $villageScheme->village_scheme_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $villageScheme->village_scheme_id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageScheme->village_scheme_id)]) ?>
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
