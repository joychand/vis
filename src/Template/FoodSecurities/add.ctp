<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodSecurity $foodSecurity
 */
?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<?php $this->Html->script('cafhidediv.js', ['block'=>true]);?>
<?php $this->assign('title', 'CAF&PD');?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__(' Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village CAF&PD Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="CAF form large-9 medium-8 columns content">
    <?= $this->Form->create($foodSecurity,['autocomplete'=>'off']) ?>
    <fieldset>
    
        <legend><?= __('Add Village CAF & PD data') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division:','options'=>$subdistricts,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true,'value'=>$selected]) ?>
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true,'options'=>$villages]) ?>
         <?php echo $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr:','options'=>['2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018'],'empty'=>'Select Yr.','required'=>true,'class'=>'ref_yr','value'=>$selected_ref_yr]);?>
        <div id="cafForm">
        <fieldset class = "fieldset" style="border: 1px solid #cacaca;  padding: 1.25rem;  margin: 1.125rem 0;">
        <legend> CAFPD FORM</legend>
        <?php
            
            
            echo $this->Form->control('total_aay_card',['label'=>'1.Total AAY Cards:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_aay_members',['label'=>'2.Total AAY Members:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_phh_card',['label'=>'3.Total PHH Cards:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_phh_members',['label'=>'4.Total PHH Members:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_aadhaar_seeded_card',['label'=>'5.Total Aadhaar Seeded Card','required'=>true,'min'=>0]);
            echo $this->Form->control('total_fair_price_shop',['label'=>'6.Total Fair Price Shop','required'=>true,'min'=>0]);
            //echo $this->Form->control('village_code');
        ?>
        </legend>
        </div>
       </fieldset> 
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
