<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anganwadi[]|\Cake\Collection\CollectionInterface $anganwadis
 */
  
  $this->Html->css('DataTables/datatables.min.css',['block'=>true]); 
  $this->Html->css('DataTables/dataTables.jqueryui.min.css',['block'=>true]); 
  $this->Html->css('https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css',['block'=>true]) ; 
   $this->Html->script('DataTables/DataTables.min.js',['block'=>'scriptBottom']);
    
     $this->Html->script('https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js',['block'=>'scriptBottom']);
    $this->Html->script('https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js',['block'=>'scriptBottom']);
    $this->Html->script('https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js',['block'=>'scriptBottom']);
    $this->Html->script('DataTables/index-datatable.js',['block'=>'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Anganwadi Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="anganwadis index large-9 medium-8 columns content">
    <fieldset style="padding:0 !important"><legend><?= __('Anganwadis Village Data') ?></legend></fieldset>

   <?= $this->Form->create(null)?>
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision'])?>
    <?= $this->Form->end()?>
    <table  id="indexTable" class="display compact" style="width:100%">
        <thead>

            <tr>
                <th></th>
                <th>rowid</th>
                <th rowspan="2">Village</th>
                <th rowspan="2">Ref<br>Yr.</th>
                <th rowspan="2">Angwandi<br>Center</th>
                <th rowspan="2">Angwandi<br>Worker </th>
                <th rowspan="2">Children</th>
                <th rowspan="2">Worker<br>Name</th>
                <th rowspan="2">Worker<br>mobile</th>
                <th colspan="3">Pregnant<br>women</th>
                <th rowspan="2">Actions</th>
               
               
            </tr>
            <tr>
            <th>1stQtr</th>
            <th>2ndQtr</th>
            <th>3rdQtr</th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anganwadis as $anganwadi): ?>
            <tr>
                 <td></td>
                 <td><?= $this->Number->format($anganwadi->anganwadi_id) ?></td>
                <td><?= h($anganwadi->village->village_name) ?></td>
                <td><?= $this->Number->format($anganwadi->anganwadi_reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($anganwadi->total_anganwadi_centre) ?></td>
                <td><?= $this->Number->format($anganwadi->total_anganwadi_worker) ?></td>
                <td><?= $this->Number->format($anganwadi->total_enrolled_children) ?></td>
                <td><?= h($anganwadi->anganwadi_worker_name) ?></td>
                <td><?= h($anganwadi->worker_mobile) ?></td>
                <td><?= $this->Number->format($anganwadi->first_qtr_pregnant) ?></td>
                <td><?= $this->Number->format($anganwadi->second_qtr_pregnant) ?></td>
                <td><?= $this->Number->format($anganwadi->third_qtr_pregnant) ?></td>
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit!'), ['action' => 'edit', $anganwadi->anganwadi_id]) ?>
                    <?= $this->Form->postLink(__('Delete!'), ['action' => 'delete', $anganwadi->anganwadi_id], ['confirm' => __('Are you sure you want to delete # {0}?', $anganwadi->anganwadi_id)]) ?>
                </td>
               
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
                <td></td>
                <td>rowid</td>
                <td>Village</td>
                <td>Ref<br>Yr.</td>
                <td>Anganwadi<br>centre</td>
                <td>Anganwadi<br>worker</td>
                <td>children</td>
                <td>Worker<br>Name</td>
                <td>Worker<br>mobile</td>
                <td>1stQtr</td>
                <td>2ndQtr</td>
                <td>3rdQtr</td>
                <td>Action</td>
               
               
            </tr>
        </foot>
    </table>
   
    
</div>
