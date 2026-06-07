<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'departemen',
        'email',
        'no_telepon',
        'tanggal_masuk',
        'status',
        'gaji',
        'alamat',
        'foto'
    ];
}