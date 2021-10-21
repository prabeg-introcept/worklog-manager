<?php

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Request;
use App\Models\User;
use App\Core\Response;
use App\Core\Session;

class LoginController extends Controller{
    protected User $user;

    protected array $viewData = [
        'error' => []
    ];

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {
        $this->view('login');
    }

    public function login(Request $request) {
        $credentials = $request->getBody();

        $user = $this->user->getUser(['username' => $credentials['username']]);


        if($user && password_verify($credentials['password'], $user->password)){
            Session::set('user_id', $user->id);
            Session::set('username', $user->username);
            Response::redirect('/main');
        }

        $this->viewData['error'] = "Invalid Credentials. Please try again";

        $this->view('login', $this->viewData);
    }
}
