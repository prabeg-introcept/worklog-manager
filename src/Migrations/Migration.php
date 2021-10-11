<?php

require '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Database;

class Migration {
    protected string $sqlDepartments;
    protected string $sqlUsersSql;
    protected string $sqlWorklogs;
    protected string $sqlFeedbacks;

    public function __construct()
    {
        $this->sqlDepartments = "CREATE TABLE IF NOT EXISTS departments(
            id INT AUTO_INCREMENT PRIMARY KEY,
            department_name VARCHAR(255) NOT NULL
        )";

        $this->sqlUsers = "CREATE TABLE IF NOT EXISTS users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255),
            is_admin BOOLEAN DEFAULT 0,
            department_id INT,
            FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL
        )";

        $this->sqlWorklogs = "CREATE TABLE IF NOT EXISTS worklogs(
            id INT AUTO_INCREMENT PRIMARY KEY,
            description TEXT NOT NULL,
            user_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )";

        $this->sqlFeedbacks = "CREATE TABLE IF NOT EXISTS feedbacks(
            id INT AUTO_INCREMENT PRIMARY KEY,
            feedback TEXT NOT NULL,
            worklog_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (worklog_id) REFERENCES worklogss(id) ON DELETE CASCADE
        )";
    }

    public function run() {
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
            $db->run($this->sqlDepartments);
            $db->run($this->sqlUsers);
            $db->run($this->sqlWorklogs);
            $db->run($this->sqlFeedbacks);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
        
    }
}

$migration = new Migration();
$migration->run();

