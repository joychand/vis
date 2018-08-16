<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageScheme $villageScheme
 */
?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('js.cookie.js', ['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<?php $this->Html->script('schemehidediv.js', ['block'=>true]);?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Schemes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageSchemes form large-9 medium-8 columns content">
    <?= $this->Form->create($villageScheme) ?>
    <fieldset>
        <legend><?= __('Add Village Scheme') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true]) ?>
        <div id="schemeForm">
        <?php
            echo $this->Form->control('scheme_code',['type'=>'select','label'=>'Scheme:','empty'=>'Select scheme','id'=>'scheme','options'=>$schemes,'required'=>true]);
            //echo $this->Form->control('village_code');
            echo $this->Form->control('scheme_financial_year',['label'=>'Scheme Financial Year:','required'=>true]);
            echo $this->Form->control('sanction_amount',['label'=>'Sanctioned Amount (Rs):','required'=>true]);
            echo $this->Form->control('location_latitude',['required'=>true]);
            echo $this->Form->control('location_longitude',['required'=>true]);
            echo $this->Form->control('scheme_status',['type'=>'select','empty'=>'Select Status', 'options'=>['Ongoing'=>'Ongoing','Completed'=>'Completed'],'required'=>true]);
           
        ?>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
