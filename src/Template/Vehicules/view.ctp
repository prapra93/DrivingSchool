<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicule $vehicule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicule'), ['action' => 'edit', $vehicule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicule'), ['action' => 'delete', $vehicule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lessons'), ['controller' => 'Lessons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lessons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicules view large-9 medium-8 columns content">
    <h3><?= h($vehicule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subcategory') ?></th>
            <td><?= h($vehicule->subcategory['name']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Make') ?></th>
            <td><?= h($vehicule->make) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($vehicule->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Plate') ?></th>
            <td><?= h($vehicule->plate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $vehicule->has('user') ? $this->Html->link($vehicule->user->id, ['controller' => 'Users', 'action' => 'view', $vehicule->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($vehicule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($vehicule->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Lessons') ?></h4>
        <?php if (!empty($vehicule->lessons)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicule->lessons as $lessons): ?>
            <tr>
                <td><?= h($lessons->id) ?></td>
                <td><?= h($lessons->user_id) ?></td>
                <td><?= h($lessons->title) ?></td>
                <td><?= h($lessons->description) ?></td>
                <td><?= h($lessons->price) ?></td>
                <td><?= h($lessons->created) ?></td>
                <td><?= h($lessons->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Lessons', 'action' => 'view', $lessons->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Lessons', 'action' => 'edit', $lessons->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lessons', 'action' => 'delete', $lessons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lessons->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
