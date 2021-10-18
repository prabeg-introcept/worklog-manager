<?php

require '../vendor/autoload.php';

use App\Core\Database;
use App\Migrations\BaseMigration;

class CreateUsersTable extends BaseMigration{
    public function run() {
        $sql = "CREATE TABLE IF NOT EXISTS users(
            id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255),
            is_admin BOOLEAN DEFAULT 0,
            department_id INT,
            FOREIGN KEY (department_id) REFERENCES departments(id)
            )";
        $this->db->run($sql);
    }
}

$usersTable = new CreateUsersTable();
$usersTable->run();
