<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodSecurity[]|\Cake\Collection\CollectionInterface $foodSecurities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village CAF&PD DATA'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foodSecurities index large-9 medium-8 columns content">
    <h3><?= __('Village CAF & PD DATA') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                 <th scope="col"><?= $this->Paginator->sort('village') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('Ref.Yr.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_AAY_members') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_PHH_members') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_Aadhaar_seeded_card') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_Fair_price_shop') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($foodSecurities as $foodSecurity): ?>
            <tr>
                <td><?= h($foodSecurity->village->village_name) ?></td>
                <td><?= $this->Number->format($foodSecurity->reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_aay_members) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_phh_members) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_aadhaar_seeded_card) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_fair_price_shop) ?></td>
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foodSecurity->food_security_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $foodSecurity->food_security_id], ['confirm' => __('Are you sure you want to delete # {0}?', $foodSecurity->food_security_id)]) ?>
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
