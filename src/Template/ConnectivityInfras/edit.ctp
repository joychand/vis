<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ConnectivityInfra $connectivityInfra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $connectivityInfra->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $connectivityInfra->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Connectivity Infras'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="connectivityInfras form large-9 medium-8 columns content">
    <?= $this->Form->create($connectivityInfra) ?>
    <fieldset>
        <legend><?= __('Edit Village Connectivity Infra') ?></legend>
        <h6>Village Name:<strong><?= $connectivityInfra->village->village_name?></strong> Ref. Yr. : <strong><?= $connectivityInfra->reference_year?></strong> </h6>
        <?php
            echo $this->Form->control('approached_road_status',['label'=>'1. Approached Road Status','type'=>'select','required'=>'true','options'=>['Y'=>'Yes','N'=>'No'],'empty'=>'-select-']);
            echo $this->Form->control('distance_from_appr_road',['label'=>'2. Distance from Appr Road (km) ']);
           // echo $this->Form->control('village_code');
           // echo $this->Form->control('reference_year');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
