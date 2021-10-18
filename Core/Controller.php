<?php

namespace App\Core;

abstract class Controller {
    public function view(string $viewFile, array $viewData = []){
        extract($viewData);

        return require "../Views/$viewFile.view.php";
    }
}
