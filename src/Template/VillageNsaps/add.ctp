<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageNsap $villageNsap
 */
?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<?php $this->Html->script('nsaphidediv.js', ['block'=>true]);?>
<?php $this->Html->script('js.cookie.js', ['block'=>true]);?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Nsaps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageNsaps form large-9 medium-8 columns content">
    <?= $this->Form->create($villageNsap) ?>
    <fieldset>
        <legend><?= __('Add Village Nsap') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division:','options'=>$subdistricts,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true]) ?>
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true]) ?>
        <div id="nsapsForm">
        <?php
            echo $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr:','options'=>['2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018'],'empty'=>'Select Yr.','required'=>true]);
            echo $this->Form->control('total_widows_beneficiary',['required'=>true,'min'=>0]);
            echo $this->Form->control('total_handicap_beneficiary',['required'=>true,'min'=>0]);
            echo $this->Form->control('total_ignoaps_beneficiary',['label'=>'Total IGNOAPS Beneficiary','required'=>true,'min'=>0]);
           // echo $this->Form->control('village_code');
        ?>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
