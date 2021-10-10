<?php

namespace App\Controllers;

use App\Core\Controller;

class PagesController extends Controller{
    public function index() {
        $data = [
            'title' => 'Home Page'
        ];
        return $this->view('index', $data);
    }
}