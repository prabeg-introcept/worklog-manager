<?php

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Request;
use App\Models\User;
use App\Core\Response;
use App\Core\Session;

class LoginController extends Controller{
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {
        $this->view('login');
    }

    public function login(Request $request) {
        $this->viewData['input'] = $request->getBody();

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $user = $this->user->getUser(['username' => $this->viewData['input']['username']]);

            if($user && password_verify($this->viewData['input']['password'], $user->password)){
                Session::set('user_id', $user->id);
                Session::set('username', $user->username);
                Response::redirect('/main');
            }
    
            $this->viewData['error']['credentials'] = "Invalid Credentials. Please try again";
        }
        $this->view('login', $this->viewData);
    }
}
