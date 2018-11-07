<?php
$urlToCarsIndexJson = $this->Url->build([
    "controller" => "Vehicules",
    "action" => "findMakes",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCarsIndexJson . '";', ['block' => true]);
echo $this->Html->script('Vehicules/index', ['block' => 'scriptBottom']);
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicule[]|\Cake\Collection\CollectionInterface $vehicules
 */
?>

<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __('Actions') ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
      
        
        <li><?= $this->Html->link(__('New Vehicule'), ['action' => 'add']) ?></li>
		<li role="separator" class="divider"></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
		<li role="separator" class="divider"></li>
        <li><?= $this->Html->link(__('List Lessons'), ['controller' => 'Lessons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lessons', 'action' => 'add']) ?></li>
    </ul>
</div>

<?= $this->Form->create('Vehicules') ?>
<fieldset>
    <legend><?= __('Search vehicule by make') ?></legend>
    <?php
    echo $this->Form->input('Make', ['id' => 'autocomplete']);
    ?>
</fieldset>
<?= $this->Form->end() ?>

<div class="vehicules index large-9 medium-8 columns content">
    <form action="vehicules/add.json" class="form-inline" role="form" id="add-vehicule">
      <div class="form-group">
        <div class="input-append" id="task-input">
          <input class="form-control input-lg" name="make" type="text" id="inputLarge" placeholder="Enter a make (brand)">
          <button type="submit" class="btn btn-primary btn-lg">Add vehicule</button>
          </div>
        </div>
    </form>
    <div class="task-container" id="vehicule">
      <form action="vehicules/delete.json" class="form-inline" role="form" id="delete-vehicule">
        <div id="incomplete-label"><h5>Vehicule :</h5></div>
        <div class="form-group" id="incomplete-vehicules"></div>
      </form>
    </div>       
  </div>

<div class="vehicules index large-9 medium-8 columns content">
    <h3><?= __('Vehicules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
               
                <th scope="col"><?= $this->Paginator->sort('make') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plate') ?></th>
                
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicules as $vehicule): ?>
            <tr>
                
                <td><?= h($vehicule->make) ?></td>
                <td><?= h($vehicule->model) ?></td>
                <td><?= h($vehicule->plate) ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehicule->id]) ?>
                    <?= $this->Html->link(__('Advanced Edit'), ['action' => 'edit', $vehicule->id]) ?>
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

<?php 
echo $this->Html->script('app', ['block' => true]);
echo $this->fetch('script');
?>