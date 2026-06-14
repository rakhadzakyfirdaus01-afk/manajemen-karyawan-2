@extends('layouts.app')

@section('content')

<style>

.absensi-card{
    background:#2a2a40;
    border:none;
    border-radius:25px;
}

.table{
    color:white;
}

.table thead{
    background:#353552;
}

.table tbody tr{
    transition:.3s;
}

.table tbody tr:hover{
    background:#353552;
}

.badge{
    padding:10px 15px;
    border-radius:15px;
}

</style>


<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">

            <i class="fas fa-calendar-check text-success me-2"></i>

            @if(auth()->user()->role === 'admin')
                Data Absensi Karyawan
            @else
                Riwayat Absensi Saya
            @endif

        </h2>

        @if(auth()->user()->role !== 'admin')

            <a href="{{ route('absensi.create') }}"
               class="btn btn-primary">

                <i class="fas fa-plus me-2"></i>

                Absen Hari Ini

            </a>

        @endif

    </div>


    <div class="card absensi-card">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Nama</th>

                        <th>Tanggal</th>

                        <th>Jam Masuk</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($absensis as $absensi)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            @if(auth()->user()->role === 'admin')

                                {{ $absensi->user->name ?? '-' }}

                            @else

                                {{ auth()->user()->name }}

                            @endif

                        </td>

                        <td>

                            {{ $absensi->tanggal }}

                        </td>

                        <td>

                            {{ $absensi->jam_masuk }}

                        </td>

                        <td>

                            @if($absensi->status == 'hadir')

                                <span class="badge bg-success">

                                    Hadir

                                </span>

                            @elseif($absensi->status == 'izin')

                                <span class="badge bg-warning text-dark">

                                    Izin

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Sakit

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center">

                            Belum ada data absensi

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection