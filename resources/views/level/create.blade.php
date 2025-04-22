@extends('layouts.template')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Level Baru</h2>

    <form action="{{ route('level.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="level_kode">Kode Level</label>
            <input type="text" name="level_kode" id="level_kode"
                class="form-control @error('level_kode') is-invalid @enderror"
                value="{{ old('level_kode') }}" required>
            @error('level_kode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="level_nama">Nama Level</label>
            <input type="text" name="level_nama" id="level_nama"
                class="form-control @error('level_nama') is-invalid @enderror"
                value="{{ old('level_nama') }}" required>
            @error('level_nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="{{ route('level.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
