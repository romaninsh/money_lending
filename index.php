<?php
require'lib.php';


if (isset($_SESSION['user_id'])) {
    header('Location: contact.php');
    exit;
}


$app = new MyApp('login');

$form = $app->layout->add('Form');
$form->addField('email');
$form->addField('password');

$form->onSubmit(function($form) { 

    $m = new User($form->app->db);
    $m->tryLoadBy('email', $form->model['email']);

    if (!$m->loaded()) { 
        return $form->error('email', 'No such user');
    }

    if ($m['password'] != $form->model['password']) {
        return $form->error('password', 'Incorrect password');
    }

    $_SESSION['user_id'] = $m->id;

    // Start Session

    return new \atk4\ui\jsExpression('document.location="contact.php"');
    //return $form->success('You are logged in!');

});

//$app->layout->add(['Button', 'Skip login'])->link('contact.php');
