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
    <div><h3><?= __('Anganwadis Village Data') ?></h3></div><hr>

    <?= $this->Form->create()?>
    <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision'])?>
    <table  id="indexTable" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Village</th>
                <th>Ref<br>Yr.</th>
                <th>Angwandi<br>Center</th>
                <th>Angwandi<br>Worker </th>
                <th>Children</th>
                <th>Worker<br>Name</th>
                <th>Worker<br>mobile</th>
                <th>Action</th>
               
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anganwadis as $anganwadi): ?>
            <tr>
                 <td></td>
                 <td><?= h($anganwadi->village->village_name) ?></td>
                <td><?= $this->Number->format($anganwadi->anganwadi_reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($anganwadi->total_anganwadi_centre) ?></td>
                <td><?= $this->Number->format($anganwadi->total_anganwadi_worker) ?></td>
                <td><?= $this->Number->format($anganwadi->total_enrolled_children) ?></td>
                <td><?= h($anganwadi->anganwadi_worker_name) ?></td>
                <td><?= h($anganwadi->worker_mobile) ?></td>
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
                <td>Village</td>
                <td >Ref<br>Yr.</td>
                <td>Anganwadi<br>centre</td>
                <td>Anganwadi<br>worker</td>
                <td>children</td>
                <td>Worker<br> Name</td>
                <td>Worker<br> mobile</td>
                <td>Action</td>
               
               
            </tr>
        </foot>
    </table>
    <!-- <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('village') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Ref.Yr.') ?></th>
                <th scope="col"><?= $this->Paginator->sort('anganwadi_centre(nos)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('anganwadi_worker(nos)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolled_children') ?></th>
                <th scope="col"><?=  $this->Paginator->sort('Worker Name')?></th>
                <th scope="col"><?= $this->Paginator->sort('worker_mobile') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anganwadis as $anganwadi): ?>
            <tr>
                 <td><?= h($anganwadi->village->village_name) ?></td>
                <td><?= $this->Number->format($anganwadi->anganwadi_reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($anganwadi->total_anganwadi_centre) ?></td>
                <td><?= $this->Number->format($anganwadi->total_anganwadi_worker) ?></td>
                <td><?= $this->Number->format($anganwadi->total_enrolled_children) ?></td>
                <td><?= h($anganwadi->anganwadi_worker_name) ?></td>
                <td><?= h($anganwadi->worker_mobile) ?></td>
               
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $anganwadi->anganwadi_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $anganwadi->anganwadi_id], ['confirm' => __('Are you sure you want to delete # {0}?', $anganwadi->anganwadi_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->
</div>
