<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'username',
        'email_akademik',
        'nama_lengkap',
        'program_studi',
        'kelas',
        'wali_mahasiswa',
        'jalur_usm',
        'tanggal_masuk',
        'angkatan',
        'status',
        'foto'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
    ];
}