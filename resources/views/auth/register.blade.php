<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Custom Style -->
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #999;
      height: 100vh;
      margin: 0;
    }

    .container-register {
      display: flex;
      min-height: 100vh;
    }

    .register-img {
      background: url('{{ asset('image/login.png') }}') no-repeat center center;
      background-size: cover;
      flex: 1;
    }

    .register-form {
      background-color: #fff;
      padding: 60px 40px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .register-form h2 {
      font-weight: bold;
      margin-bottom: 40px;
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-register {
      background-color: #28a745;
      color: #fff;
      border-radius: 30px;
    }

    .btn-register:hover {
      background-color: #218838;
    }

    .login-link {
      margin-top: 20px;
      text-align: center;
    }

    .login-link a {
      color: #28a745;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container-register">
  <div class="register-img d-none d-md-block"></div>

  <div class="register-form">
    <h2>Register</h2>

    <form id="registerForm" action="{{ route('register.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
        </div>
      
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Minimal 3 karakter" required>
        </div>
      
        <div class="form-group">
          <label for="email">Alamat Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Gunakan email @polinema.ac.id" required>
        </div>
      
        <div class="form-group">
          <label for="password">Kata Sandi</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 karakter" required>
        </div>
      
        <div class="form-group">
          <label for="confirm_password">Ulangi Kata Sandi</label>
          <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Ulangi password" required>
        </div>
        
        <div class="form-group">
          <label for="level_id">Pilih Level</label>
          <select class="form-control" id="level_id" name="level_id" required>
            <option value="">Pilih Level</option>
            @foreach ($levels as $level)
                <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
            @endforeach
          </select>
        </div>
      
        <button type="submit" class="btn btn-register btn-block">Daftar</button>
      
        <div class="login-link">
          Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
      </form>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById("registerForm").addEventListener("submit", function (e) {
      const username = document.getElementById("username").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm_password").value;
  
      if (username.length < 3) {
        alert("Username minimal 3 karakter.");
        e.preventDefault();
        return;
      }
  
      if (!email.endsWith("@polinema.ac.id")) {
        alert("Email harus menggunakan domain @polinema.ac.id");
        e.preventDefault();
        return;
      }
  
      if (password.length < 6) {
        alert("Password minimal 6 karakter.");
        e.preventDefault();
        return;
      }
  
      if (password !== confirmPassword) {
        alert("Konfirmasi password tidak cocok.");
        e.preventDefault();
      }
    });
</script>
</body>
</html>
