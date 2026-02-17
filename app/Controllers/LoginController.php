<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PelangganModel;


class LoginController extends BaseController
{

    public function index()
    {
        return view('login/login');
    }


    public function check()
    {
        $data = ['title' => 'EuforiaHome'];

        $username = $this->request->getPost('usr');
        $password = $this->request->getPost('pwd');

        $adminModel = new AdminModel();
        $pelangganModel = new PelangganModel();

        // Check if login credentials belong to an admin
        $admin = $adminModel->where('admin_id', $username)
            ->where('password', $password)
            ->first();

        // Check if login credentials belong to a pelanggan
        $pelanggan = $pelangganModel->where('pelanggan_id', $username)
            ->where('password', $password)
            ->first();

        if ($admin) {
            // Login as admin
            $session = session();
            $session->set('admin', $username);
            $session->set('is_admin', true);

            return redirect()->to('/');
        } elseif ($pelanggan) {
            // Login as pelanggan
            $session = session();
            $session->set('user', $username);
            $session->set('is_admin', false);

            return redirect()->to('/');
        } else {
            return view('login/login');
        }
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
