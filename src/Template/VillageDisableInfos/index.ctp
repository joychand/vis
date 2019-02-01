<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageDisableInfo[]|\Cake\Collection\CollectionInterface $villageDisableInfos
 */
$this->layout = 'index_layout';
$ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
$ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 
$this->Html->script('DataTables/disable-index.js',['block'=>'scriptBottom']);  
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Village Disable Info'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villageDisableInfos index large-9 medium-8 columns content">
    <h3><?= __('Village Disable Infos') ?></h3>
    <?= $this->Form->create(null)?>
        <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
        <?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
    <?= $this->Form->end()?>
    <table id='indexTable'class="display compact" style="width:100%;">
        <thead>
            <tr>
            <th></th>
                <th>id</th>
                <th>Village Code</th>
                <th>Village</th>
                <th>Rf.Yr.</th>
                <th>Blind Disablility</th>
                <th>Deaf Disablility</th> 
                <th>Others</th>              
                <th>Actions</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villageDisableInfos as $villageDisableInfo): ?>
            <tr>
                <td></td>
                <td><?= $this->Number->format($villageDisableInfo->id) ?></td>
                <td><?= h($villageDisableInfo->village_code) ?></td>
                <td><?= h($villageDisableInfo->village->village_name) ?></td>
                <td><?= $this->Number->format($villageDisableInfo->reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($villageDisableInfo->blind) ?></td>
                <td><?= $this->Number->format($villageDisableInfo->deaf) ?></td>
                <td><?= $this->Number->format($villageDisableInfo->others) ?></td>
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $villageDisableInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $villageDisableInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageDisableInfo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td>id</td>
                <td>Village Code</td>
                <td>Village</td>
                <td>Rf.Yr.</td>
                <td>Blind Disablility</td>
                <td>Deaf Disablility</td>
                <td>Others</td>
                <td>Actions</td>
            </tr>
        </tfoot>
    </table>
    
</div>
