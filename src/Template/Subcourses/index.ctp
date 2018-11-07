<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subcourse[]|\Cake\Collection\CollectionInterface $subcourses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Subcourse'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subcourses index large-9 medium-8 columns content">
    <h3><?= __('Subcourses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subcourses as $subcourse): ?>
            <tr>
                <td><?= $this->Number->format($subcourse->id) ?></td>
                <td><?= h($subcourse->name) ?></td>
                <td><?= $subcourse->has('course') ? $this->Html->link($subcourse->course->name, ['controller' => 'Courses', 'action' => 'view', $subcourse->course->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subcourse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subcourse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subcourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subcourse->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
