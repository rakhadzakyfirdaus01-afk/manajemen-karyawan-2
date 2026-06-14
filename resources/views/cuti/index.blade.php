@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Pengajuan Cuti</h2>

        @if(auth()->user()->role == 'user')
            <a href="{{ route('cuti.create') }}" class="btn btn-primary">
                Ajukan Cuti
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered">
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cuti->user->name }}</td>
                        <td>{{ $cuti->tanggal }}</td>
                        <td>{{ $cuti->alasan }}</td>

                        <td>
                            @if($cuti->status == 'menunggu')
                                <span class="badge bg-warning">
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

                                    <form action="{{ route('cuti.setujui', $cuti) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('PUT')

                                        <button class="btn btn-success btn-sm">
                                            Setujui
                                        </button>
                                    </form>

                                    <form action="{{ route('cuti.tolak', $cuti) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('PUT')

                                        <button class="btn btn-danger btn-sm">
                                            Tolak
                                        </button>
                                    </form>

                                @endif

                            </td>
                        @endif

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
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