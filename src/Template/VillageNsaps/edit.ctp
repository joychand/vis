<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageNsap $villageNsap
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $villageNsap->village_nsap_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $villageNsap->village_nsap_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Village Nsaps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageNsaps form large-9 medium-8 columns content">
    <?= $this->Form->create($villageNsap) ?>
    <fieldset>
        <legend><?= __('Edit Village Nsap') ?></legend>
        <h6>Village Name:<strong><?= $villageNsap->village->village_name?></strong> Ref. Yr. : <strong><?= $villageNsap->reference_year?></strong> </h6>
        <?php
            echo $this->Form->control('total_widows_beneficiary',['required'=>true,'min'=>0]);
            echo $this->Form->control('total_handicap_beneficiary',['required'=>true,'min'=>0]);
            echo $this->Form->control('total_ignoaps_beneficiary',['label'=>'Total IGNOAPS Beneficiary','required'=>true,'min'=>0]);
           // echo $this->Form->control('village_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
