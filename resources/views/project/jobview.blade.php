@extends('layouts.template')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Project</h1>

    <div class="row">
        @foreach ($projects as $project)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%;">
                    <img src="https://via.placeholder.com/300x150?text=Project+Image" class="card-img-top" alt="Project Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->judul_project }}</h5>
                        <p class="card-text">
                            Kategori: {{ $project->category->kategori_nama ?? '-' }} <br>
                            Budget: Rp{{ number_format($project->bujed_min, 0, ',', '.') }} - Rp{{ number_format($project->bujed_max, 0, ',', '.') }} <br>
                            Deadline: {{ \Carbon\Carbon::parse($project->deadline)->format('d M Y') }}
                        </p>
                        <a href="{{ route('project.show', $project->project_id) }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
