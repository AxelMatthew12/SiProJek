@extends('homelayouts.template')

@section('content')
<div>
    <br>
    <br>
    <br>
    <br>
</div>
<div class="container py-5">
    <h1 class="mb-4 text-center"> Penawaran ke Project</h1>

    <div class="card shadow">
        <div class="card-body">
            <h4>{{ $project->judul_project }}</h4>
            <form action="{{ route('project.apply.store', $project->project_id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="penawaran_harga" class="form-label">Penawaran Harga (Rp)</label>
                    <input type="number" name="penawaran_harga" id="penawaran_harga" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="penawaran_deskripsi" class="form-label">Deskripsi Penawaran</label>
                    <textarea name="penawaran_deskripsi" id="penawaran_deskripsi" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    Kirim Penawaran
                </button>
        
            </form>
        </div>
    </div>
</div>
@endsection
