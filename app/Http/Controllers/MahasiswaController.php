<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('nim', 'desc')->paginate(10);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas|max:50',
            'username' => 'required|unique:mahasiswas|max:100',
            'email_akademik' => 'required|email|unique:mahasiswas|max:150',
            'nama_lengkap' => 'required|max:200',
            'program_studi' => 'required|max:100',
            'kelas' => 'required|max:50',
            'wali_mahasiswa' => 'nullable|max:200',
            'jalur_usm' => 'nullable|max:50',
            'tanggal_masuk' => 'required|date',
            'angkatan' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'status' => 'required|in:Aktif,Tidak Aktif,Lulus,Cuti,DO,Mengundurkan Diri',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('mahasiswa', 'public');
        }

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => 'required|max:50|unique:mahasiswas,nim,' . $mahasiswa->id,
            'username' => 'required|max:100|unique:mahasiswas,username,' . $mahasiswa->id,
            'email_akademik' => 'required|email|max:150|unique:mahasiswas,email_akademik,' . $mahasiswa->id,
            'nama_lengkap' => 'required|max:200',
            'program_studi' => 'required|max:100',
            'kelas' => 'required|max:50',
            'wali_mahasiswa' => 'nullable|max:200',
            'jalur_usm' => 'nullable|max:50',
            'tanggal_masuk' => 'required|date',
            'angkatan' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'status' => 'required|in:Aktif,Tidak Aktif,Lulus,Cuti,DO,Mengundurkan Diri',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->foto) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }
            $validated['foto'] = $request->file('foto')->store('mahasiswa', 'public');
        }

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diupdate!');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        // Hapus foto jika ada
        if ($mahasiswa->foto) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}