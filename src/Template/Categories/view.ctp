<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subcaregories'), ['controller' => 'Subcaregories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subcaregory'), ['controller' => 'Subcaregories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Subcaregories') ?></h4>
        <?php if (!empty($category->subcaregories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->subcaregories as $subcaregories): ?>
            <tr>
                <td><?= h($subcaregories->id) ?></td>
                <td><?= h($subcaregories->name) ?></td>
                <td><?= h($subcaregories->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Subcaregories', 'action' => 'view', $subcaregories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subcaregories', 'action' => 'edit', $subcaregories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subcaregories', 'action' => 'delete', $subcaregories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subcaregories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
