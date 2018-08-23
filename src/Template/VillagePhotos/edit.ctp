<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillagePhoto $villagePhoto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Dept/Scheme Home'), ['action' => 'home']) ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $villagePhoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $villagePhoto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Village Photos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="villagePhotos form large-9 medium-8 columns content">
    <?= $this->Form->create($villagePhoto) ?>
    <fieldset>
        <legend><?= __('Edit Village Photo') ?></legend>
        <?php
            echo $this->Form->control('photo');
            echo $this->Form->control('photo_dir');
            echo $this->Form->control('photo_type');
            echo $this->Form->control('photo_size');
            echo $this->Form->control('village_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
