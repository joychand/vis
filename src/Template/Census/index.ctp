<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\sdoreport[]|\Cake\Collection\CollectionInterface $sdoreports
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 

  $this->Html->script('DataTables/census.js',['block'=>'scriptBottom']);   
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
       
        <li><?= $this->Html->link(__('New Village Census Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdoreports index large-9 medium-8 columns content">
    
    <fieldset style="padding:0 !important"><legend><?= __('Village Census Data') ?></legend></fieldset><h3><?= __('') ?></h3>
<?= $this->Form->create(null)?>
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
   <?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
    <?= $this->Form->end()?>
    <table id="indexTable" class="display compact" style="width:100%">
        <thead>
            <tr>
            <th></th>
            <th>VillageCode</th>
            <th>Village</th>
            <th>Ref.Yr.</th>
            <th>Counting Agency</th>
            <th>Total<br>Population</th>
            <th>Household<br>(nos)</th>
            <th>Actions</th>
                          
            </tr>
        </thead>
        <tbody>
            <?php foreach ($censuses as $census): ?>
            <tr>
                <td></td>
                <td><?= h($census->village_code) ?></td>
                <td><?= h($census->village->village_name) ?></td>
                            
                <td><?= $this->Number->format($census->reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($census->counting_agency) ?></td>              
                <td><?= $this->Number->format($census->total_population) ?></td>
                <td><?= $this->Number->format($census->total_household) ?></td>
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $census->reference_year,$census->village_code,$census->counting_agency]) ?> |
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $census->reference_year,$census->village_code,$census->counting_agency], ['confirm' => __('Are you sure you want to delete  the village # {1}?', $census->reference_year,$census->village_code,$census->counting_agency)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td>VillageCode</td>
                <td>Village</td>
                
                <td>Ref.Yr.</td>
                <td>Counting Agency</td>
                <td>Total<br>Population</td>
                <td>Household<br>(nos)</td>
                <td>Actions</td>
            </tr>
        </tfoot>
    </table>
    
</div>
