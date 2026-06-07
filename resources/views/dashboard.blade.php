@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard</h2>
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h1>{{ $totalKaryawan }}</h1>
                    <p>Total Karyawan</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h1>{{ $karyawanAktif }}</h1>
                    <p>Karyawan Aktif</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body text-center">
                    <h1>{{ $karyawanNonaktif }}</h1>
                    <p>Karyawan Non-Aktif</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <h1>{{ $departemen }}</h1>
                    <p>Total Departemen</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('karyawan.index') }}" class="btn btn-primary">
        <i class="fas fa-users me-2"></i>Lihat Data Karyawan
    </a>
</div>
@endsection