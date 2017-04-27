<?php
require'vendor/autoload.php';

class User extends \atk4\data\Model {
    public $table = 'user';

    function init()
    {
        parent::init();

        $this->addFields([
            'email',
            ['password', 'type'=>'password'],
            'name',
            'surname'
        ]);

    }
}

class MyApp extends \atk4\ui\App {

    public $title = 'Money Lending App 0.1';

    public $db;

    function __construct($where = 'inside') {
        parent::__construct();

        $this->db = new \atk4\data\Persistence_SQL('mysql:host=127.0.0.1;dbname=money_lending', 'root', 'root');

        if ($where == 'login') {
            $this->initLayout('Centered');
            return;
        }

        $this->initLayout('Admin');

        $this->layout->leftMenu->addItem(['Contacts', 'icon'=>'users'], 'contact.php');
        $this->layout->leftMenu->addItem(['Loans', 'icon'=>'money'], 'loan.php');
        $this->layout->leftMenu->addItem(['Admin', 'icon'=>'lock'], 'admin.php');
    }
}



