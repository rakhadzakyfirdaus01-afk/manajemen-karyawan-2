@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Karyawan</h2>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('karyawan.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Karyawan
            </a>
        @endif
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
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
                        <td>{{ $karyawans->firstItem() + $i }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->nip }}</td>
                        <td>{{ $k->jabatan }}</td>
                        <td>{{ $k->departemen }}</td>
                        <td>
                            <span class="badge bg-{{ $k->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($k->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('karyawan.show', $k) }}" class="btn btn-info btn-sm">Detail</a>
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('karyawan.edit', $k) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('karyawan.destroy', $k) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Tidak ada data.</td></tr>
                @endforelse
                </tbody>
            </table>
            {{ $karyawans->links() }}
        </div>
    </div>
</div>
@endsection