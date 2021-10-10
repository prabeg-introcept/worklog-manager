<?php

namespace App\Core;

abstract class Controller {
    public function view($viewFile, $data = []){
        extract($data);

        return require "../Views/$viewFile.view.php";
    }
}