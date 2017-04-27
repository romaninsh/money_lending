<?php
require'lib.php';
$app->layout->add('CRUD')->setModel(new User($app->db));
