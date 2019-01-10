<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Populations $educationInfra
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List NERCORMP Village Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="educationInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($nercormp) ?>
    <fieldset>
        <legend><?= __('Add NERCORMP Village Data') ?></legend>
       
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected])  ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages])  ?>
        <?= $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr','options'=> $years,'empty'=>'Select Ref. Yr','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]) ;?>
        <div id="nercormpForm" class="dataForm">
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend>NERCORMP FORM</legend>
        
        <?php
           
            echo $this->Form->control('total_household',['label'=>'1. Total Household No.','required'=>true,'min'=>0]);
            echo $this->Form->control('total_population',['label'=>'2. Total Population','required'=>true,'min'=>0]);
           
           // echo $this->Form->control('village_code');
        ?>
        </fieldset> </div>
    </fieldset>
   
        
    
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>