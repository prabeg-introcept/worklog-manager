<?php

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;

class LogoutController extends Controller{
    public function logout(Request $request) {
        Session::remove();
        
        Response::redirect('/login');
    }
}
