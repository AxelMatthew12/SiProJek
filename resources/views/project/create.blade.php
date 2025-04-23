@extends('layouts.template')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Project Baru</h2>

    <form action="{{ route('project.store') }}" method="POST">
        @csrf

        <!-- Hidden Field untuk user_id -->
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <div class="form-group mb-3">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id"
                class="form-control @error('kategori_id') is-invalid @enderror" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($category as $item)
                    <option value="{{ $item->kategori_id }}"
                        {{ old('kategori_id') == $item->kategori_id ? 'selected' : '' }}>
                        {{ $item->kategori_nama }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="judul_project">Judul Project</label>
            <input type="text" name="judul_project" id="judul_project"
                class="form-control @error('judul_project') is-invalid @enderror"
                value="{{ old('judul_project') }}" required>
            @error('judul_project')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi"
                class="form-control @error('deskripsi') is-invalid @enderror"
                required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="bujed_min">Budget Minimum</label>
            <input type="number" name="bujed_min" id="bujed_min"
                class="form-control @error('bujed_min') is-invalid @enderror"
                value="{{ old('bujed_min') }}" required>
            @error('bujed_min')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="bujed_max">Budget Maksimum</label>
            <input type="number" name="bujed_max" id="bujed_max"
                class="form-control @error('bujed_max') is-invalid @enderror"
                value="{{ old('bujed_max') }}" required>
            @error('bujed_max')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_posting">Tanggal Posting</label>
            <input type="datetime-local" name="tanggal_posting" id="tanggal_posting"
                class="form-control @error('tanggal_posting') is-invalid @enderror"
                value="{{ old('tanggal_posting') }}" required>
            @error('tanggal_posting')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="deadline">Deadline</label>
            <input type="datetime-local" name="deadline" id="deadline"
                class="form-control @error('deadline') is-invalid @enderror"
                value="{{ old('deadline') }}" required>
            @error('deadline')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan
        </button>
        <a href="{{ route('project.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </form>
</div>
@endsection
