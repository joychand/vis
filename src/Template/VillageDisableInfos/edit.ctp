<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillageDisableInfo $villageDisableInfo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $villageDisableInfo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $villageDisableInfo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Village Disable Infos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villageDisableInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($villageDisableInfo) ?>
    <fieldset>
        <legend><?= __('Edit Village Disable Info') ?></legend>
        <?php
            echo $this->Form->control('village_code');
            echo $this->Form->control('reference_year');
            echo $this->Form->control('blind');
            echo $this->Form->control('deaf');
            echo $this->Form->control('others');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>