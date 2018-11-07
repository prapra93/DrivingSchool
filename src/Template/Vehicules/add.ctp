<?php
echo $this->Html->script('Vehicules/add', ['block' => 'scriptBottom']);
?>

<?php
/*$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Subcourses",
    "action" => "getBycourse",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Vehicules/add.js', ['block' => 'scriptBottom']);*/
?>

<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lessons'), ['controller' => 'Lessons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lessons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicules form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="coursesController">
    <!-- h3> Debug </h3>
    You have selected course: <span ng-bind="subcourses.id"></span> <span ng-bind="subcourses.name"></span><br/>
    and subcourse : <span ng-bind="subcourse.id"></span> <span ng-bind="subcourse.name"></span>
    <pre ng-show='courses'>{{ courses | json }}</pre -->
    <?= $this->Form->create($vehicule) ?>
    <fieldset>
        <legend><?= __('Add Vehicule') ?></legend>
        <div>
            Courses: 
            <select name="Course_id"
                    id="course-id" 
                    ng-model="course" 
                    ng-options="course.name for course in courses track by course.id"
                    >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            Subcourses: 
            <select name="subcourse_id"
                    id="subcourse-id" 
                    ng-disabled="!course" 
                    ng-model="subcourse"
                    ng-options="subcourse.name for subcourse in course.subcourses track by subcourse.id"
                    >
                <option value=''>Select</option>
            </select>
        </div>
        <?php
            //echo $this->Form->input('course_id', ['options' => $courses]);
            //echo $this->Form->input('subcourse_id', ['options' => $subcourses]);
            echo $this->Form->control('make', ['rows' => '1']);
            echo $this->Form->control('model', ['rows' => '1']);
            echo $this->Form->control('plate', ['rows' => '1']);
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