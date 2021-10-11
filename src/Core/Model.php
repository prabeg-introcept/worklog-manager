<?php

namespace App\Core;

use App\Core\Database;
use App\Core\Application;

abstract class Model {
    protected Database $db;

    public function __construct()
    {
        $this->db = Application::$app->database;
    }
}
