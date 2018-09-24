<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodSecurity[]|\Cake\Collection\CollectionInterface $foodSecurities
 */
$this->layout = 'index_layout';
 $ajaxFilterUrl=$this->Url->build(['action' => 'ajaxFilterSubdivision']); 
 $ajaxDeleteUrl=$this->Url->build(['action' => 'ajaxDelete']); 

  $this->Html->script('DataTables/foodsecurity.js',['block'=>'scriptBottom']);  


?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('New Village CAF&PD DATA'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foodSecurities index large-9 medium-8 columns content">
    
    <fieldset style="padding:0 !important"><legend><?= __('Village CAF & PD DATA') ?></legend></fieldset>

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
                 <th colspan="2">AAY</th>
                 <th colspan="2">PHH</th>
                 <th rowspan="2">Aaddhaar<br>seeded</th>
                 <th rowspan="2">FairPrice<br>Shop</th>
                 <th rowspan="2">FairPrice<br>Name</th>
                 <th rowspan="2">Actions</th>
            </tr> 
            <tr>    
                 <th>Card</th>
                 <th>Members</th>
                 <th>Card</th>
                 <th>Members</th>
                 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($foodSecurities as $foodSecurity): ?>
            <tr>
                <td></td>
                <td><?= $this->Number->format($foodSecurity->food_security_id) ?></td>
                <td><?= h($foodSecurity->village->village_name) ?></td>
                <td><?= $this->Number->format($foodSecurity->reference_year,['pattern'=>'####']) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_aay_card) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_aay_members) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_phh_card) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_phh_members) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_aadhaar_seeded_card) ?></td>
                <td><?= $this->Number->format($foodSecurity->total_fair_price_shop) ?></td>
                <td><?= h($foodSecurity->fair_price_shop_name) ?></td>
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foodSecurity->food_security_id]) ?> |
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $foodSecurity->food_security_id], ['confirm' => __('Are you sure you want to delete # {0}?', $foodSecurity->food_security_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
                 <td ></td>
                 <td >rowid</td>
                 <td>village</td>
                 <td>Ref.Yr.</td>
                 <td>Card</td>
                 <td>Members</td>
                 <td>Card</td>
                 <td>Members</td>
                 <td>Aaddhaar<br>seeded</td>
                 <td>FairPrice<br>Shop</td>
                 <td>FairPrice<br>Name</td>
                 <td>Actions</td>
            </tr> 
        
        </tfoot>
    </table>
    
</div>
