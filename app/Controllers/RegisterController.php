<?php

namespace App\Controllers;



class RegisterController extends BaseController
{

    public function index()
    {
        $data = ['title' => 'EuforiaHome|Register'];
        return view('layout/header', $data)
            . view('layout/navbarGuest') . view('register/register') . view('layout/footer');
    }


    public function logout()
    {
        $session = session();
        if ($session->get('is_admin')) {
            $session->remove('admin');
            return view('login/login');
        } else {
            $session->remove('user');
            return view('login/login');
        }
    }
}
