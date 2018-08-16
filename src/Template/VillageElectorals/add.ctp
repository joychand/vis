<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageElectoral $villageElectoral
 */
?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<?php $this->Html->script('electionhide.js', ['block'=>true]);?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Electorals Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageElectorals form large-9 medium-8 columns content">
    <?= $this->Form->create($villageElectoral) ?>
    <fieldset>
        <legend><?= __('Add Village Electoral') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
        <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division:','options'=>$subdistricts,'empty'=>'Select SubDivision','id'=>'subdistrict','rel'=>$targetUrl,'required'=>true]) ?>
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'Select Village','id'=>'village','required'=>true]) ?>
        <div id ="electionForm">
        <?php
            echo $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>
            ['2011'=>'2011',
            '2012'=>'2012',
            '2013'=>'2013',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018'],'required'=>true,'empty'=>'Select Ref. Yr.']);
            echo $this->Form->control('electoral_total_household',['required'=>true,'min'=>0]);
            echo $this->Form->control('electoral_total_voter',['required'=>true,'min'=>0]);
           // echo $this->Form->control('village_code');
        ?>
        </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
