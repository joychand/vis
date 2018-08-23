<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anganwadi $anganwadi
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $anganwadi->anganwadi_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $anganwadi->anganwadi_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List  Village Anganwadi Data'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="anganwadis form large-9 medium-8 columns content">
    <?= $this->Form->create($anganwadi) ?>
    <fieldset>
        <legend><?= __('Edit Village Anganwadi Data') ?></legend>
        <h6>Village Name:<strong><?= $anganwadi->village->village_name?></strong> Ref. Yr. : <strong><?= $anganwadi->anganwadi_reference_year?></strong> </h6>
        <?php
           // echo $this->Form->control('anganwadi_reference_year');
           echo $this->Form->control('total_anganwadi_centre',['label'=>'Total Anganwadi Centre:','required'=>true,'min'=>0]);
           echo $this->Form->control('total_anganwadi_worker',['label'=>'Total Anganwadi Workers:','required'=>true,'min'=>0]);
           echo $this->Form->control('total_enrolled_children',['label'=>'Total Enrolled Children:','required'=>true,'min'=>0]);
           echo $this->Form->control('worker_mobile',['label'=>'Anganwadi Worker Mobile:','required'=>true]);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Update')) ?>
    <?= $this->Form->end() ?>
</div>
