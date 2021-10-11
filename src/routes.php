<?php

use App\Core\Router;
use App\Controllers\PagesController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\LogoutController;
use App\Controllers\WorklogController;
use App\Controllers\AdminController;

Router::get('/', [PagesController::class, 'index']);

Router::get('/register', [RegisterController::class, 'index']);
Router::post('/register', [RegisterController::class, 'register']);
Router::get('/login', [LoginController::class, 'index']);
Router::post('/login', [LoginController::class, 'login']);
Router::get('/logout', [LogoutController::class, 'logout']);

Router::get('/main', [WorklogController::class, 'index']);
Router::get('/worklogs', [WorklogController::class, 'getWorklogForm']);
Router::post('/worklogs', [WorklogController::class, 'store']);
Router::get('/worklogs/'.$id, [WorklogController::class, 'show']);
Router::put('/worklogs/'.$id, [WorklogController::class, 'update']);
Router::delete('/worklogs/'.$id, [WorklogController::class, 'destroy']);

Router::get('/admin-dashboard', [AdminController::class, 'index']);
Router::get('/worklog-feedback/'.$id, [AdminController::class, 'show']);
Router::post('/worklog-feedback/'.$id, [AdminController::class, 'store']);
