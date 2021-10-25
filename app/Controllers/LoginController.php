<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        if (session()->logged_in)
	    {
	        return redirect()->to(base_url('/ticket'));
	    }
        return view('auth/login');
    }
    public function login()
    {
        $users = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $datauser = $users->where([
            'username' => $username,
        ])->first();
        if($datauser){
            if (password_verify($password, $datauser->password)) {
                session()->set([
                    'username' => $datauser->username,
                    'logged_in' => TRUE,
                    'role_id' => $datauser->role_id
                ]);
                return redirect()->to(base_url('ticket'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        }else{
            session()->setFlashdata('error', 'User Tidak ada');
            return redirect()->back();
        }
    }

    public function indexregister()
    {
        return view('auth/register');
    }

    public function register()
    {
        $users = new UserModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ]);
        return redirect()->to('/login');
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
