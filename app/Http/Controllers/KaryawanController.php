<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::latest()->paginate(10);
        return view('karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:100',
            'nip'           => 'required|unique:karyawans',
            'jabatan'       => 'required',
            'departemen'    => 'required',
            'email'         => 'required|email|unique:karyawans',
            'no_telepon'    => 'required',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|in:aktif,nonaktif',
            'gaji'          => 'nullable|numeric',
            'alamat'        => 'nullable|string',
            'foto'          => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto-karyawan', 'public');
        }

        Karyawan::create($validated);
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:100',
            'nip'           => 'required|unique:karyawans,nip,'.$karyawan->id,
            'jabatan'       => 'required',
            'departemen'    => 'required',
            'email'         => 'required|email|unique:karyawans,email,'.$karyawan->id,
            'no_telepon'    => 'required',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|in:aktif,nonaktif',
            'gaji'          => 'nullable|numeric',
            'alamat'        => 'nullable|string',
            'foto'          => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($karyawan->foto) Storage::disk('public')->delete($karyawan->foto);
            $validated['foto'] = $request->file('foto')->store('foto-karyawan', 'public');
        }

        $karyawan->update($validated);
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diupdate!');
    }

    public function destroy(Karyawan $karyawan)
    {
        if ($karyawan->foto) Storage::disk('public')->delete($karyawan->foto);
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus!');
    }
}