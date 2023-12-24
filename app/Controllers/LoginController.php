<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class LoginController extends BaseController
{
    protected $helpers = ['form', 'url'];
    public function index()
    {
        return view('login');
    }

    public function login(){
        $userModel = new UserModel();
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if($data){
            $dbpass = $data['password'];
            $authenticatePassword = password_verify($password, $dbpass);
            if($authenticatePassword){

                $user_data =[
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($user_data);
                return redirect()->to('/');
            
            }else{
                $session->setFlashdata('message', 'Password is incorrect.');
                return redirect()->to('login');
            }
        }else{
            $session->setFlashdata('message', 'Email does not exist');
            return redirect()->to('login');
            
        }
    }
    public function logout (){
        session()->destroy();
        return redirect()->to('login');
    }
}
