<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>@yield('title', 'Sistem Informasi Project JTI Polinema')</title>
    <style>
        html { scroll-behavior: smooth; }
        .navbar {
            background-color: transparent;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .navbar.scrolled {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .navbar-nav .nav-link { color: #ffffff; transition: color 0.3s ease; }
        .navbar.scrolled .nav-link { color: #000000; }
        .section-title h2 { font-weight: bold; }
        .card-title a { text-decoration: none; color: #1c1c1c; }
        .card-title a:hover { text-decoration: underline; }
        footer { background-color: #000000; color: #fafafa; }
    </style>
</head>
<body>

    @include('homelayouts.navbar')

    @yield('content')

    <!-- Scripts langsung disatukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('.navbar').addClass('scrolled');
                } else {
                    $('.navbar').removeClass('scrolled');
                }
            });
        });
    </script>

</body>
</html>
