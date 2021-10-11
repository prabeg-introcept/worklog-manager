<?php

require '../vendor/autoload.php';

use App\Core\Database;

class CreateDepartmentsTable {
    public function run() {
        $config = require '../config.php';
        $db = new Database($config['database']);
        $sql = "CREATE TABLE IF NOT EXISTS departments(
            id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL)";
        $db->run($sql);
    }
}

$departmentsTable = new CreateDepartmentsTable();
$departmentsTable->run();

