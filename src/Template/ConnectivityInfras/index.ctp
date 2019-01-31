<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConnectivityInfra[]|\Cake\Collection\CollectionInterface $connectivityInfras
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 
 $this->Html->script('DataTables/connectivity-index.js',['block'=>'scriptBottom']);   

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Village Connectivity Infra'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="connectivityInfras index large-9 medium-8 columns content">
    <fieldset style="padding:0 !important"><legend><?= __('Village Connectivity Infras Data') ?></legend></fieldset>
    <?= $this->Form->create(null)?>
        <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
        <?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
    <?= $this->Form->end()?>
    <table id='indexTable'class="display compact" style="width:100%;">
        <thead>
            <tr>
                <th></th>
                <th>id</th>
                <th>VillageCode</th>
                <th>Village</th>
                <th>Ref.Yr.</th>
                <th>Approached Road</th>
                <th>Distance(km)</th>
                <th>Actions</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($connectivityInfras as $connectivityInfra): ?>
            <tr>
                <td></td>
               
                <td><?= $this->Number->format($connectivityInfra->id) ?></td>
                <td><?= h($connectivityInfra->village_code) ?></td>
                <td><?= h($connectivityInfra->village->village_name) ?></td>
                <td><?= $this->Number->format($connectivityInfra->reference_year,['pattern'=>'####']) ?></td>
                <td><?= h($connectivityInfra->approached_road_status) ?></td>
                <td><?= $this->Number->format($connectivityInfra->distance_from_appr_road) ?></td>
                
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $connectivityInfra->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $connectivityInfra->id], ['confirm' => __('Are you sure you want to delete # {0}?', $connectivityInfra->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td>id</td>
                <td>VillageCode</td>
                <td>Village</td>
                <td>Ref.Yr.</td>
                <td>Approached Road</td>
                <td>Distance(km)</td>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
   
</div>
