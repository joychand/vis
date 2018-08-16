<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VillagePhoto $villagePhoto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Village Photo'), ['action' => 'edit', $villagePhoto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Village Photo'), ['action' => 'delete', $villagePhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $villagePhoto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Village Photos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Village Photo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="villagePhotos view large-9 medium-8 columns content">
    <h3><?= h($villagePhoto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($villagePhoto->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($villagePhoto->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Type') ?></th>
            <td><?= h($villagePhoto->photo_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Size') ?></th>
            <td><?= h($villagePhoto->photo_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Village Code') ?></th>
            <td><?= h($villagePhoto->village_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($villagePhoto->id) ?></td>
        </tr>
    </table>
</div>
