<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Subcategories",
    "action" => "getByCategory",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Vehicules/add.js', ['block' => 'scriptBottom']);
?>

<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehicule->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehicule->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lessons'), ['controller' => 'Lessons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lessons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicules form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicule) ?>
    <fieldset>
        <legend><?= __('Edit Vehicule') ?></legend>
        <?php
            echo $this->Form->input('Category_id', ['options' => $categories]);
            echo $this->Form->input('subcategory_id', ['options' => $subcategories]);
            echo $this->Form->control('make');
            echo $this->Form->control('model');
            echo $this->Form->control('plate');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('lessons._ids', ['options' => $lessons]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php

echo $this->fetch('script');
?>
