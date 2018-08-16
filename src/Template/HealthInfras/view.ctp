<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HealthInfra $healthInfra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Health Infra'), ['action' => 'edit', $healthInfra->health_infra_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Health Infra'), ['action' => 'delete', $healthInfra->health_infra_id], ['confirm' => __('Are you sure you want to delete # {0}?', $healthInfra->health_infra_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Health Infras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Health Infra'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="healthInfras view large-9 medium-8 columns content">
    <h3><?= h($healthInfra->health_infra_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Asha Mobile') ?></th>
            <td><?= h($healthInfra->asha_mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($healthInfra->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Health Infra Id') ?></th>
            <td><?= $this->Number->format($healthInfra->health_infra_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Health Reference Year') ?></th>
            <td><?= $this->Number->format($healthInfra->health_reference_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Chc') ?></th>
            <td><?= $this->Number->format($healthInfra->no_of_chc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Phc') ?></th>
            <td><?= $this->Number->format($healthInfra->no_of_phc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Phsc') ?></th>
            <td><?= $this->Number->format($healthInfra->no_of_phsc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Doctors') ?></th>
            <td><?= $this->Number->format($healthInfra->no_of_doctors) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Anm') ?></th>
            <td><?= $this->Number->format($healthInfra->no_of_anm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Staff Nurse') ?></th>
            <td><?= $this->Number->format($healthInfra->no_of_staff_nurse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Asha') ?></th>
            <td><?= $this->Number->format($healthInfra->no_of_asha) ?></td>
        </tr>
    </table>
</div>
