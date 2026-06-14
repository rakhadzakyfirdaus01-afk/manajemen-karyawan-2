@extends('layouts.app')

@section('content')

<style>

.karyawan-card{
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

            <i class="fas fa-users text-primary me-2"></i>

            Data Karyawan

        </h2>

        @if(auth()->user()->role == 'admin')

            <a href="{{ route('karyawan.create') }}"
               class="btn btn-success">

                <i class="fas fa-plus me-2"></i>

                Tambah Karyawan

            </a>

        @endif

    </div>


    <div class="card karyawan-card">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($karyawans as $i => $k)

                    <tr>

                        <td>

                            {{ $karyawans->firstItem() + $i }}

                        </td>

                        <td>

                            {{ $k->nama }}

                        </td>

                        <td>

                            {{ $k->nip }}

                        </td>

                        <td>

                            {{ $k->jabatan }}

                        </td>

                        <td>

                            {{ $k->departemen }}

                        </td>

                        <td>

                            @if($k->status == 'aktif')

                                <span class="badge bg-success">

                                    Aktif

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Nonaktif

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('karyawan.show',$k) }}"
                               class="btn btn-info btn-sm">

                                <i class="fas fa-eye"></i>

                            </a>


                            @if(auth()->user()->role == 'admin')

                                <a href="{{ route('karyawan.edit',$k) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>


                                <form action="{{ route('karyawan.destroy',$k) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center">

                            Belum ada data karyawan.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            <div class="mt-4">

                {{ $karyawans->links() }}

            </div>

        </div>

    </div>

</div>

@endsection