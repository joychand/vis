<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Populations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $Hillhouse->reference_year,$Hillhouse->village_code,$Hillhouse->counting_agency],
                ['confirm' => __('Are you sure you want to delete # {0}?', $Hillhouse->reference_year,$Hillhouse->village_code,$Hillhouse->counting_agency)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List HillHouse Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="anganwadis form large-9 medium-8 columns content">
    <?= $this->Form->create($Hillhouse) ?>
    <fieldset>
        <legend><?=  __('Edit Village Hill House DATA: ') ?>   </legend>
        <h6>Village Name: <strong><?= $Hillhouse->village->village_name ?></strong> Ref. Yr. :<strong><?= $Hillhouse->reference_year ?> </strong> </h6>
        <?php
           // echo $this->Form->control('reference_year');
            echo $this->Form->control('village_code');
            echo $this->Form->control('counting_agency',['hidden'=>true]);
            echo $this->Form->control('total_household',['label'=>'Total Household No.','required'=>true,'min'=>0]);
            echo $this->Form->control('total_population',['label'=>'Total Population','required'=>true,'min'=>0]);
           
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>