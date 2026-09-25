<?php

namespace App\Controllers;

use App\Models\User;

class Login extends BaseController
{
    public function index(): string
    {
        return view('login', [
            'title' => 'Login - Puihaha Electric',
            'page' => 'login',
            'error' => session()->getFlashdata('error'),
        ]);
    }

    public function authenticate()
    {
        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        if (! filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Enter a valid email address and password.');
        }

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user === null
            || ! (bool) $user['is_active']
            || ! $userModel->verifyPassword($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'The email or password is incorrect.');
        }

        session()->regenerate(true);
        session()->set([
            'isLoggedIn' => true,
            'userId' => $user['id'],
            'userName' => $user['first_name'] . ' ' . $user['last_name'],
            'userType' => $user['user_type'],
        ]);

        return redirect()->to('http://localhost/ci4_pagination');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
