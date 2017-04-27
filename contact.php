<?php
require'lib.php';

$app = new MyApp();

$crud = $app->layout->add('CRUD');

$crud->addColumn('name', new \atk4\ui\TableColumn\Link(['loan', 'contact_id'=>'{$id}']));

$crud->setModel($app->user->ref('Contact'), ['email', 'phone_number']);
