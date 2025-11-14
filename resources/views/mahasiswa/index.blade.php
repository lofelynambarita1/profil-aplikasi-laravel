<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Data Mahasiswa</h1>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mhs)
                <tr>
                    <td>
                        @if($mhs->foto)
                            <img src="{{ asset('storage/' . $mhs->foto) }}" width="50">
                        @endif
                    </td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama_lengkap }}</td>
                    <td>{{ $mhs->program_studi }}</td>
                    <td>{{ $mhs->kelas }}</td>
                    <td>{{ $mhs->status }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.show', $mhs) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('mahasiswa.edit', $mhs) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mhs) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>