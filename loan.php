<?php
require'lib.php';

$app = new MyApp();

$contact = $app->user->ref('Contact');
$contact->load($app->stickyGet('contact_id'));


$app->layout->add(['Header', 'Loans for '.$contact['name'], 'icon'=>'circular user', 'subHeader'=>$contact['email']. ', '.$contact['phone_number']]);

$c = $app->layout->add(new \atk4\ui\Columns('divided'));

$left = $c->addColumn()->add(['View', 'ui'=>'segment']);
$right = $c->addColumn()->add(['View', 'ui'=>'segment']);

$left->add(['Header', 'All Loans']);

$left->add('CRUD')->setModel($contact->ref('Loan'));
