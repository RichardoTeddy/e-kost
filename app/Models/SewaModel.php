<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaModel extends Model
{
    protected $table = 'sewa';
    protected $allowedFields = ['sewa_id', 'nama', 'email', 'no_hp', 'masa_berlaku', 'tanggal_awal', 'kamar_id', 'pelanggan_id', 'admin_id', 'biaya'];

    public function getTagihan($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['sewa_id' => $slug])->first();
    }
}
