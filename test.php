<?php
require'vendor/autoload.php';

if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
    // we are on Heroku
    var_dump($_ENV['CLEARDB_DATABASE_URL']);

}else{
    // we are on local
}

//$app = new \atk4\ui\App('testing');
//$app->initLayout('Centered');
//$app->layout->add('LoremIpsum');
