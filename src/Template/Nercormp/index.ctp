<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\sdoreport[]|\Cake\Collection\CollectionInterface $sdoreports
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 

  $this->Html->script('DataTables/nercormp.js',['block'=>'scriptBottom']);   
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village NERCORMP DATA'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdoreports index large-9 medium-8 columns content">
    
    <fieldset style="padding:0 !important"><legend><?= __('Village NERCORMP Data') ?></legend></fieldset><h3><?= __('') ?></h3>
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
            <?php foreach ($nercormps as $nercormp): ?>
            <tr>
                <td></td>
                <td><?= h($nercormp->village_code) ?></td>
                <td><?= h($nercormp->village->village_name) ?></td>
                            
                <td><?= $this->Number->format($nercormp->reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($nercormp->counting_agency) ?></td>              
                <td><?= $this->Number->format($nercormp->total_population) ?></td>
                <td><?= $this->Number->format($nercormp->total_household) ?></td>
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nercormp->reference_year,$nercormp->village_code,$nercormp->counting_agency]) ?> |
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nercormp->reference_year,$nercormp->village_code,$nercormp->counting_agency], ['confirm' => __('Are you sure you want to delete  the village # {1}?', $nercormp->reference_year,$nercormp->village_code,$nercormp->counting_agency)]) ?>
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
