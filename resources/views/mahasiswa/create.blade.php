@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Tambah Data Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <!-- NIM -->
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('nim') is-invalid @enderror" 
                                           id="nim" 
                                           name="nim" 
                                           value="{{ old('nim') }}" 
                                           placeholder="Contoh: 11S23013"
                                           required>
                                    @error('nim')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="user_name" class="form-label">User Name <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('user_name') is-invalid @enderror" 
                                           id="user_name" 
                                           name="user_name" 
                                           value="{{ old('user_name') }}"
                                           placeholder="Contoh: ifs23013"
                                           required>
                                    @error('user_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email Akademik -->
                                <div class="mb-3">
                                    <label for="email_akademik" class="form-label">Email Akademik <span class="text-danger">*</span></label>
                                    <input type="email" 
                                           class="form-control @error('email_akademik') is-invalid @enderror" 
                                           id="email_akademik" 
                                           name="email_akademik" 
                                           value="{{ old('email_akademik') }}"
                                           placeholder="Contoh: ifs23013@students.del.ac.id"
                                           required>
                                    @error('email_akademik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Program Studi -->
                                <div class="mb-3">
                                    <label for="program_studi" class="form-label">Program Studi <span class="text-danger">*</span></label>
                                    <select class="form-select @error('program_studi') is-invalid @enderror" 
                                            id="program_studi" 
                                            name="program_studi" 
                                            required>
                                        <option value="">Pilih Program Studi</option>
                                        <option value="S1 Informatika" {{ old('program_studi') == 'S1 Informatika' ? 'selected' : '' }}>S1 Informatika</option>
                                        <option value="S1 Sistem Informasi" {{ old('program_studi') == 'S1 Sistem Informasi' ? 'selected' : '' }}>S1 Sistem Informasi</option>
                                        <option value="S1 Teknik Elektro" {{ old('program_studi') == 'S1 Teknik Elektro' ? 'selected' : '' }}>S1 Teknik Elektro</option>
                                        <option value="S1 Teknik Komputer" {{ old('program_studi') == 'S1 Teknik Komputer' ? 'selected' : '' }}>S1 Teknik Komputer</option>
                                        <option value="S1 Manajemen Rekayasa" {{ old('program_studi') == 'S1 Manajemen Rekayasa' ? 'selected' : '' }}>S1 Manajemen Rekayasa</option>
                                        <option value="D3 Teknologi Informasi" {{ old('program_studi') == 'D3 Teknologi Informasi' ? 'selected' : '' }}>D3 Teknologi Informasi</option>
                                        <option value="D3 Teknologi Komputer" {{ old('program_studi') == 'D3 Teknologi Komputer' ? 'selected' : '' }}>D3 Teknologi Komputer</option>
                                    </select>
                                    @error('program_studi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kelas -->
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('kelas') is-invalid @enderror" 
                                           id="kelas" 
                                           name="kelas" 
                                           value="{{ old('kelas') }}"
                                           placeholder="Contoh: 13IF1"
                                           required>
                                    @error('kelas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Wali Mahasiswa -->
                                <div class="mb-3">
                                    <label for="wali_mahasiswa" class="form-label">Wali Mahasiswa <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('wali_mahasiswa') is-invalid @enderror" 
                                           id="wali_mahasiswa" 
                                           name="wali_mahasiswa" 
                                           value="{{ old('wali_mahasiswa') }}"
                                           placeholder="Contoh: Herimanto, S.Kom., M.Kom"
                                           required>
                                    @error('wali_mahasiswa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jalur USM -->
                                <div class="mb-3">
                                    <label for="jalur_usm" class="form-label">Jalur USM <span class="text-danger">*</span></label>
                                    <select class="form-select @error('jalur_usm') is-invalid @enderror" 
                                            id="jalur_usm" 
                                            name="jalur_usm" 
                                            required>
                                        <option value="">Pilih Jalur USM</option>
                                        <option value="USM 1" {{ old('jalur_usm') == 'USM 1' ? 'selected' : '' }}>USM 1</option>
                                        <option value="USM 2" {{ old('jalur_usm') == 'USM 2' ? 'selected' : '' }}>USM 2</option>
                                        <option value="USM 3" {{ old('jalur_usm') == 'USM 3' ? 'selected' : '' }}>USM 3</option>
                                        <option value="PMDK" {{ old('jalur_usm') == 'PMDK' ? 'selected' : '' }}>PMDK</option>
                                        <option value="SNMPTN" {{ old('jalur_usm') == 'SNMPTN' ? 'selected' : '' }}>SNMPTN</option>
                                        <option value="SBMPTN" {{ old('jalur_usm') == 'SBMPTN' ? 'selected' : '' }}>SBMPTN</option>
                                    </select>
                                    @error('jalur_usm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status Akhir -->
                                <div class="mb-3">
                                    <label for="status_akhir" class="form-label">Status Akhir <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status_akhir') is-invalid @enderror" 
                                            id="status_akhir" 
                                            name="status_akhir" 
                                            required>
                                        <option value="">Pilih Status</option>
                                        <option value="Aktif" {{ old('status_akhir') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="Cuti" {{ old('status_akhir') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                                        <option value="Lulus" {{ old('status_akhir') == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                        <option value="DO" {{ old('status_akhir') == 'DO' ? 'selected' : '' }}>DO</option>
                                        <option value="Mengundurkan Diri" {{ old('status_akhir') == 'Mengundurkan Diri' ? 'selected' : '' }}>Mengundurkan Diri</option>
                                    </select>
                                    @error('status_akhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Angkatan -->
                                <div class="mb-3">
                                    <label for="angkatan" class="form-label">Angkatan <span class="text-danger">*</span></label>
                                    <input type="number" 
                                           class="form-control @error('angkatan') is-invalid @enderror" 
                                           id="angkatan" 
                                           name="angkatan" 
                                           value="{{ old('angkatan') }}"
                                           min="1900"
                                           max="{{ date('Y') + 1 }}"
                                           placeholder="Contoh: 2023"
                                           required>
                                    @error('angkatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Masuk / Inagurasi -->
                                <div class="mb-3">
                                    <label for="tanggal_masuk_inagurasi" class="form-label">Tanggal Masuk / Inagurasi <span class="text-danger">*</span></label>
                                    <input type="date" 
                                           class="form-control @error('tanggal_masuk_inagurasi') is-invalid @enderror" 
                                           id="tanggal_masuk_inagurasi" 
                                           name="tanggal_masuk_inagurasi" 
                                           value="{{ old('tanggal_masuk_inagurasi') }}"
                                           required>
                                    @error('tanggal_masuk_inagurasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Foto -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto Mahasiswa</label>
                                    <input type="file" 
                                           class="form-control @error('foto') is-invalid @enderror" 
                                           id="foto" 
                                           name="foto"
                                           accept="image/jpeg,image/png,image/jpg">
                                    <small class="text-muted">Format: JPG, JPEG, PNG. Max: 2MB</small>
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Preview foto sebelum upload
document.getElementById('foto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.createElement('img');
            preview.src = e.target.result;
            preview.className = 'img-thumbnail mt-2';
            preview.style.maxWidth = '200px';
            
            const container = document.getElementById('foto').parentElement;
            const oldPreview = container.querySelector('img');
            if (oldPreview) {
                oldPreview.remove();
            }
            container.appendChild(preview);
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection