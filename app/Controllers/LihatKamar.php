<?php

namespace App\Controllers;

class LihatKamar extends BaseController
{
    public function showAll()
    {
        $session = session();

        $model = model(KamarModel::class);
        $data = [
            'list' => $model->getKamar(),
            'title' => 'EuforiaHome - Rooms List View'
        ];
        if ($session->has('admin')) {
            return view('layout/header', $data)
                . view('layout/navbarAdmin')
                . view('home/rooms')
                . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data)
                . view('layout/navbarUser')
                . view('home/rooms')
                . view('layout/footer');
        } else {
            return view('layout/header', $data) . view('layout/navbarGuest') . view('home/rooms') . view('layout/footer');
        }
    }
    public function search()
    {
        $session = session();
        if (!$this->request->is('post')) {
            return view('home/rooms');
        }
        $id = $this->request->getPost(['key']);

        $model = model(KamarModel::class);
        $kamar = $model->ambil($id['key']);

        $data = ['hasil' => $kamar, 'title' => 'Cari Kamar'];
        if ($session->has('admin')) {
            return view('layout/header', $data)
                . view('layout/navbarAdmin')
                . view('home/search')
                . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data)
                . view('layout/navbarUser')
                . view('home/search')
                . view('layout/footer');
        } else {
            return view('layout/header', $data)
                . view('layout/navbarGuest')
                . view('home/search')
                . view('layout/footer');
        }
    }
}
