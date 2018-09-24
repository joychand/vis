<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HealthInfra[]|\Cake\Collection\CollectionInterface $healthInfras
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 
 $this->Html->script('DataTables/healthinfras.js',['block'=>'scriptBottom']);   
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Health Infra Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="healthInfras index large-9 medium-8 columns content">
   
    <fieldset style="padding:0 !important"><legend><?= __('Health Infra Village Data') ?></legend></fieldset>

   <?= $this->Form->create(null)?>
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
   <?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
    <?= $this->Form->end()?>
    <table  id="indexTable" class="display compact" style="width:100%">
        <thead>
            <tr>
                 <th rowspan="2"></th>
                 <th rowspan="2">rowid</th>
                 <th rowspan="2">village</th>
                 <th rowspan="2">Ref.Yr.</th>
                 <th rowspan="2">CHC/PHC/<br>PHSC Name</th>
                 <th rowspan="2">Doctors</th>
                 <th rowspan="2">ANM</th>
                 <th rowspan="2">Staff<br>nurse</th>
                 <th colspan="2">ASHA</th>
                 <th rowspan="2">Actions</th>
                
            </tr>
            <tr>
            <th>Workers(nos)</th>
            <th>Mobile</th>           
            </tr>
        </thead>
        <tbody>
            <?php foreach ($healthInfras as $healthInfra): ?>
            <tr>
            <td></td>
            <td><?= $this->Number->format($healthInfra->health_infra_id) ?></td>
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
        <tfoot>
                <td></td>
                <td>rowid</td>
                <td>village</td>
                <td>Ref.Yr.</td>
                <td>CHC/PHC/<br>PHSCName</td>
                <td>Doctors</td>
                <td>ANM</td>
                <td>Staff_nurse</td>
                <td>Workers(nos)</td>
                <td>Mobile</td>
                <td>Actions</td>
        </tfoot>
    </table>
    
</div>
