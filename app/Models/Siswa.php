<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = [
        'nama',
        'nis',
        'jenis_kelamin',
        'alamat',
        'no_telp',
        'tanggal_lahir'
    ];
}
