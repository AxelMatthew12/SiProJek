<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('image/logo.png') }}" width="50" height="50" alt="icon">
            <span class="ml-2 text-light">SISTEM INFORMASI PROJECT JTI </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#informasi">Informasi</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{url(path: '/view')}}">Job Views</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- CSS -->
<style>
    .navbar-scroll {
        background-color: black !important;
        transition: background-color 0.3s ease;
    }
</style>

<!-- JavaScript -->
<script>
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 50) {
            $('.navbar').addClass('navbar-scroll');
        } else {
            $('.navbar').removeClass('navbar-scroll');
        }
    });
</script>
