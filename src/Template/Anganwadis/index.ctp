<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anganwadi[]|\Cake\Collection\CollectionInterface $anganwadis
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 

  $this->Html->script('DataTables/anganwadi-index.js',['block'=>'scriptBottom']);   
   
   
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
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
   <?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
    <?= $this->Form->end()?>
    <!-- <div id="tablediv" style="display:none !important;"> -->
    <table  id="indexTable" class="display compact" style="width:100%;">
        <thead>

            <tr>
                <th rowspan="2"></th>
                <th rowspan="2">rowid</th>
                <th rowspan="2">Village</th>
                <th rowspan="2" >Ref<br>Yr.</th>
                <th rowspan="2">Angwandi<br>Center</th>
                <th rowspan="2" >Angwandi<br>Worker(nos)</th>
                <th rowspan="2" >Children</th>
                <th colspan="2"> Anganwadi Worker</th>
                
                <th colspan="3">Pregnant Women</th>
                <th rowspan="2">Actions</th>       
            </tr>
             <tr>
                <th>Name</th>
                <th>mobile</th>
                <td>1stQtr</td>
                <td>2ndQtr</td>
                <td>3rdQtr</td>
                         
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
                <td>action</td>
               
               
            </tr>
        </foot>
    </table>
    <!-- </div> -->
    
   
    
</div>
