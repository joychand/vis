<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anganwadi $anganwadi
 */
?>
<?php  $this->Html->script('jquery-3.3.1.min.js',['block'=>true]);?>
<?php $this->Html->script('dropdown.js', ['block'=>true]);?>
<?php $this->Html->script('hidediv.js', ['block'=>true]);?>
<?php $this->Html->script('js.cookie.js', ['block'=>true]);?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Change Password'), ['controller'=>'Users','action' => 'changePassword']) ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Html->link(__('List Village Anganwadi Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="anganwadis form large-9 medium-8 columns content">
    <?= $this->Form->create($anganwadi) ?>
   
    <fieldset>
        <legend><?= __('Add Anganwadi Village Data') ?></legend>
        <?php $targetUrl = $this->Url->build(['action' => 'getvillage']); ?>
         <?= $this->Form->control('subdistrict',['type'=>'select','label'=>'Sub-Division','id'=>'subdistrict','rel'=>$targetUrl,'options'=>$subdistricts,'empty'=>'Select SubDivision','required'=>true]) ?>
        
         <?= $this->Form->control('village_code',['type'=>'select','label'=>'Village','id'=>'village','empty'=>'Select Village','required'=>true]) ?>
       <div id="anganwadiForm">
       <?php
            echo $this->Form->control('anganwadi_reference_year',['type'=>'select','label'=>'Ref.Yr','options'=>['2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018'],'empty'=>'Select Yr.','required'=>true]);
            echo $this->Form->control('total_anganwadi_centre',['label'=>'Total Anganwadi Centre:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_anganwadi_worker',['label'=>'Total Anganwadi Workers:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_enrolled_children',['label'=>'Total Enrolled Childres:','required'=>true,'min'=>0]);
            echo $this->Form->control('worker_mobile',['label'=>'Anganwadi Worker Mobile:','required'=>true]);
           // echo $this->Form->control('village_code');
        ?>
       </div>
       
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
