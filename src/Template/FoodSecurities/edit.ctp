<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodSecurity $foodSecurity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foodSecurity->food_security_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foodSecurity->food_security_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List CAF&PD Village Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="foodSecurities form large-9 medium-8 columns content">
    <?= $this->Form->create($foodSecurity) ?>
    <fieldset>
        <legend><?= __('Edit CAF & PD Village Data') ?></legend>
        <h6>Village Name:<strong><?= $foodSecurity->village->village_name?></strong> Ref. Yr. : <strong><?= $foodSecurity->reference_year?></strong> </h6>
        <?php
            //echo $this->Form->control('total_aay_members');
           // echo $this->Form->control('reference_year',['type'=>'select','label'=>'Ref.Yr:','options'=>['2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018'],'empty'=>'Select Yr.','required'=>true]);
            echo $this->Form->control('total_aay_members',['label'=>'Total AAY Members:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_phh_members',['label'=>'Total PHH Members:','required'=>true,'min'=>0]);
            echo $this->Form->control('total_aadhaar_seeded_card',['label'=>'Total Aadhaar Seeded Card','required'=>true,'min'=>0]);
            echo $this->Form->control('total_fair_price_shop',['label'=>'Total Fair Price Shop','required'=>true,'min'=>0]);
           // echo $this->Form->control('village_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
