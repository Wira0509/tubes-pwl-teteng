<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Login dan Register</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <style>
      @import url("https://fonts.googleapis.com/css?family=Montserrat:400,800");

      * {
        box-sizing: border-box;
      }

      body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: "Montserrat", sans-serif;
        height: 100vh;
        margin: 0;
      }

      h1 {
        font-weight: bold;
        margin: 0;
      }

      h2 {
        text-align: center;
      }

      p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
      }

      span {
        font-size: 12px;
      }

      a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
      }

      button {
        border-radius: 20px;
        border: 1px solid #ff4b2b;
        background-color: #ff4b2b;
        color: #ffffff;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
      }

      button:active {
        transform: scale(0.95);
      }

      button:focus {
        outline: none;
      }

      button.ghost {
        background-color: transparent;
        border-color: #ffffff;
      }

      form {
        background-color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
      }

      input {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
      }

      .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
          0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
      }

      .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
      }

      .sign-in-container {
        left: 0;
        width: 50%;
        z-index: 2;
      }

      .container.right-panel-active .sign-in-container {
        transform: translateX(100%);
      }

      .sign-up-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
      }

      .container.right-panel-active .sign-up-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
      }

      @keyframes show {
        0%,
        49.99% {
          opacity: 0;
          z-index: 1;
        }

        50%,
        100% {
          opacity: 1;
          z-index: 5;
        }
      }

      .overlay-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
      }

      .container.right-panel-active .overlay-container {
        transform: translateX(-100%);
      }

      .overlay {
        background: #ff416c;
        background: -webkit-linear-gradient(to right, #ff4b2b, #ff416c);
        background: linear-gradient(to right, #ff4b2b, #ff416c);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #ffffff;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
      }

      .container.right-panel-active .overlay {
        transform: translateX(50%);
      }

      .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
      }

      .overlay-left {
        transform: translateX(-20%);
      }

      .container.right-panel-active .overlay-left {
        transform: translateX(0);
      }

      .overlay-right {
        right: 0;
        transform: translateX(0);
      }

      .container.right-panel-active .overlay-right {
        transform: translateX(20%);
      }

      .social-container {
        margin: 20px 0;
      }

      .social-container a {
        border: 1px solid #dddddd;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
      }

      footer {
        background-color: #222;
        color: #fff;
        font-size: 14px;
        bottom: 0;
        position: fixed;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 999;
      }

      footer p {
        margin: 10px 0;
      }

      footer i {
        color: red;
      }

      footer a {
        color: #3c97bf;
        text-decoration: none;
      }

      /* New alert styles */
      .alert {
        border-radius: 8px;
        padding: 15px 20px;
        margin-bottom: 20px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      }

      .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
      }

      .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
      }

      .alert-icon {
        font-size: 18px;
      }
    </style>
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form action="{{ route('register.post') }}" method="POST">
          @csrf
          <h1>Buat Akun</h1>

          @if ($errors->any())
            <div class="mb-4 text-red-600">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>- {{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required />
          <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
          <div style="position: relative; width: 100%;">
            <input type="password" name="password" placeholder="Password" required style="padding-right: 50px;" />
            <button type="button" class="toggle-password" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; padding: 0 10px;">
              <i class="fa fa-eye" style="color: black;"></i>
            </button>
          </div>
          <div style="position: relative; width: 100%;">
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required style="padding-right: 50px;" />
            <button type="button" class="toggle-password" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; padding: 0 10px;">
              <i class="fa fa-eye" style="color: black;"></i>
            </button>
          </div>
          <button>Daftar</button>
        </form>
      </div>
      <div class="form-container sign-in-container">
        <form action="{{ route('login.post') }}" method="POST">
          @csrf
          <h1>Masuk</h1>

          @if(session('success'))
            <div class="alert alert-success">
              <i class="fa fa-check-circle alert-icon" aria-hidden="true"></i>
              {{ session('success') }}
            </div>
          @endif

          @if ($errors->login->any())
            <div class="alert alert-error">
              <i class="fa fa-exclamation-triangle alert-icon" aria-hidden="true"></i>
              <ul style="margin: 0; padding-left: 20px; list-style-type: none;">
                @foreach ($errors->login->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
          <div style="position: relative; width: 100%;">
            <input type="password" name="password" placeholder="Password" required style="padding-right: 50px;" />
            <button type="button" class="toggle-password" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; padding: 0 10px;">
              <i class="fa fa-eye" style="color: black;"></i>
            </button>
          </div>
          <a href="{{ route('login') }}">Lupa password?</a>
          <button>Masuk</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Selamat Datang Kembali!</h1>
            <p>
              Untuk tetap terhubung dengan kami, silakan masuk dengan info pribadi Anda
            </p>
            <button class="ghost" id="signIn">Masuk</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Halo, Teman!</h1>
            <p>Masukkan detail pribadi Anda dan mulai perjalanan bersama kami</p>
            <button class="ghost" id="signUp">Daftar</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      const signUpButton = document.getElementById("signUp");
      const signInButton = document.getElementById("signIn");
      const container = document.getElementById("container");

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
      });

      signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
        // Clear error and success messages when switching to sign-in
        const signUpContainer = document.querySelector('.sign-up-container');
        const signInContainer = document.querySelector('.sign-in-container');
        if (signUpContainer) {
          const alerts = signUpContainer.querySelectorAll('.alert');
          alerts.forEach(alert => alert.style.display = 'none');
        }
        if (signInContainer) {
          const alerts = signInContainer.querySelectorAll('.alert');
          alerts.forEach(alert => alert.style.display = 'none');
        }
      });

      signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
        // Clear error and success messages when switching to sign-up
        const signUpContainer = document.querySelector('.sign-up-container');
        const signInContainer = document.querySelector('.sign-in-container');
        if (signUpContainer) {
          const alerts = signUpContainer.querySelectorAll('.alert');
          alerts.forEach(alert => alert.style.display = 'none');
        }
        if (signInContainer) {
          const alerts = signInContainer.querySelectorAll('.alert');
          alerts.forEach(alert => alert.style.display = 'none');
        }
      });

      // Script untuk toggle show/hide password
      document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', () => {
          const input = button.previousElementSibling;
          const icon = button.querySelector('i');
          if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
          } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
          }
        });
      });
    </script>
  </body>
</html>
