<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nrega[]|\Cake\Collection\CollectionInterface $nregas
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 
 $this->Html->script('DataTables/nrega.js',['block'=>'scriptBottom']);   
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Schem Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Nrega'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nregas index large-9 medium-8 columns content">
   
    <fieldset style="padding:0 !important"><legend><?= __('NREGA Village Data') ?></legend></fieldset>

   <?= $this->Form->create(null)?>
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
   <?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
    <?= $this->Form->end()?>
    <table  id="indexTable" class="display compact" style="width:100%">
        <thead>
            <tr>
            <td></td>
            <td>rowid</td>
            <td>Village</td>
            <td>Ref.Yr</td>
            <td>Job Card (nos)</td>
            <td>Actions</td>
              
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nregas as $nrega): ?>
            <tr>
            <td></td>
            <td><?= $this->Number->format($nrega->village_nrega_id) ?></td>
                 <td><?= h($nrega->village->village_name) ?></td>
                
                <td><?= $this->Number->format($nrega->nrega_reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($nrega->total_job_card) ?></td>
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nrega->village_nrega_id]) ?> |
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nrega->village_nrega_id], ['confirm' => __('Are you sure you want to delete # {0}?', $nrega->village_nrega_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <td></td>
        <td>rowid</td>
        <td>Village</td>
        <td>Ref.Yr</td>
        <td>Job Card (nos)</td>
        <td>Actions</td>
        </tfoot>
    </table>
    
</div>
