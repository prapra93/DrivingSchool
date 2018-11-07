<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lessons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lessons form large-9 medium-8 columns content">
    <?= $this->Form->create($lesson) ?>
    <fieldset>
        <legend><?= __('Add Lesson') ?></legend>
        <?php
            echo $this->Form->control('title', ['rows' => '1']);
            echo $this->Form->control('description', ['rows' => '3']);
            echo $this->Form->control('price', ['rows' => '1']);
            echo $this->Form->control('files._ids', ['options' => $files]);
            echo $this->Form->control('vehicules._ids', ['options' => $vehicules]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
