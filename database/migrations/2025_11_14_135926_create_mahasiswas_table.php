<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 50)->unique()->comment('Nomor Induk Mahasiswa');
            $table->string('username', 100)->unique()->comment('Username untuk login');
            $table->string('email_akademik', 150)->unique()->comment('Email akademik mahasiswa');
            $table->string('nama_lengkap', 200)->comment('Nama lengkap mahasiswa');
            $table->string('program_studi', 100)->comment('Program studi (contoh: S1 Informatika)');
            $table->string('kelas', 50)->comment('Kelas mahasiswa');
            $table->string('wali_mahasiswa', 200)->nullable()->comment('Nama dosen wali');
            $table->string('jalur_usm', 50)->nullable()->comment('Jalur masuk (USM 1, USM 2, dll)');
            $table->date('tanggal_masuk')->comment('Tanggal mulai kuliah');
            $table->year('angkatan')->comment('Tahun angkatan');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Lulus', 'Cuti'])->default('Aktif')->comment('Status mahasiswa');
            $table->string('foto', 255)->nullable()->comment('Path file foto mahasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};