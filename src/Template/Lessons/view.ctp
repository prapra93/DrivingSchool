<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lesson $lesson
 */
?>

<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __('Actions') ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?= $this->Html->link(__('New Lesson'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Edit Lesson'), ['action' => 'edit', $lesson->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lesson'), ['action' => 'delete', $lesson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lesson->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lessons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['action' => 'add']) ?> </li>
        <li role="separator" class="divider"></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li role="separator" class="divider"></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
        <li role="separator" class="divider"></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?> </li>
    </ul>
</div>

<div class="lessons view large-9 medium-8 columns content">
    <h3><?= h($lesson->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $lesson->has('user') ? $this->Html->link($lesson->user->email, ['controller' => 'Users', 'action' => 'view', $lesson->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $lesson->has('user') ? $this->Html->link($lesson->user->role, ['controller' => 'Users', 'action' => 'view', $lesson->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($lesson->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($lesson->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($lesson->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($lesson->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($lesson->description)); ?>
    </div>
    <div class="row">
            <h4><?= __('_') ?></h4>
            <?= $this->Text->autoParagraph(h($lesson->body)); ?>
        </div>
        <div class="related">
            <?php if (!empty($lesson->files)): ?>
            <table cellpadding="0" cellspacing="0">
                <?php foreach ($lesson->files as $files): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->image($files->path.$files->name, [
                            "alt" => $files->name,
                            ]);
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
    <div class="related">
        <h4><?= __('Rented vehicule for the lesson') ?></h4>
        <?php if (!empty($lesson->vehicules)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Make') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Plate') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lesson->vehicules as $vehicules): ?>
            <tr>
                <td><?= h($vehicules->id) ?></td>
                <td><?= h($vehicules->make) ?></td>
                <td><?= h($vehicules->model) ?></td>
                <td><?= h($vehicules->plate) ?></td>
                <td><?= h($vehicules->created) ?></td>
                <td><?= h($vehicules->modified) ?></td>
                <td><?= h($vehicules->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehicules', 'action' => 'view', $vehicules->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehicules', 'action' => 'edit', $vehicules->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehicules', 'action' => 'delete', $vehicules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicules->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
