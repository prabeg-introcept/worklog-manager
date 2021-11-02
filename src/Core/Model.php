<?php

namespace App\Core;

use App\Core\Application;
use App\Core\Database;
use Dotenv\Dotenv;

abstract class Model {
    protected Database $db;

    protected int $totalRecords;
    protected int $offset = 0;
    protected int $limit = 5;

    public function __construct()
    {
        //$this->db = Application::$app->database;

        $dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
        $dotenv->load();

        $config = [
            'db' => [
                'dsn'=> $_ENV['DB_DSN'],
                'username'=> $_ENV['DB_USERNAME'],
                'password'=> $_ENV['DB_PASSWORD'],
            ]
        ];

        $this->db = new Database($config['db']);
    }

    public function setTotalRecords($sql) {
        $statement = $this->db->run($sql);
        $this->totalRecords = $statement->fetchColumn();
    }

    public function getCurrentPage() {
        return isset($_GET['page']) ? filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) : 1;
    }

    public function getPaginationNumber() {
        return ceil($this->totalRecords / $this->limit);
    }
}
