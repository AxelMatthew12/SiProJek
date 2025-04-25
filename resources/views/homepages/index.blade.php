@extends('homelayouts.template')

@section('content')
{{-- Hero Section --}}
<div id="home" class="hero-section" style="height: 100vh; background: url('{{ asset('image/background.png') }}') no-repeat center center/cover;">
    <div class="d-flex justify-content-center align-items-center h-100">
        <h1 class="text-white font-weight-bold">SISTEM INFORMASI PROJECT JTI</h1>
    </div>
</div>

{{-- Informasi Section --}}
<div id="informasi" class="container mt-5">
    <h1 class="text-center mb-4">INFORMASI WEBSITE</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center shadow-sm p-3 mb-4">
                <div class="card-body">
                    <i class="fas fa-headset fa-3x mb-3"></i>
                    <p class="card-text">
                        <b class="text-primary">INFORMASI</b> <br>
                        Anda memasuki website sistem informasi project JTI Polinema... <br>
                        <b>Catatan:</b> Website ini adalah bentuk dari pelaksanaan UTS Web Lanjut dengan source project berdasarkan jobsheet yang tertera
                        dan juga project pembuat dari semester sebelumnya.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Daftar Project Section --}}
<div class="container py-5">
    <h1 class="mb-5 text-center fw-bold">Daftar Project</h1>

    <div class="row justify-content-center">
        @isset($projects)
            @forelse ($projects as $project)
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-4">
                    <div class="card bg-white shadow w-100">
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
                                <a href="#" class="btn btn-primary btn-sm rounded-pill">
                                    <i class="bi bi-eye"></i> Lihat Detail
                                </a>
                                <a href="{{ route('project.apply', $project->project_id) }}" class="btn btn-success btn-sm rounded-pill">
                                    <i class="bi bi-send"></i> Apply
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada project yang tersedia.</p>
                </div>
            @endforelse
        @else
            <div class="col-12 text-center">
                <p class="text-danger">Data project belum dimuat.</p>
            </div>
        @endisset
    </div>
</div>
@endsection
