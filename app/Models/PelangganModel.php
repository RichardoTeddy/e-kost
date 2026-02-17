<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table = 'pelanggan';
    protected $allowedFields = ['pelanggan_id', 'nama', 'alamat', 'no_hp', 'password'];
}
