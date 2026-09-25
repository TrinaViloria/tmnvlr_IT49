<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('dashboard', [
            'title' => 'Dashboard - Puihaha Electric',
            'page' => 'dashboard',
            'userName' => session()->get('userName'),
        ]);
    }
}
