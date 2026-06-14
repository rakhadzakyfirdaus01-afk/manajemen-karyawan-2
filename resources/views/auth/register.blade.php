<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Daftar Akun - Manajemen Karyawan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          rel="stylesheet">

    <style>

        body{

            min-height:100vh;

            display:flex;

            justify-content:center;

            align-items:center;

            background:
            linear-gradient(
                135deg,
                #6a11cb,
                #2575fc
            );

            overflow:hidden;

        }

        .register-card{

            width:500px;

            background:rgba(255,255,255,.1);

            backdrop-filter:blur(20px);

            border:1px solid rgba(255,255,255,.2);

            border-radius:30px;

            box-shadow:0 15px 40px rgba(0,0,0,.3);

            color:white;

        }

        .logo{

            font-size:70px;

            color:white;

        }

        .form-control{

            background:rgba(255,255,255,.15);

            border:none;

            color:white;

            border-radius:15px;

        }

        .form-control:focus{

            background:rgba(255,255,255,.2);

            color:white;

            box-shadow:none;

        }

        .btn-register{

            background:#7c4dff;

            border:none;

            border-radius:15px;

            padding:12px;

            font-weight:bold;

        }

        .btn-register:hover{

            background:#673ab7;

        }

        a{

            color:#ffd54f;

            text-decoration:none;

        }

    </style>

</head>
<body>

<div class="register-card p-5">

    <div class="text-center mb-4">

        <i class="fas fa-user-plus logo"></i>

        <h2 class="fw-bold mt-3">

            Daftar Akun

        </h2>

        <p>

            Buat akun baru

        </p>

    </div>


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('register') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label>Nama</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   required>

        </div>


        <div class="mb-3">

            <label>Email</label>

            <input type="email"
                   name="email"
                   class="form-control"
                   required>

        </div>


        <div class="mb-3">

            <label>Password</label>

            <input type="password"
                   name="password"
                   class="form-control"
                   required>

        </div>


        <div class="mb-4">

            <label>Konfirmasi Password</label>

            <input type="password"
                   name="password_confirmation"
                   class="form-control"
                   required>

        </div>


        <button class="btn btn-register w-100">

            <i class="fas fa-user-plus me-2"></i>

            Daftar

        </button>

    </form>


    <hr>

    <div class="text-center">

        Sudah punya akun?

        <a href="{{ route('login') }}">

            Login

        </a>

    </div>

</div>

</body>
</html>