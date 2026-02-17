<?php

namespace App\Controllers;

use App\Models\KamarModel;

class Pemesanan extends BaseController
{

    public function booking($slug = null)
    {
        $session = session();
        $data = ['title' => 'EuforiaHome - Booking Form'];
        $model = model(KamarModel::class);

        $data['kamar'] = $model->getKamar($slug);
        if ($session->has('admin')) {
            return view('layout/header', $data) . view('layout/navbarAdmin')
                . view('pemesanan/booking') . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser')
                . view('pemesanan/booking') . view('layout/footer');
        } else {
            return view('login/login');
        }
    }
}
