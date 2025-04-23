@extends('layouts.template')

@section('title', 'Edit Project')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Project</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('project.update', $project->project_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="judul_project">Judul Project</label>
            <input type="text" name="judul_project" class="form-control" value="{{ old('judul_project', $project->judul_project) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $project->deskripsi) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->kategori_id }}" {{ $project->kategori_id == $cat->kategori_id ? 'selected' : '' }}>
                        {{ $cat->kategori_nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="bujed_min">Budget Minimum</label>
            <input type="number" name="bujed_min" class="form-control" value="{{ old('bujed_min', $project->bujed_min) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="bujed_max">Budget Maksimum</label>
            <input type="number" name="bujed_max" class="form-control" value="{{ old('bujed_max', $project->bujed_max) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_posting">Tanggal Posting</label>
            <input type="date" name="tanggal_posting" class="form-control" value="{{ old('tanggal_posting', $project->tanggal_posting) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" class="form-control" value="{{ old('deadline', $project->deadline) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('project.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
