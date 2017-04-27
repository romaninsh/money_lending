<?php
require'vendor/autoload.php';

$app = new \atk4\ui\App('testing');
$app->initLayout('Centered');


session_start();

var_dump($_SESSION);

//$app->layout->add(['Button', $value]);
