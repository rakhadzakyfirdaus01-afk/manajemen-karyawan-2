@extends('layouts.app')

@section('content')

<style>

.cuti-card{
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
    font-size:14px;
}

</style>

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">

            <i class="fas fa-file-signature text-primary me-2"></i>

            Pengajuan Cuti

        </h2>

        @if(auth()->user()->role == 'user')

            <a href="{{ route('cuti.create') }}"
               class="btn btn-primary">

                <i class="fas fa-plus me-2"></i>

                Ajukan Cuti

            </a>

        @endif

    </div>


    <div class="card cuti-card">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Alasan</th>
                        <th>Status</th>

                        @if(auth()->user()->role == 'admin')
                            <th>Aksi</th>
                        @endif

                    </tr>

                </thead>

                <tbody>

                @forelse($cutis as $cuti)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ $cuti->user->name }}

                        </td>

                        <td>

                            {{ $cuti->tanggal }}

                        </td>

                        <td>

                            {{ $cuti->alasan }}

                        </td>

                        <td>

                            @if($cuti->status == 'menunggu')

                                <span class="badge bg-warning text-dark">

                                    Menunggu

                                </span>

                            @elseif($cuti->status == 'disetujui')

                                <span class="badge bg-success">

                                    Disetujui

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Ditolak

                                </span>

                            @endif

                        </td>


                        @if(auth()->user()->role == 'admin')

                            <td>

                                @if($cuti->status == 'menunggu')

                                    <form action="{{ route('cuti.setujui',$cuti) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('PUT')

                                        <button class="btn btn-success btn-sm">

                                            <i class="fas fa-check"></i>

                                        </button>

                                    </form>


                                    <form action="{{ route('cuti.tolak',$cuti) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('PUT')

                                        <button class="btn btn-danger btn-sm">

                                            <i class="fas fa-times"></i>

                                        </button>

                                    </form>

                                @endif

                            </td>

                        @endif

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center">

                            Belum ada pengajuan cuti

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection