<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EducationInfra $educationInfra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Education Infra'), ['action' => 'edit', $educationInfra->education_infra_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Education Infra'), ['action' => 'delete', $educationInfra->education_infra_id], ['confirm' => __('Are you sure you want to delete # {0}?', $educationInfra->education_infra_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Education Infras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Education Infra'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="educationInfras view large-9 medium-8 columns content">
    <h3><?= h($educationInfra->education_infra_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($educationInfra->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Education Infra Id') ?></th>
            <td><?= $this->Number->format($educationInfra->education_infra_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Education Reference Year') ?></th>
            <td><?= $this->Number->format($educationInfra->education_reference_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Govt School') ?></th>
            <td><?= $this->Number->format($educationInfra->total_govt_school) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Adc School') ?></th>
            <td><?= $this->Number->format($educationInfra->total_adc_school) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Private School') ?></th>
            <td><?= $this->Number->format($educationInfra->total_private_school) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Primary School') ?></th>
            <td><?= $this->Number->format($educationInfra->total_primary_school) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Primary Student') ?></th>
            <td><?= $this->Number->format($educationInfra->total_primary_student) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Jhs') ?></th>
            <td><?= $this->Number->format($educationInfra->total_jhs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Jhs Student') ?></th>
            <td><?= $this->Number->format($educationInfra->total_jhs_student) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Secondary School') ?></th>
            <td><?= $this->Number->format($educationInfra->total_secondary_school) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Secondary Student') ?></th>
            <td><?= $this->Number->format($educationInfra->total_secondary_student) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Hrsec School') ?></th>
            <td><?= $this->Number->format($educationInfra->total_hrsec_school) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Hrsec Student') ?></th>
            <td><?= $this->Number->format($educationInfra->total_hrsec_student) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total College') ?></th>
            <td><?= $this->Number->format($educationInfra->total_college) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total College Professor') ?></th>
            <td><?= $this->Number->format($educationInfra->total_college_professor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total College Assoc Prof') ?></th>
            <td><?= $this->Number->format($educationInfra->total_college_assoc_prof) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total College Asstt Prof') ?></th>
            <td><?= $this->Number->format($educationInfra->total_college_asstt_prof) ?></td>
        </tr>
    </table>
</div>
