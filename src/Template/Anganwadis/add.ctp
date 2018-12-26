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
         <?= $this->Form->control('anganwadi_reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>$years,'empty'=>'Select Yr.','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
       <div id="anganwadiForm" class="dataForm">
       <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
       <legend>Anganwadi Form</legend>
       
          
      
       
       <?php
            echo $this->Form->control('total_anganwadi_centre',['label'=>'1.Total Anganwadi Centre:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_enrolled_children',['label'=>'2.Total Enrolled Children:','required'=>true,'min'=>0]);?>
              

           <?php echo $this->Form->control('total_anganwadi_worker',['label'=>'3.Total Anganwadi Workers:','required'=>true,'min'=>0]);
            echo $this->Form->control('anganwadi_worker_name',['label'=>'4.Anganwadi Worker Name (One Worker):','required'=>true]);
            echo $this->Form->control('worker_mobile',['label'=>'5.Anganwadi Worker Mobile(One Worker):','required'=>true,'maxlength'=>'10',"pattern"=>'^[789]\d{9}$','oninvalid'=>'setCustomValidity(\'Plz enter a valid mobile\')', 'oninput'=>'setCustomValidity(\'\')']);
           // echo $this->Form->control('village_code');
        ?>
        <p style="font-weight:bold; font-size:.9em">6.Total no. of Pregnant Women:</p>
       
       <div class="medium-1 small-12 columns cell">
            <label for="middle-label" class="text-right middle">1st Qtr:</label>
       </div>
       <div class="medium-3 small-12 columns cell">
      <?php echo $this->Form->control('first_qtr_pregnant',['label'=>false,'required'=>true,'min'=>0]);?>   
       </div>
       <div class="medium-1 small-12 columns cell">
            <label for="middle-label" class="text-right middle">2nd Qtr:</label>
       </div>
       <div class="medium-3 small-12 columns cell">
       <?php echo $this->Form->control('second_qtr_pregnant',['label'=>false,'required'=>true,'min'=>0]);?>   
       </div>
        <div class="medium-1 small-12 columns cell">
         <label for="middle-label" class="text-right middle">3rd Qtr:</label>
        </div>
        <div class="medium-3 small-12 columns cell">
        <?php echo $this->Form->control('third_qtr_pregnant',['label'=>false,'required'=>true,'min'=>0]);?>   
         </div>
       
       </fieldset>
      
       </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
