<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodSecurity $foodSecurity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Food Security'), ['action' => 'edit', $foodSecurity->food_security_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Food Security'), ['action' => 'delete', $foodSecurity->food_security_id], ['confirm' => __('Are you sure you want to delete # {0}?', $foodSecurity->food_security_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Food Securities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food Security'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="foodSecurities view large-9 medium-8 columns content">
    <h3><?= h($foodSecurity->food_security_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($foodSecurity->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Food Security Id') ?></th>
            <td><?= $this->Number->format($foodSecurity->food_security_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Aay Members') ?></th>
            <td><?= $this->Number->format($foodSecurity->total_aay_members) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Phh Members') ?></th>
            <td><?= $this->Number->format($foodSecurity->total_phh_members) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Aadhaar Seeded Card') ?></th>
            <td><?= $this->Number->format($foodSecurity->total_aadhaar_seeded_card) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Fair Price Shop') ?></th>
            <td><?= $this->Number->format($foodSecurity->total_fair_price_shop) ?></td>
        </tr>
    </table>
</div>
