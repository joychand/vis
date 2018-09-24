<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EducationInfra[]|\Cake\Collection\CollectionInterface $educationInfras
 */
$this->layout = 'index_layout';
$ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
$ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 
$this->Html->script('DataTables/education.js',['block'=>'scriptBottom']);  
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__(' Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village Education Infra'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educationInfras index large-9 medium-8 columns content">
<fieldset style="padding:0 !important"><legend><?= __('Education Village Data') ?></legend></fieldset>

<?= $this->Form->create(null)?>
 <?= $this->Form->control('subdivision',['label'=>'Filter by Subdivision:','type'=>'select','options'=>$subDivs,'empty'=>'All Villages','id'=>'subdivision','rel'=>$ajaxFilterUrl])?>
<?= $this->Form->hidden('deleteUrl',['value'=>$ajaxDeleteUrl]) ?>
 <?= $this->Form->end()?>
    <table  id="indexTable" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th rowspan="2"></th>
                <th rowspan="2">rowid</th>
                <th rowspan="2">village</th>
                <th rowspan="2">Ref.Yr.</th>
                
                <th colspan="3">SchoolType</th>
                <th colspan="3">Primary</th>
                <th colspan="3">JHS</th>
                <th colspan="3">Secondary</th>
                <th colspan="3">Hr.Sec</th>
                <th rowspan="2" >Actions</th>
            </tr>
            <tr>
                <th>govt</th>
                <th>adc</th>
                <th>private</th>
                <th>school</th>
                <th>student</th>
                <th>teacher</th>
                <th>school</th>
                <th>student</th>
                <th>teacher</th>
                <th>school</th>
                <th>student</th>
                <th>teacher</th>
                <th>school</th>
                <th>student</th>
                <th>teacher</th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach ($educationInfras as $educationInfra): ?>
            <tr>
                <td></td>
                <td><?= $this->Number->format($educationInfra->education_infra_id) ?></td>
                <td><?= h($educationInfra->village->village_name) ?></td>
                <td><?= $this->Number->format($educationInfra->education_reference_year,['pattern'=>'####']) ?></td>
               
                <td><?= $this->Number->format($educationInfra->total_govt_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_adc_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_private_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_primary_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_primary_student) ?></td>
                <td><?= $this->Number->format($educationInfra->total_primary_teacher) ?></td>
                <td><?= $this->Number->format($educationInfra->total_jhs) ?></td>
                <td><?= $this->Number->format($educationInfra->total_jhs_student) ?></td>
                <td><?= $this->Number->format($educationInfra->total_jhs_teacher) ?></td>
                <td><?= $this->Number->format($educationInfra->total_secondary_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_secondary_student) ?></td>
                <td><?= $this->Number->format($educationInfra->total_secondary_teacher) ?></td>
                <td><?= $this->Number->format($educationInfra->total_hrsec_school) ?></td>
                <td><?= $this->Number->format($educationInfra->total_hrsec_student) ?></td>
                <td><?= $this->Number->format($educationInfra->total_hrsec_teacher) ?></td>
                
                
                <td class="actions">
                  
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $educationInfra->education_infra_id]) ?>|
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $educationInfra->education_infra_id], ['confirm' => __('Are you sure you want to delete # {0}?', $educationInfra->education_infra_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
                <td></td>
                <td>rowid</td>
                <td>village</td>
                <td>Ref.Yr.</td>
                
                <td>govt</td>
                <td>adc</td>
                <td>private</td>
                <td>school</td>
                <td>student</td>
                <td>teacher</td>
                <td>school</td>
                <td>student</td>
                <td>teacher</td>
                <td>school</td>
                <td>student</td>
                <td>teacher</td>
                <td>school</td>
                <td>student</td>
                <td>teacher</td>
                           
               
                <td scope="col" class="actions"><?= __('Actions') ?></td>
        </tr>
        </tfoot>
    </table>
    
</div>
