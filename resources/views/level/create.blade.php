@extends('layouts.template')

@section('content')
<div class="container">
    <h2>Tambah Level Baru</h2>

    <form action="{{ route('level.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_level">Kode Level</label>
            <input type="text" name="nama_level" class="form-control @error('nama_level') is-invalid @enderror" value="{{ old('nama_level') }}" required>
            @error('nama_level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama_level">Nama Level</label>
            <input type="text" name="nama_level" class="form-control @error('nama_level') is-invalid @enderror" value="{{ old('nama_level') }}" required>
            @error('nama_level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('level.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
