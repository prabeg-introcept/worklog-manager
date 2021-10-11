<?php

namespace App\Middlewares;

use App\Core\Session;
use App\Core\Response;
use App\Models\User;

class AuthMiddleware {
    public static function auth() {
        if(!Session::get('user_id')){
            Response::redirect('/login');
        }
    }

    public static function admin() {
        $userModel = new User();
        $user = $userModel->getUser(['id' => Session::get('user_id')]);

        if($user->is_admin !== '1'){
            Response::redirect('/main');
        }
    }
}
