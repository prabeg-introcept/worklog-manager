<?php

namespace App\Core;

use App\Core\Database;
use App\Core\Application;

abstract class Model {
    protected Database $db;

    protected int $totalRecords;
    protected int $offset = 0;
    protected int $limit = 5;

    public function __construct()
    {
        $this->db = Application::$app->database;
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
