<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subcourse $subcourse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subcourse'), ['action' => 'edit', $subcourse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subcourse'), ['action' => 'delete', $subcourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subcourse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subcourses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subcourse'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subcourses view large-9 medium-8 columns content">
    <h3><?= h($subcourse->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subcourse->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $subcourse->has('course') ? $this->Html->link($subcourse->course->name, ['controller' => 'Courses', 'action' => 'view', $subcourse->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subcourse->id) ?></td>
        </tr>
    </table>
</div>
