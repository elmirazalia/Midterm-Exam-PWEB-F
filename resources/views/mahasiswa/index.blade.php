@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Mahasiswa</h1>

    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('mahasiswa.index') }}" method="GET" class="mb-3 d-flex align-items-center">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari mahasiswa..." value="{{ request('search') }}">
        
        <select name="sort_by" class="form-select me-2">
            <option value="nama" {{ request('sort_by') == 'nama' ? 'selected' : '' }}>Sortir berdasarkan Nama</option>
            <option value="nrp" {{ request('sort_by') == 'nrp' ? 'selected' : '' }}>Sortir berdasarkan NRP</option>
            <option value="jurusan" {{ request('sort_by') == 'jurusan' ? 'selected' : '' }}>Sortir berdasarkan Jurusan</option>
        </select>
        
        <button type="submit" class="btn btn-primary">Cari & Sortir</button>
    </form>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NRP</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $key => $mahasiswa)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->nrp }}</td>
                    <td>{{ $mahasiswa->jurusan }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
