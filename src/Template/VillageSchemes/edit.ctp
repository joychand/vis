<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageScheme $villageScheme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $villageScheme->village_scheme_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $villageScheme->village_scheme_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Village Schemes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageSchemes form large-9 medium-8 columns content">
    <?= $this->Form->create($villageScheme) ?>
    <fieldset>
        <legend><?= __('Edit Village Scheme') ?></legend>
        <h6> Village Name: <strong><?= $villageScheme->village->village_name ?></strong></h6>
        <?php
          //  echo $this->Form->control('village_code');
          echo $this->Form->control('scheme_financial_year',['label'=>'Scheme Financial Year:','required'=>true]);
          echo $this->Form->control('sanction_amount',['label'=>'Sanctioned Amount (Rs):','required'=>true]);
          echo $this->Form->control('location_latitude',['required'=>true]);
          echo $this->Form->control('location_longitude',['required'=>true]);
          echo $this->Form->control('scheme_status',['type'=>'select','empty'=>'Select Status', 'options'=>['Ongoing'=>'Ongoing','Completed'=>'Completed'],'required'=>true]);
          echo $this->Form->control('scheme_code',['type'=>'hidden']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
