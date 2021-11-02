<?php

namespace App\Core;

use App\Core\Request;
use App\Core\Router;
use App\Core\Database;
use App\Core\Session;
use Exception;

class Application {
    public static Application $app;
    protected Request $request;
    protected Router $router;
    public Database $database;

    public function __construct()
    {
        Session::init();
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
