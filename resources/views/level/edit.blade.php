@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h4>Edit Level</h4>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('level.update', $level->level_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="level_kode">Kode Level</label>
            <input type="text" name="level_kode" id="level_kode" 
                   class="form-control @error('level_kode') is-invalid @enderror"
                   value="{{ old('level_kode', $level->level_kode) }}" required>

            @error('level_kode')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="level_nama">Nama Level</label>
            <input type="text" name="level_nama" id="level_nama" 
                   class="form-control @error('level_nama') is-invalid @enderror"
                   value="{{ old('level_nama', $level->level_nama) }}" required>

            @error('level_nama')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('level.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
