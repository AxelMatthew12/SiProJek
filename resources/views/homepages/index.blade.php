@extends('homelayouts.template')

@section('content')
<div id="home" class="hero-section" style="height: 100vh; background: url('{{ asset('image/background.png') }}') no-repeat center center/cover;">
    <div class="d-flex justify-content-center align-items-center h-100">
        <h1 class="text-white font-weight-bold">SISTEM INFORMASI PROJECT JTI</h1>
    </div>
</div>

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
                        <b>Catatan:</b> Website ini adalah bentuk dari pelaksaan uts web lanjut dengan source project berdasarkan jobsheet yang tertera
                        dan juga project pembuat dari semester sebelumnya . 
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
