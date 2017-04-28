<?php
require'vendor/autoload.php';

$app = new \atk4\ui\App('"TODO" App with Agile Toolkit');
$app->initLayout('Centered');

class ToDo extends \atk4\data\Model {
    public $table = 'todo_item2';
    function init() {
        parent::init();
      
        $this->addField('name', ['caption'=>'Task Name', 'required'=>true]);
        $this->addField('due', ['type'=>'date', 'caption'=>'Due Date', 'default'=>new \DateTime('+1 week')]);
    }
}

session_start();
$s = new \atk4\data\Persistence_Array($_SESSION);

$col = $app->layout->add(['Columns', 'divided']);
$col_reload = new \atk4\ui\jsReload($col);


$form = $col->addColumn()->add('Form');
$form->setModel(new ToDo($s));
$form->onSubmit(function($form) use($col_reload) {
    $form->model->save();
  
    return $col_reload;
});

$grid = $col->addColumn()->add(['CRUD', 'paginator'=>false, 'ops'=>['c'=>false, 'd'=>false]]);
$grid->setModel(new ToDo($s));


$grid->menu->addItem('Complete Selected', new \atk4\ui\jsReload($grid->table, [
    'delete'=>$grid->addSelection()->jsChecked()
]));

if (isset($_GET['delete'])) {
    foreach(explode(',', $_GET['delete']) as $id) {
        $grid->model->delete($id);
    }
}
