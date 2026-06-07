@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Detail Karyawan</h2>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    @if($karyawan->foto)
                        <img src="{{ Storage::url($karyawan->foto) }}" class="img-thumbnail mb-3" width="150">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center mb-3" style="width:150px;height:150px;margin:auto;border-radius:8px">
                            <i class="fas fa-user fa-4x"></i>
                        </div>
                    @endif
                    <span class="badge bg-{{ $karyawan->status == 'aktif' ? 'success' : 'danger' }} fs-6">
                        {{ ucfirst($karyawan->status) }}
                    </span>
                </div>
                <div class="col-md-9">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200">Nama</th>
                            <td>: {{ $karyawan->nama }}</td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td>: {{ $karyawan->nip }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>: {{ $karyawan->jabatan }}</td>
                        </tr>
                        <tr>
                            <th>Departemen</th>
                            <td>: {{ $karyawan->departemen }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $karyawan->email }}</td>
                        </tr>
                        <tr>
                            <th>No Telepon</th>
                            <td>: {{ $karyawan->no_telepon }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <td>: {{ $karyawan->tanggal_masuk }}</td>
                        </tr>
                        <tr>
                            <th>Gaji</th>
                            <td>: Rp {{ number_format($karyawan->gaji, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $karyawan->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection