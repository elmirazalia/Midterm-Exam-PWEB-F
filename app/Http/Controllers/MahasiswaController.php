<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // show, search, sortir
    public function index(Request $request)
    {
        $query = Mahasiswa::query();

        if ($request->has('search')) {
            $query->where('nama', 'like', "%{$request->search}%")
                  ->orWhere('nrp', 'like', "%{$request->search}%");
        }

        $query->orderBy($request->input('sort_by', 'nama'));

        $mahasiswas = $query->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // form regis
    public function create()
    {
        return view('mahasiswa.create');
    }

    // save
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nrp' => 'required|unique:mahasiswas,nrp',
            'jurusan' => 'required'
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // show detail
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    // form edit
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nrp' => 'required|unique:mahasiswas,nrp,' . $id,
            'jurusan' => 'required'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diperbarui.');
    }

    // delete
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus.');
    }
}