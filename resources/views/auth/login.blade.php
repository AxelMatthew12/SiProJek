<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">

  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #999;
      height: 100vh;
      margin: 0;
    }
    .container-login {
      display: flex;
      min-height: 100vh;
    }
    .login-img {
      background: url('{{ asset('image/login.png') }}') no-repeat center center;
      background-size: cover;
      flex: 1;
    }
    .login-form {
      background-color: #fff;
      padding: 60px 40px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .login-form h2 {
      font-weight: bold;
      margin-bottom: 40px;
    }
    .form-group label {
      font-weight: bold;
    }
    .btn-login {
      background-color: #007bff;
      color: #fff;
      border-radius: 30px;
    }
    .btn-login:hover {
      background-color: #0056b3;
    }
    .register-link {
      margin-top: 20px;
      text-align: center;
    }
    .register-link a {
      color: #007bff;
    }
    .register-link a:hover {
      text-decoration: underline;
    }
    .error-text {
      font-size: 0.875em;
      color: red;
    }
  </style>
</head>
<body>

<div class="container-login">
  <div class="login-img d-none d-md-block"></div>

  <div class="login-form">
    <h2>Sign In</h2>

    <form action="{{ url('login') }}" method="POST" id="form-login">
      @csrf
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
        <small id="error-username" class="error-text"></small>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
        <small id="error-password" class="error-text"></small>
      </div>

      <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>

      <button type="submit" class="btn btn-login btn-block">Sign In</button>

      <div class="register-link">
        Don’t have an account? <a href="{{ url('register') }}">Sign up</a>
      </div>
    </form>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function () {
    $("#form-login").validate({
      rules: {
        username: {
          required: true,
          minlength: 4,
          maxlength: 20
        },
        password: {
          required: true,
          minlength: 6,
          maxlength: 20
        }
      },
      submitHandler: function (form) {
        $.ajax({
          url: form.action,
          type: form.method,
          data: $(form).serialize(),
          success: function (response) {
            if (response.status) {
              Swal.fire({
                icon: 'success',
                title: 'Login Berhasil!',
                text: response.message,
              }).then(() => {
                window.location.href = response.redirect;
              });
            } else {
              $('.error-text').text('');
              $.each(response.msgField, function (prefix, val) {
                $('#error-' + prefix).text(val[0]);
              });
              Swal.fire({
                icon: 'error',
                title: 'Gagal Login',
                text: response.message,
              });
            }
          }
        });
        return false;
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('text-danger');
        element.closest('.form-group').append(error);
      },
      highlight: function (element) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
</body>
</html>
