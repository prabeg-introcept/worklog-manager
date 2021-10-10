<?php

namespace App\Core;

use App\Core\Request;
use App\Core\Router;
use App\Core\Database;
use Exception;

class Application {
    public static Application $app;
    protected Request $request;
    protected Router $router;
    public Database $database;

    public function __construct($dbConfig)
    {
        self::$app = $this;
        $this->database = new Database($dbConfig);
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run() {
        try{
            echo $this->router->resolve();
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    }
}