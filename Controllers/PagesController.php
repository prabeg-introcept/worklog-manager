<?php

namespace App\Controllers;

use App\Core\Controller;

class PagesController extends Controller{
    public function index() {
        $viewData = [
            'title' => 'Home Page'
        ];
        $this->view('index', $viewData);
    }
}
