<?php
require'lib.php';

$app = new MyApp();

$contact = $app->user->ref('Contact');
$contact->load($app->stickyGet('contact_id'));


$app->layout->add(['Header', 'Loans for '.$contact['name'], 'icon'=>'circular user', 'subHeader'=>$contact['email']. ', '.$contact['phone_number']]);

$c = $app->layout->add(['ui'=>'segment'])->add(new \atk4\ui\Columns('divided'));

$left = $c->addColumn();
$right = $c->addColumn();

$left->add('CRUD')->setModel($contact->ref('Loan'));

$right->add(new ReminderBox())->setModel($contact);
/*$reminder->add('Header')->set('Please repay my loan, '.$contact['name']);
$reminder->add('Text')->addParagraph('I have loaned you a total of 123 from which you still owe me 21. Please pay back!');
$reminder->add('Text')->addParagraph('Thanks, '.$app->user['name']);
 */


// Link to our reminder page
$reminder_url = "http://$_SERVER[HTTP_HOST]/reminder.php?code=".$contact->id;

$line = $right->add(['FormField/Line', $reminder_url, 'fluid', 'label'=>'Reminder URL:']);
