<?php
require'lib.php';


$app = new MyApp(false);

$m = new Contact($app->db);
$m->load($_GET['code']);;
$app->layout->add(new ReminderBox())->setModel($m);

