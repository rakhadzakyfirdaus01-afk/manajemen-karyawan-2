<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Karyawan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            <i class="fas fa-users me-2"></i>
            Manajemen Karyawan
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('karyawan.index') }}">
                        <i class="fas fa-users"></i>
                        Data Karyawan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('absensi.index') }}">
                        <i class="fas fa-calendar-check"></i>
                        Absensi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cuti.index') }}">
                        <i class="fas fa-file-signature"></i>
                        Pengajuan Cuti
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengumuman.index') }}">
                        <i class="fas fa-bullhorn"></i>
                        Pengumuman
                    </a>
                </li>

            </ul>

            <div class="ms-auto">

                <span class="text-white me-3">
                    <i class="fas fa-user-circle me-1"></i>

                    {{ auth()->user()->name }}

                    <span class="badge bg-warning text-dark ms-1">
                        {{ ucfirst(auth()->user()->role) }}
                    </span>
                </span>

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="d-inline">

                    @csrf

                    <button class="btn btn-outline-light btn-sm">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>
</nav>

<div class="container-fluid mt-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>