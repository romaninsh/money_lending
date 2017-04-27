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

    public $title = 'Money Lending App 0.2';

    public $db;

    function __construct($where = 'inside') {
        parent::__construct();

        if (isset($_ENV['CLEARDB_DATABASE_URL'])) {
            // we are on Heroku
            preg_match('|([a-z]+)://([^:]*)(:(.*))?@([A-Za-z0-9\.-]*)(/([0-9a-zA-Z_/\.]*))|',
                $_ENV['CLEARDB_DATABASE_URL'],$matches);

            $dsn=array(
                $matches[1].':host='.$matches[5].';dbname='.$matches[7],
                $matches[2],
                $matches[4]
            );
            $this->db = new \atk4\data\Persistence_SQL($dsn[0], $dsn[1], $dsn[2]);
        } else {
            // Not on Heroku
            $this->db = new \atk4\data\Persistence_SQL('mysql:host=127.0.0.1;dbname=money_lending', 'root', 'root');
        }

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



