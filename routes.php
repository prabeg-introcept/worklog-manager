<?php

use App\Core\Router;
use App\Controllers\PagesController;
use App\Controllers\RegisterController;
use App\Controllers\LoginController;

Router::get('/', [PagesController::class, 'index']);

Router::get('/register', [RegisterController::class, 'index']);
Router::post('/register', [RegisterController::class, 'register']);

Router::get('/login', [LoginController::class, 'index']);
