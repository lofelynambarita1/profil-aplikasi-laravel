<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa - {{ $mahasiswa->nama_lengkap }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
        }
        .profile-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .info-card {
            border-left: 4px solid #667eea;
        }
        .tab-content {
            padding: 2rem 0;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Header Profil -->
    <div class="profile-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="{{ $mahasiswa->foto_url }}" 
                         alt="{{ $mahasiswa->nama_lengkap }}" 
                         class="rounded-circle profile-photo">
                </div>
                <div class="col-md-9">
                    <h2 class="mb-2">{{ $mahasiswa->nim }} {{ $mahasiswa->nama_lengkap }}</h2>
                    <p class="mb-1">
                        <i class="bi bi-building"></i> {{ $mahasiswa->program_studi }} - Kelas {{ $mahasiswa->kelas }}
                    </p>
                    <p class="mb-0">
                        <span class="badge bg-{{ $mahasiswa->status_color }}">{{ $mahasiswa->status }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit Data
                </a>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs" id="profileTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="akademis-tab" data-bs-toggle="tab" data-bs-target="#akademis" type="button">
                    <i class="bi bi-mortarboard"></i> Data Akademis
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pribadi-tab" data-bs-toggle="tab" data-bs-target="#pribadi" type="button">
                    <i class="bi bi-person"></i> Data Pribadi
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="orang-tua-tab" data-bs-toggle="tab" data-bs-target="#orang-tua" type="button">
                    <i class="bi bi-people"></i> Data Orang Tua
                </button>
            </li>
        </ul>

        <div class="tab-content" id="profileTabContent">
            <!-- Tab Data Akademis -->
            <div class="tab-pane fade show active" id="akademis">
                <div class="card info-card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Informasi Akademis</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th width="40%">NIM</th>
                                        <td>: {{ $mahasiswa->nim }}</td>
                                    </tr>
                                    <tr>
                                        <th>User Name</th>
                                        <td>: {{ $mahasiswa->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Akademik</th>
                                        <td>: {{ $mahasiswa->email_akademik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Program Studi</th>
                                        <td>: {{ $mahasiswa->program_studi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>: {{ $mahasiswa->kelas }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <th width="40%">Wali Mahasiswa</th>
                                        <td>: {{ $mahasiswa->wali_mahasiswa ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jalur USM</th>
                                        <td>: {{ $mahasiswa->jalur_usm ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Akhir</th>
                                        <td>: <span class="badge bg-{{ $mahasiswa->status_color }}">{{ $mahasiswa->status }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Angkatan</th>
                                        <td>: {{ $mahasiswa->angkatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Masuk</th>
                                        <td>: {{ $mahasiswa->tanggal_masuk_formatted }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Data Pribadi (Placeholder) -->
            <div class="tab-pane fade" id="pribadi">
                <div class="card info-card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Data Pribadi</h5>
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Tab ini dapat diisi dengan data pribadi mahasiswa seperti alamat, nomor telepon, dll.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Data Orang Tua (Placeholder) -->
            <div class="tab-pane fade" id="orang-tua">
                <div class="card info-card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Data Orang Tua</h5>
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Tab ini dapat diisi dengan data orang tua/wali mahasiswa.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="card mt-4 mb-4">
            <div class="card-body">
                <h6 class="text-muted">Informasi Update</h6>
                <small class="text-muted">
                    Dibuat: {{ $mahasiswa->created_at->format('d F Y H:i') }} | 
                    Terakhir diupdate: {{ $mahasiswa->updated_at->format('d F Y H:i') }}
                </small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>