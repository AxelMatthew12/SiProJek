@extends('homelayouts.template')

@section('content')
<div class="container py-5">
    <h1 class="mb-5 text-center fw-bold">Daftar Project</h1>

    <div class="row justify-content-center">
        @foreach ($projects as $project)
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-4">
                <div class="card shadow w-100">
                    <img src="{{ $project->foto_project ? asset('storage/' . $project->foto_project) : 'https://via.placeholder.com/300x150?text=Project+Image' }}"
                        class="card-img-top" alt="Project Image" style="height: 180px; object-fit: cover;">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $project->judul_project }}</h5>
                        <p class="card-text flex-grow-1">
                            Kategori: {{ $project->category->kategori_nama ?? '-' }}<br>
                            Budget: Rp{{ number_format($project->bujed_min, 0, ',', '.') }} - Rp{{ number_format($project->bujed_max, 0, ',', '.') }}<br>
                            Deadline: {{ \Carbon\Carbon::parse($project->deadline)->format('d M Y') }}
                        </p>

                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('project.show', $project->project_id) }}" class="btn btn-primary btn-sm rounded-pill">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </a>
                            <a href="{{ route('project.edit', $project->project_id) }}" class="btn btn-warning btn-sm rounded-pill">
                                <i class="bi bi-pencil-square"></i> Apply
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="deleteModal{{ $project->project_id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah kamu yakin ingin menghapus project "<strong>{{ $project->judul_project }}</strong>"?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('project.destroy', $project->project_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
