<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = ['title' => 'EuforiaHome'];

        $session = session();

        if ($session->has('admin')) {
            return view('layout/header', $data) . view('layout/navbarAdmin') . view('home/home') . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser') . view('home/home') . view('layout/footer');
        } else {
            return view('layout/header', $data) . view('layout/navbarGuest') . view('home/home') . view('layout/footer');
        }
    }

    public function about()
    {
        $data = ['title' => 'About EuforiaHome'];

        $session = session();

        if ($session->has('admin')) {
            return view('layout/header', $data) . view('layout/navbarAdmin') . view('home/about') . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser') . view('home/about') . view('layout/footer');
        } else {
            return view('layout/header', $data) . view('layout/navbarGuest') . view('home/about') . view('layout/footer');
        }
    }
}
