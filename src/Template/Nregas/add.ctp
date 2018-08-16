<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nrega $nrega
 */
?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('js.cookie.js', ['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<?php $this->Html->script('nregahidediv.js', ['block'=>true]);?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village NREGA Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="nregas form large-9 medium-8 columns content">
    <?= $this->Form->create($nrega) ?>
    <fieldset>
        <legend><?= __('Add Nrega Village Data') ?></legend>
        
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division:','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true]) ?>
        <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village:','empty'=>'select Village:','id'=>'village','required'=>true]) ?>
        <div id="nregaForm">
        <?php
            echo $this->Form->control('nrega_reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>['2011'=>'2011',
            '2012'=>'2012',
            '2013'=>'2013',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018'],'empty'=>'Select Ref. Yr','required'=>true]);
            //echo $this->Form->control('nrega_reference_year');
            echo $this->Form->control('total_job_card',['Label'=>'Total Job Card:','required'=>true,'min'=>0]);
            //echo $this->Form->control('village_code');
        ?>
        </div>
        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
