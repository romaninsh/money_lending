<?php
require'vendor/autoload.php';

$app = new \atk4\ui\App('testing');
$app->initLayout('Centered');



class ViewSourceButton extends \atk4\ui\Button
{
    public $content = 'View Source';  // default label
  
    function init() {
        parent::init();
      
        $vp = $this->add('Callback');
        $vp->set(function() {
            highlight_file($_SERVER['SCRIPT_FILENAME']);
            exit;
        });
        $this->link($vp->getURL());
    }
}

$app->layout->add([new ViewSourceButton()]);
