<?php

namespace App\Controllers;

use App\Core\Controller;

class WorklogController extends Controller {
    public function index() {
        $this->view('index');
    }
}