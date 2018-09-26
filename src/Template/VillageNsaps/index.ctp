<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageNsap[]|\Cake\Collection\CollectionInterface $villageNsaps
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 
 $this->Html->script('DataTables/nsap.js',['block'=>'scriptBottom']);  
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village NSAP Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villageNsaps index large-9 medium-8 columns content">
    
    <fieldset style="padding:0 !important"><legend><?= __('Village NSAP Data') ?></legend></fieldset>

   <?= $this->Form->create(null)?>
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
   <?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
    <?= $this->Form->end()?>
    <table  id="indexTable" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th rowspan="2"></th>
                <th rowspan="2">rowid</th>
                <th rowspan="2">Village</th>
                <th colspan="3">Beneficiary</th>
                <th rowspan="2">Actions</th>
               
            </tr>
            <tr>
                <th>Widows</th>
                <th>Differently-Abled</th>
                <th>IGNOAPS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villageNsaps as $villageNsap): ?>
            <tr>
                <td></td>
                <td><?= $this->Number->format($villageNsap->village_nsap_id) ?></td>
                 <td><?= h($villageNsap->village->village_name) ?></td>
                <td><?= $this->Number->format($villageNsap->total_widows_beneficiary) ?></td>
                <td><?= $this->Number->format($villageNsap->total_handicap_beneficiary) ?></td>
                <td><?= $this->Number->format($villageNsap->total_ignoaps_beneficiary) ?></td>
               
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $villageNsap->village_nsap_id]) ?> | 
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $villageNsap->village_nsap_id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageNsap->village_nsap_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <td></td>
            <td>rowid</td>
            <td>Village</td>
            <td>Widows</td>
            <td>Differently-Abled</td>
            <td>IGNOAPS</td>
            <td>Actions</td>
        </tfoot>
    </table>
   
</div>
