<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 50)->unique()->comment('Nomor Induk Mahasiswa');
            $table->string('username', 100)->unique()->comment('Username untuk login');
            $table->string('email_akademik', 150)->unique()->comment('Email akademik mahasiswa');
            $table->string('nama_lengkap', 200)->comment('Nama lengkap mahasiswa');
            $table->string('program_studi', 100)->comment('Program studi');
            $table->string('kelas', 50)->comment('Kelas mahasiswa');
            $table->string('wali_mahasiswa', 200)->nullable()->comment('Nama dosen wali');
            $table->string('jalur_usm', 50)->nullable()->comment('Jalur masuk');
            $table->date('tanggal_masuk')->comment('Tanggal masuk/inagurasi');
            $table->year('angkatan')->comment('Tahun angkatan');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Lulus', 'Cuti', 'DO', 'Mengundurkan Diri'])
                  ->default('Aktif')
                  ->comment('Status mahasiswa');
            $table->string('foto', 255)->nullable()->comment('Path file foto mahasiswa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};