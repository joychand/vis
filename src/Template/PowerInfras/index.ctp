<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PowerInfra[]|\Cake\Collection\CollectionInterface $powerInfras
 */
    $this->layout = 'index_layout';
    $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
    $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 
    $this->Html->script('DataTables/power-index.js',['block'=>'scriptBottom']);  
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Add new Village Power Infra '), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="powerInfras index large-9 medium-8 columns content">
    <h3><?= __('Village Power Infras') ?></h3>
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
                <th>Total Household</th>
                <th>Electrified Household</th>               
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($powerInfras as $powerInfra): ?>
            <tr>
                <td></td>
                <td><?= $this->Number->format($powerInfra->id) ?></td>
                <td><?= h($powerInfra->village_code) ?></td>
                <td><?= h($powerInfra->village->village_name) ?></td>
                <td><?= $this->Number->format($powerInfra->reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($powerInfra->household_no) ?></td>
                <td><?= $this->Number->format($powerInfra->electrified_household_no) ?></td>
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $powerInfra->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $powerInfra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $powerInfra->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <th></th>
                <td>id</td>
                <td>Village Code</td>
                <td>Village</td>
                <td>Rf.Yr.</td>
                <td>Total Household</td>
                <td>Electrified Household</td>               
                <td>Actions</td>
        </tfoot>
    </table>
    
</div>
