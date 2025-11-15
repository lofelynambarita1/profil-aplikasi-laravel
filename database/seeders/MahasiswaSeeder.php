<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswas = [
            [
                'nim' => '11S23045',
                'username' => 'ifs23045',
                'email_akademik' => 'ifs23045@students.del.ac.id',
                'nama_lengkap' => 'Lofelyn Enzely Ambarita',
                'program_studi' => 'S1 Informatika',
                'kelas' => '13IF2',
                'wali_mahasiswa' => 'Dr. Johannes Harungguan Sianipar, S.T., M.T.',
                'jalur_usm' => 'USM 1',
                'tanggal_masuk' => '1970-01-01',
                'angkatan' => 2023,
                'status' => 'Aktif',
                'foto' => null,
            ],
            // ... data lainnya
        ];

        foreach ($mahasiswas as $mahasiswa) {
            Mahasiswa::create($mahasiswa);
        }
    }
}