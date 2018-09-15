<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HealthInfra[]|\Cake\Collection\CollectionInterface $healthInfras
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Health Infra Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="healthInfras index large-9 medium-8 columns content">
    <h3><?= __('Health Infras') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                 <th scope="col"><?= $this->Paginator->sort('village') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Ref.Yr.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name of CHC/PHC/PHSC') ?></th>
               
                <th scope="col"><?= $this->Paginator->sort('Doctors') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ANM') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Staff_nurse') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ASHA') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ASHA Mobile') ?></th>
                
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($healthInfras as $healthInfra): ?>
            <tr>
                 <td><?= h($healthInfra->village->village_name) ?></td>
                <td><?= $this->Number->format($healthInfra->health_reference_year,['pattern'=>'####']) ?></td>
                <td><?= h($healthInfra->name_of_health_centre) ?></td>
               
                <td><?= $this->Number->format($healthInfra->no_of_doctors) ?></td>
                <td><?= $this->Number->format($healthInfra->no_of_anm) ?></td>
                <td><?= $this->Number->format($healthInfra->no_of_staff_nurse) ?></td>
                <td><?= $this->Number->format($healthInfra->no_of_asha) ?></td>
                <td><?= h($healthInfra->asha_mobile) ?></td>
               
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $healthInfra->health_infra_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $healthInfra->health_infra_id], ['confirm' => __('Are you sure you want to delete # {0}?', $healthInfra->health_infra_id)]) ?>
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
