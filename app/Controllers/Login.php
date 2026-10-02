<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index(): string
    {
        return view('login', [
            'title' => 'Login - Puihaha Electric',
            'page' => 'login',
        ]);
    }

    public function authenticate()
    {
        session()->regenerate(true);
        session()->set([
            'isLoggedIn' => true,
            'userName' => 'Guest User',
            'userType' => 'customer',
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
