@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Mahasiswa</h1>

    <div class="mb-3">
        <strong>Nama:</strong> {{ $mahasiswa->nama }}
    </div>
    <div class="mb-3">
        <strong>NRP:</strong> {{ $mahasiswa->nrp }}
    </div>
    <div class="mb-3">
        <strong>Jurusan:</strong> {{ $mahasiswa->jurusan }}
    </div>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection