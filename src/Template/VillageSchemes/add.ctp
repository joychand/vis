<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageScheme $villageScheme
 */
?>
<?php $this->layout = 'scheme';?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Schemes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageSchemes form large-9 medium-8 columns content">
    <?= $this->Form->create($villageScheme,['autocomplete'=>'off']) ?>
    <fieldset>
        <legend><?= __('Add Village Scheme') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
        <div id="schemeForm" class="data" >
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend>Scheme Form</legend>
        <?php
            echo $this->Form->control('scheme_code',['type'=>'select','label'=>'1. Scheme:','empty'=>'Select scheme','id'=>'scheme','options'=>$schemes,'required'=>true,'id'=>'schemes']);
            //echo $this->Form->control('village_code');
            echo $this->Form->control('village_scheme_start_fin_yr',['type'=>'select',
            'options'=>$fn_yr_array, 'empty'=>'select Fin Yr','label'=>'2. Scheme Start Financial Year:','required'=>true]);
            // echo $this->Form->control('sanction_amount',['label'=>'3. Sanctioned Amount (Rs in Lakhs):','required'=>true]);
            // echo $this->Form->control('location_latitude',['required'=>true,'label'=>'4. Latitude:']);
            // echo $this->Form->control('location_longitude',['required'=>true,'label'=>'5. Longitude:']);
            // echo $this->Form->control('scheme_status',['label'=>'6. Scheme Status:','type'=>'select','empty'=>'Select Status', 'options'=>['Ongoing'=>'Ongoing','Completed'=>'Completed'],'required'=>true,'id'=>'status']);
            echo $this->Form->control('village_scheme_description',['label'=>'3. Scheme Description:','type'=>'textarea','Placeholder'=>'Enter the Scheme Description(50 words Max)....','required'=>true,'id'=>'village_scheme']);
           
        ?>
        </fieldset>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <!-- <?= $this->Form->button(__('Add More'),['class' => 'button secondary','id'=>'more']) ?> -->
    <?= $this->Form->end() ?>
</div>
