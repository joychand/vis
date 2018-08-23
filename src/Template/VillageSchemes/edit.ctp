<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageScheme $villageScheme
 */
?>
<?php $this->layout = 'scheme';?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
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
          echo $this->Form->control('scheme_financial_year',[ 'type'=>'select','label'=>'Scheme Financial Year:','required'=>true,
                                                               'options'=>[
                                                                '2010'=>'2010-2011',
                                                                '2011'=>'2011-2012',
                                                                '2012'=>'2012-2013',
                                                                '2013'=>'2013-2014',
                                                                '2014'=>'2014-2015',
                                                                '2015'=>'2015-2016',
                                                                '2016'=>'2016-2017',
                                                                '2017'=>'2017-2018',
                                                                '2018'=>'2011-2019'] ]);
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
