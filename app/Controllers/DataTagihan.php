<?php

namespace App\Controllers;

use App\Models\SewaModel;

class DataTagihan extends BaseController
{

    public function tagihan($slug = null)
    {
        $session = session();
        $model = model(SewaModel::class);
        $data = [
            'list' => $model->getTagihan(),
            'title' => 'EuforiaHome - Rooms List View'
        ];

        if ($session->has('admin')) {
            return view('layout/header', $data) . view('layout/navbarAdmin')
                . view('dataTagihan/tagihan') . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser')
                . view('dataTagihan/tagihan') . view('layout/footer');
        } else {
            return view('login/login');
        }
    }

    public function tagihanUser($slug = null)
    {
        $session = session();
        $model = model(SewaModel::class);

        $data = ['title' => 'EuforiaHome - Booking Form'];
        $data['sewa_id'] = $model->getTagihan($slug);

        if ($session->has('admin')) {
            return view('layout/header', $data) . view('layout/navbarAdmin')
                . view('dataTagihan/tagihan') . view('layout/footer');
        }
        if ($session->has('user')) {
            return view('layout/header', $data) . view('layout/navbarUser')
                . view('dataTagihan/tagihanUser') . view('layout/footer');
        } else {
            return view('login/login');
        }
    }
}
