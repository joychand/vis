<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anganwadi $anganwadi
 */
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Anganwadi Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="anganwadis form large-9 medium-8 columns content">
    <?= $this->Form->create($anganwadi,['autocomplete'=>'off']) ?>
   
    <fieldset>
        <legend><?= __('Add Anganwadi Village Data') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village','id'=>'village','empty'=>'Select Village','required'=>true,'options'=>$villages]) ?>
         <?= $this->Form->control('anganwadi_reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>['2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018'],'empty'=>'Select Yr.','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
       <div id="anganwadiForm" class="dataForm">
       <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
       <legend>Anganwadi Form</legend>
       <?php
            echo $this->Form->control('total_anganwadi_centre',['label'=>'1.Total Anganwadi Centre:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_anganwadi_worker',['label'=>'2.Total Anganwadi Workers:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_enrolled_children',['label'=>'3.Total Enrolled Children:','required'=>true,'min'=>0]);
            echo $this->Form->control('worker_mobile',['label'=>'4.Anganwadi Worker Mobile:','required'=>true,'maxlength'=>'10',"pattern"=>'^[789]\d{9}$','oninvalid'=>'setCustomValidity(\'Plz enter a valid mobile\')', 'oninput'=>'setCustomValidity(\'\')']);
           // echo $this->Form->control('village_code');
        ?>
       
       </fieldset>
      
       </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
