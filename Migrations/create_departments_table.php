<?php

require '../vendor/autoload.php';

use App\Migrations\BaseMigration;

class CreateDepartmentsTable extends BaseMigration{
    public function run() {
        $sql = "CREATE TABLE IF NOT EXISTS departments(
            id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL)";
        $this->db->run($sql);
    }
}

$departmentsTable = new CreateDepartmentsTable();
$departmentsTable->run();
