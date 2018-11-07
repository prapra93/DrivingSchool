<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lesson[]|\Cake\Collection\CollectionInterface $lessons
 */
?>
<?php $this->Html->script('app', ['block' => true]); ?>

<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __('Actions') ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><?= $this->Html->link(__('New Lesson'), ['action' => 'add']) ?></li>
        <li role="separator" class="divider"></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
		<li role="separator" class="divider"></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
		<li role="separator" class="divider"></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?></li>
    </ul>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3><?= __('Lessons') ?></h3>  
        </div>
        <div class="row">
            <?php foreach ($lessons as $lesson): ?> 
                <div class="col-lg-2">
                    <h3><?= $this->Html->link(h($lesson->title), ['action' => 'view', $lesson->id]) ?></h3>
                   
                    <div class="icon">
                        <?php
                        if (!empty($lesson->files)) {
                            $file = reset($lesson->files);
                            echo $this->Html->image($file->path . $file->name, [
                                "alt" => $file->name,
                                "width" => "220px",
                                "height" => "150px",
                                'url' => ['action' => 'view', $file->id]
                            ]);
                        }
                        ?>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <?= __('Actions') ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li></li>
							<li><?= $this->Html->link('PDF', ['action' => 'view', $lesson->id . '.pdf']) ?></li>
                            <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $lesson->id]) ?></li>
                            <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lesson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lesson->id)]) ?></li>
                        </ul>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div>

    </div>

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