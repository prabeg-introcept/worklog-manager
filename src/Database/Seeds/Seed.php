<?php

namespace App\Database\Seeds;

require '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Database;
use PDOException;

class Seed {
    protected string $sqlUsers;

    public function __construct(array $userData)
    {
        $this->sqlUsers = sprintf(
            "INSERT INTO users(%s) VALUES(%s)",
            implode(', ', array_keys($userData)),
            ':'.implode(', :', array_keys($userData))
        );

        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $config = [
            'db' => [
                'dsn'=> $_ENV['DB_DSN'],
                'username'=> $_ENV['DB_USERNAME'],
                'password'=> $_ENV['DB_PASSWORD'],
            ]
        ];
        $db = new Database($config['db']);

        try{
            $db->run($this->sqlUsers, $userData);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
}

$seed = new Seed([
    'username' => 'admin',
    'email' => 'admin@admin.co',
    'password' => password_hash('admin', PASSWORD_DEFAULT),
    'is_admin' => '1',
    'department_id' => '1'
]);
