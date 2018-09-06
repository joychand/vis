<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EducationInfra[]|\Cake\Collection\CollectionInterface $educationInfras
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__(' Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Education Infra'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educationInfras index large-9 medium-8 columns content">
    <h3><?= __('Village Education Infras') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('Ref.Yr.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('village') ?></th>
                <th scope="col"><?= $this->Paginator->sort('govt_school') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adc_school') ?></th>
                <th scope="col"><?= $this->Paginator->sort('private_school') ?></th>
                <th scope="col"><?= $this->Paginator->sort('primary_school') ?></th>
                <th scope="col"><?= $this->Paginator->sort('primary_student') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teacher') ?></th>
                <th scope="col"><?= $this->Paginator->sort('JHS') ?></th>
                <th scope="col"><?= $this->Paginator->sort('JHS student') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teacher') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Sec school') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Sec student') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teacher') ?></th>
                <th scope="col"><?= $this->Paginator->sort('HrSec school') ?></th>
                <th scope="col"><?= $this->Paginator->sort('HrSec student') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Teacher') ?></th>
               
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($educationInfras as $educationInfra): ?>
            <tr>
               
                <td><?= $this->Number->format($educationInfra->education_reference_year,['pattern'=>'####']) ?></td>
                <td><?= h($educationInfra->village->village_name) ?></td>
                <td><?= $this->Number->format($educationInfra->total_govt_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_adc_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_private_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_primary_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_primary_student) ?></td>
                <td><?= $this->Number->format($educationInfra->total_primary_teacher) ?></td>
                <td><?= $this->Number->format($educationInfra->total_jhs) ?></td>
                <td><?= $this->Number->format($educationInfra->total_jhs_student) ?></td>
                <td><?= $this->Number->format($educationInfra->total_jhs_teacher) ?></td>
                <td><?= $this->Number->format($educationInfra->total_secondary_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_secondary_student) ?></td>
                <td><?= $this->Number->format($educationInfra->total_secondary_teacher) ?></td>
                <td><?= $this->Number->format($educationInfra->total_hrsec_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_hrsec_student) ?></td>
                <td><?= $this->Number->format($educationInfra->total_hrsec_teacher) ?></td>
                
                
                <td class="actions">
                  
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $educationInfra->education_infra_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $educationInfra->education_infra_id], ['confirm' => __('Are you sure you want to delete # {0}?', $educationInfra->education_infra_id)]) ?>
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
