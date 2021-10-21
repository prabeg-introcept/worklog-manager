<?php

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\User;

class RegisterController extends Controller {
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {
        $this->view('register');
    }

    public function register(Request $request) {
        $validationMsg = [
            'confirmPassword' => 'Please re-enter password for confirmation'
        ];

        $userData = $request->getBody();

        $this->viewData['input'] = $userData;

        foreach($this->viewData['input'] as $key => $value){
            if(empty($value)){
                $this->viewData['error'][$key] = array_key_exists($key, $validationMsg) ? 
                $validationMsg[$key] : 
                "Please enter $key.";
            }
        }

        if(empty(array_values($this->viewData['error']))){
            $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT); 

            $this->user->createUser($userData);
            
            Response::redirect('/');
        }

        $this->view('register', $this->viewData);
    }
}
