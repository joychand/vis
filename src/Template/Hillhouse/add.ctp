<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('List  Hill House Tax Data'), ['action' => 'index']) ?></li>
        
    </ul>
</nav>
<div class="educationInfras form large-9 medium-8 columns content" >
    <?= $this->Form->create($hhtax,['id'=>'formHh','autocomplete'=>'off']) ?>
    <fieldset>
        <legend><?= __('Add Hill House Tax Data') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true,'value'=>$selected]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
        <?= $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr:','options'=> $years,'empty'=>'Select Ref. Yr','required'=>true,'value'=>$selected_ref_yr,'class'=>'ref_yr']);?>
        <div id="securityForm" class="dataForm">
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend>Hill House Tax</legend>
        <?php
            
            echo $this->Form->control('total_household',['label'=>'1. Total Household No.:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_population',['label'=>'2. Total Population:','required'=>true,'min'=>0]);
           
           // echo $this->Form->control('village_code');
        ?>
        </fieldset> </div>
        </fieldset>
       
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>