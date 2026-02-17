<?php

namespace App\Controllers;

use App\Models\KamarModel;

class KelolaKamar extends BaseController
{
    public function input()
    {
        $model = model(KamarModel::class);
        $data = [
            'list' => $model->getKamar(),
            'title' => 'Tambah Kamar'
        ];

        $session = session();
        if ($session->has('admin')) {
            helper('form');
            // Memeriksa apakah melakukan submit data atau tidak.
            if (!$this->request->is('post')) {
                return view('layout/header', $data) . view('layout/navbarAdmin')
                    . view('kelola/input')
                    . view("layout/footer");
            }

            $nama_file = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = '/images/rooms/';

            move_uploaded_file($source, '.' . $folder . $nama_file);

            // Mengambil data yang disubmit dari form
            $post = $this->request->getPost([
                'idKamar',
                'namaKamar',
                'deskripsi',
                'fasilitas',
                'harga'
            ]);
            $post['nama_file'] = $nama_file;

            // Mengakses Model untuk menyimpan data
            $model = model(KamarModel::class);
            $model->simpan($post);
            return redirect()->to('/rooms');
        } else {
            return view('login/login');
        }
    }

    public function update()
    {
        $db = \Config\Database::connect();
        $model = model(KamarModel::class);
        $data = [
            'list' => $model->getKamar(),
            'title' => 'Ubah Kamar'
        ];
        $model = $db->table('kamar');
        $session = session();


        
        if ($session->has('admin')) {
            helper('form');

            if (!$this->request->is('post')) {
                return view('layout/header', $data)
                    . view('layout/navbarAdmin')
                    . view('kelola/update')
                    . view("layout/footer");
            }

            $nama_file = $_FILES['gambar']['name'];
            $source = $_FILES['gambar']['tmp_name'];
            $folder = '/images/rooms/';
            move_uploaded_file($source, '.' . $folder . $nama_file);

            $data = [
                'nama' => [$this->request->getPost('namaKamar'),],
                'deskripsi' => [$this->request->getPost('deskripsi'),],
                'fasilitas' => [$this->request->getPost('fasilitas'),],
                'gambar' => [$nama_file,],
                'harga' => [$this->request->getPost('harga'),]
            ];

            $model->where('kamar_id', $this->request->getPost('idKamar'));
            $model->update($data);
            return redirect()->to('/rooms');
        } else {
            return view('login/login');
        }
    }

    public function delete()
    {
        $model = model(KamarModel::class);
        $data = [
            'list' => $model->getKamar(),
            'title' => 'Hapus Kamar'
        ];
        $session = session();
        if ($session->has('admin')) {
            $db = \Config\Database::connect();
            $builder = $db->table('kamar');
            helper('form');
            if (!$this->request->is('post')) {
                return view('layout/header', $data)
                    . view('layout/navbarAdmin')
                    . view('kelola/delete')
                    . view('layout/footer');
            }
            $post = $this->request->getPost([
                'idKamar'
            ]);
            $builder->where('kamar_id', $post);
            $builder->delete();
            return redirect()->to('/rooms');
        } else {
            return view('login/login');
        }
    }
}
