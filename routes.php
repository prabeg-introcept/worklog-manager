<?php

use App\Core\Router;
use App\Controllers\PagesController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\LogoutController;
use App\Controllers\WorklogController;

Router::get('/', [PagesController::class, 'index']);

Router::get('/register', [RegisterController::class, 'index']);
Router::post('/register', [RegisterController::class, 'register']);

Router::get('/login', [LoginController::class, 'index']);
Router::post('/login', [LoginController::class, 'login']);
Router::get('/logout', [LogoutController::class, 'logout']);

Router::get('/main', [WorklogController::class, 'index']);
