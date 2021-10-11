<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;
use App\Core\Session;

class PagesController extends Controller{
    public function index() {
        empty($_SESSION) ? Response::redirect('/login') : Response::redirect('/main');
    }
}
