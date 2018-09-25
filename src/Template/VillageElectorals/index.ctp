<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageElectoral[]|\Cake\Collection\CollectionInterface $villageElectorals
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 

  $this->Html->script('DataTables/election.js',['block'=>'scriptBottom']);   

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Electoral Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="villageElectorals index large-9 medium-8 columns content">
<fieldset style="padding:0 !important"><legend><?= __('Village Electorals Data') ?></legend></fieldset><h3><?= __('') ?></h3>
<?= $this->Form->create(null)?>
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
   <?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
    <?= $this->Form->end()?>

    <table id="indexTable" class="display compact" style="width:100%">
        <thead>
            <tr>
            <th></th>
            <th>rowid</th>
            <th>Village</th>
            <th>Ref.Yr.</th>
            <th>Household<br>(nos)</th>
            <th>Voters<br>(nos)</th>
            <th>Actions</th>
           
            </tr>
        </thead>
        <tbody>
            <?php foreach ($villageElectorals as $villageElectoral): ?>
            <tr>
            <td></td>
            <td><?= $this->Number->format($villageElectoral->village_electoral_id) ?></td>
            <td><?= h($villageElectoral->village->village_name) ?></td>
                <td><?= $this->Number->format($villageElectoral->reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($villageElectoral->electoral_total_household) ?></td>
                <td><?= $this->Number->format($villageElectoral->electoral_total_voter) ?></td>
               
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $villageElectoral->village_electoral_id]) ?> |
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $villageElectoral->village_electoral_id], ['confirm' => __('Are you sure you want to delete # {0}?', $villageElectoral->village_electoral_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td>rowid</td>
                <td>Village</td>
                <td>Ref.Yr.</td>
                <td>Household<br>(nos)</td>
                <td>Voters<br>(nos)</td>
                <td>Actions</td>
            </tr>
        </tfoot>
    </table>
    
</div>
