<?php
require'vendor/autoload.php';

$app = new \atk4\ui\App('testing');
$app->initLayout('Centered');
$app->layout->add('LoremIpsum');
