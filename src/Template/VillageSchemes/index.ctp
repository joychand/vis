<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageScheme[]|\Cake\Collection\CollectionInterface $villageSchemes
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 
 $this->Html->script('DataTables/village-scheme.js',['block'=>'scriptBottom']);  
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Scheme'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villageSchemes index large-9 medium-8 columns content">
    
    <fieldset style="padding:0 !important"><legend><?= __('Village Schemes Data') ?></legend></fieldset>

   <?= $this->Form->create(null)?>
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
   <?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
    <?= $this->Form->end()?>
    <table  id="indexTable" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>rowid</th>
                <th>Village</th>
                <th>Scheme</th>
                <th>Start<br>Fin.Yr.</th>
                <th>Description</th>
                <th>Actions</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villageSchemes as $villageScheme): ?>
            <tr>
                
                <td></td>
                <td><?=$villageScheme->village_scheme_id?></td>
                <td><?= h($villageScheme->village->village_name) ?></td>
                <td><?= h($villageScheme->scheme->scheme_name) ?></td>
                <td><?= h(strval($this->Number->format($villageScheme->village_scheme_start_fin_yr,['pattern'=>'####'])).'-'.strval($this->Number->format(($villageScheme->village_scheme_start_fin_yr+1),['pattern'=>'####']))) ?></td>
                             
                <td><?= h($villageScheme->village_scheme_description) ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $villageScheme->village_scheme_id]) ?> |
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $villageScheme->village_scheme_id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageScheme->village_scheme_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <td></td>
            <td>rowid</td>
            <td>Village</td>
            <td>Scheme</td>
            <td>Start<br>Fin.Yr.</td>
            <td>Description</td>
            <td>Actions</td>
        </tfoot>
    </table>
    
</div>
