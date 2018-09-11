<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scheme $scheme
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schemes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schemes form large-9 medium-8 columns content">
    <?= $this->Form->create($scheme) ?>
    <fieldset>
        <legend><?= __('Add Scheme') ?></legend>
        <?php
            echo $this->Form->control('scheme_name',['required'=>true]);
            echo $this->Form->control('department_id', ['type'=>'select','options' => $departments, 'empty' => 'Select a Department','required'=>true]);
            echo $this->Form->control('scheme_financial_year',['type'=>'select',
            'options'=>['2010'=>'2010-2011',
                        '2011'=>'2011-2012',
                        '2012'=>'2012-2013',
                        '2013'=>'2013-2014',
                        '2014'=>'2014-2015',
                        '2015'=>'2015-2016',
                        '2016'=>'2016-2017',
                        '2017'=>'2017-2018',
                        '2018'=>'2018-2019'], 'empty'=>'select Fin Yr','label'=>'3.Financial Year:','required'=>true]);
            echo $this->Form->control('sanction_amount',['label'=>'4. Sanctioned Amount (Rs in Lakhs):','required'=>true]);
            echo $this->Form->control('scheme_status',['label'=>'5. Scheme Status:','type'=>'select','empty'=>'Select Status', 'options'=>['Ongoing'=>'Ongoing','Completed'=>'Completed'],'required'=>true,'id'=>'status']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
