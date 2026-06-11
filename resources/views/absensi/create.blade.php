@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            <h3>Absensi Hari Ini</h3>
        </div>

        <div class="card-body">

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(!$absensiHariIni)

                <form action="{{ route('absensi.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Status Kehadiran</label>

                        <select name="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Simpan Absensi
                    </button>

                </form>

            @elseif($absensiHariIni->status === 'hadir' && !$absensiHariIni->jam_pulang)

                <div class="alert alert-info">
                    Anda sudah absen masuk pukul
                    <strong>{{ $absensiHariIni->jam_masuk }}</strong>
                </div>

                <form action="{{ route('absensi.store') }}" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-warning">
                        Absen Pulang
                    </button>
                </form>

            @else

                <div class="alert alert-success">
                    Absensi hari ini sudah selesai.
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $absensiHariIni->tanggal }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{ ucfirst($absensiHariIni->status) }}</td>
                    </tr>

                    <tr>
                        <th>Jam Masuk</th>
                        <td>{{ $absensiHariIni->jam_masuk ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Jam Pulang</th>
                        <td>{{ $absensiHariIni->jam_pulang ?? '-' }}</td>
                    </tr>
                </table>

            @endif

        </div>
    </div>
</div>
@endsection