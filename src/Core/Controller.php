<?php

namespace App\Core;

abstract class Controller {
    protected array $viewData = [
        'error' => [],
        'input' => []
    ];
    
    public function view(string $viewFile, array $viewData = []){
        extract($viewData);

        return require "../src/Views/$viewFile.view.php";
    }
}
