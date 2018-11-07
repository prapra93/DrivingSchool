<?php
echo $this->Html->charset();
echo $this->Html->css([
    'Bootstrap/Slate/bootstrap.min.css',
    'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
    'http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css',
    'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic',
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    //'materialize/css/materialize.min.css',
    'categories/index/custom.css',
    'app'
]);
echo $this->Html->script([
    'https://code.jquery.com/jquery-1.12.4.js',
    'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js',
    'http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js',
    'http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js',
    'http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js',
    'http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
    'materialize.min',
        ], ['block' => 'scriptLibraries']
);


echo $this->Html->css('bootstrap.min.css');
//echo $this->Html->css('materialize/css/materialize.min.css');


?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?= __('~VROOM~ Driving School') ?></title>
