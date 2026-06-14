@extends('layouts.app')

@section('content')

<style>

.profile-card{
    background:#2a2a40;
    border:none;
    border-radius:25px;
}

.profile-img{
    width:180px;
    height:180px;
    object-fit:cover;
    border-radius:50%;
    border:5px solid #7c4dff;
}

.info-table td{
    color:white;
    padding:12px;
}

.info-table th{
    color:#bdbdbd;
    width:180px;
    padding:12px;
}

</style>


<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">

            <i class="fas fa-id-card text-primary me-2"></i>

            Detail Karyawan

        </h2>

        <a href="{{ route('karyawan.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left me-2"></i>

            Kembali

        </a>

    </div>


    <div class="card profile-card">

        <div class="card-body p-5">

            <div class="row">

                <div class="col-md-4 text-center">

                    @if($karyawan->foto)

                        <img src="{{ Storage::url($karyawan->foto) }}"
                             class="profile-img">

                    @else

                        <div class="mb-4">

                            <i class="fas fa-user-circle"
                               style="font-size:180px;color:#7c4dff">

                            </i>

                        </div>

                    @endif


                    <h3 class="mt-4">

                        {{ $karyawan->nama }}

                    </h3>


                    @if($karyawan->status == 'aktif')

                        <span class="badge bg-success p-3">

                            Aktif

                        </span>

                    @else

                        <span class="badge bg-danger p-3">

                            Nonaktif

                        </span>

                    @endif

                </div>


                <div class="col-md-8">

                    <table class="table table-borderless info-table">

                        <tr>

                            <th>NIP</th>

                            <td>

                                {{ $karyawan->nip }}

                            </td>

                        </tr>


                        <tr>

                            <th>Jabatan</th>

                            <td>

                                {{ $karyawan->jabatan }}

                            </td>

                        </tr>


                        <tr>

                            <th>Departemen</th>

                            <td>

                                {{ $karyawan->departemen }}

                            </td>

                        </tr>


                        <tr>

                            <th>Email</th>

                            <td>

                                {{ $karyawan->email }}

                            </td>

                        </tr>


                        <tr>

                            <th>No Telepon</th>

                            <td>

                                {{ $karyawan->no_telepon }}

                            </td>

                        </tr>


                        <tr>

                            <th>Tanggal Masuk</th>

                            <td>

                                {{ $karyawan->tanggal_masuk }}

                            </td>

                        </tr>


                        <tr>

                            <th>Gaji</th>

                            <td>

                                Rp {{ number_format($karyawan->gaji,0,',','.') }}

                            </td>

                        </tr>


                        <tr>

                            <th>Alamat</th>

                            <td>

                                {{ $karyawan->alamat }}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection