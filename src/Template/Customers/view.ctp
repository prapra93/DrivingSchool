<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($customer->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Done') ?></th>
            <td><?= $this->Number->format($customer->is_done) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Client') ?></h4>
        <?= $this->Text->autoParagraph(h($customer->client)); ?>
    </div>
    <div class="row">
        <h4><?= __('Created') ?></h4>
        <?= $this->Text->autoParagraph(h($customer->created)); ?>
    </div>
    <div class="row">
        <h4><?= __('Modified') ?></h4>
        <?= $this->Text->autoParagraph(h($customer->modified)); ?>
    </div>
</div>
