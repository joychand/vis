<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Populations $educationInfra
 */
$this->assign('title', 'GTV Report');
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List GTV Report Village Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="educationInfras form large-9 medium-8 columns content" >
    <?= $this->Form->create($sdoreport,['id'=>'formSdo','autocomplete'=>'off']) ?>
    <fieldset>
        <legend><?= __('Add GTV Report Village Data') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
        <?= $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr:','options'=> ['2011'=>'2011',
            '2012'=>'2012',
            '2013'=>'2013',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018'],'empty'=>'Select Ref. Yr','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id="sdoForm" class="dataForm">
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend>SDO Report Form</legend>
        <?php
            
            echo $this->Form->control('total_household',['label'=>'1. Total Household No.:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_population',['label'=>'2. Total Population:','required'=>true,'min'=>0]);
           
           // echo $this->Form->control('village_code');
        ?>
        </fieldset>
        
        </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>