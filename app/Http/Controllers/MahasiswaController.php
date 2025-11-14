<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'username' => 'required|unique:mahasiswas',
            'email_akademik' => 'required|email|unique:mahasiswas',
            'nama_lengkap' => 'required',
            'program_studi' => 'required',
            'kelas' => 'required',
            'tanggal_masuk' => 'required|date',
            'angkatan' => 'required|integer',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('mahasiswa', 'public');
        }

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan');
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
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'username' => 'required|unique:mahasiswas,username,' . $mahasiswa->id,
            'email_akademik' => 'required|email|unique:mahasiswas,email_akademik,' . $mahasiswa->id,
            'nama_lengkap' => 'required',
            'program_studi' => 'required',
            'kelas' => 'required',
            'tanggal_masuk' => 'required|date',
            'angkatan' => 'required|integer',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('mahasiswa', 'public');
        }

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }
}