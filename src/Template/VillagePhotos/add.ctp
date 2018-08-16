<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillagePhoto $villagePhoto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
       
    </ul>
</nav>
<div class="villagePhotos form large-9 medium-8 columns content">
    <?= $this->Form->create($villagePhoto,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Village Photo') ?></legend>
        <?php
           echo $this->Form->control('village_code');
           echo $this->Form->control('villagePhoto.0.photo',['type'=>'file']);
           echo $this->Form->control('villagePhoto.1.photo',['type'=>'file']);
           echo $this->Form->control('villagePhoto.2.photo',['type'=>'file']);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
