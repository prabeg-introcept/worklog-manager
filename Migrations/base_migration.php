<?php 

namespace App\Migrations;

use App\Core\Database;
use Dotenv\Dotenv;

abstract class BaseMigration {
    protected Database $db;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $config = [
            'db' => [
                'dsn'=> $_ENV['DB_DSN'],
                'username'=> $_ENV['DB_USERNAME'],
                'password'=> $_ENV['DB_PASSWORD'],
            ]
        ];
        
        $this->db = new Database($config(['db']));
    }
}
