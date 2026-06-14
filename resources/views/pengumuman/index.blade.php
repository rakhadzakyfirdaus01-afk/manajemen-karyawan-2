@extends('layouts.app')

@section('content')

<style>

.pengumuman-card{
    background:#2a2a40;
    border:none;
    border-radius:25px;
    transition:.3s;
    overflow:hidden;
}

.pengumuman-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,.4);
}

.icon-box{
    width:70px;
    height:70px;
    border-radius:20px;
    background:linear-gradient(135deg,#f6c23e,#dda20a);

    display:flex;
    justify-content:center;
    align-items:center;

    color:white;
}

.tanggal{
    color:#bdbdbd;
    font-size:14px;
}

.isi-pengumuman{
    color:#e0e0e0;
    line-height:1.8;
}

.empty-card{
    background:#2a2a40;
    border:none;
    border-radius:25px;
}

</style>


<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">

            <i class="fas fa-bullhorn text-warning me-2"></i>

            Pengumuman

        </h2>

        @if(auth()->user()->role == 'admin')

            <a href="{{ route('pengumuman.create') }}"
               class="btn btn-primary">

                <i class="fas fa-plus me-2"></i>

                Tambah Pengumuman

            </a>

        @endif

    </div>


    @forelse($pengumumans as $pengumuman)

        <div class="card pengumuman-card mb-4">

            <div class="card-body p-4">

                <div class="d-flex">

                    <div class="icon-box me-4">

                        <i class="fas fa-bullhorn fa-2x"></i>

                    </div>

                    <div class="w-100">

                        <h4 class="fw-bold">

                            {{ $pengumuman->judul }}

                        </h4>

                        <div class="tanggal mb-3">

                            <i class="fas fa-calendar-alt me-2"></i>

                            {{ $pengumuman->created_at->format('d F Y - H:i') }}

                        </div>

                        <hr>

                        <div class="isi-pengumuman">

                            {{ $pengumuman->isi }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="card empty-card">

            <div class="card-body text-center p-5">

                <i class="fas fa-bullhorn fa-5x text-secondary mb-4"></i>

                <h3>

                    Belum Ada Pengumuman

                </h3>

                <p class="text-light">

                    Pengumuman dari admin akan muncul di sini.

                </p>

            </div>

        </div>

    @endforelse

</div>

@endsection