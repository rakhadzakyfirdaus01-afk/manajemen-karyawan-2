@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Pengumuman</h2>

        @if(auth()->user()->role == 'admin')
            <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
                Tambah Pengumuman
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @forelse($pengumumans as $pengumuman)

        <div class="card shadow mb-3">
            <div class="card-header">
                <h5>{{ $pengumuman->judul }}</h5>
            </div>

            <div class="card-body">
                <p>{{ $pengumuman->isi }}</p>
            </div>

            <div class="card-footer text-muted">
                Dibuat pada:
                {{ $pengumuman->created_at->format('d-m-Y H:i') }}
            </div>
        </div>

    @empty

        <div class="alert alert-info">
            Belum ada pengumuman.
        </div>

    @endforelse

</div>
@endsection