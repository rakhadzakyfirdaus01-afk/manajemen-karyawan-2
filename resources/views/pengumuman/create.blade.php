@extends('layouts.app')

@section('content')

<style>

.form-card{
    background:#2a2a40;
    border:none;
    border-radius:25px;
}

.form-control{
    background:#353552;
    border:none;
    color:white;
    border-radius:15px;
}

.form-control:focus{
    background:#353552;
    color:white;
    box-shadow:0 0 15px rgba(124,77,255,.5);
}

.form-control::placeholder{
    color:#bdbdbd;
}

</style>


<div class="container">

    <div class="card form-card">

        <div class="card-body p-4">

            <h2 class="fw-bold mb-4">

                <i class="fas fa-plus-circle text-primary me-2"></i>

                Tambah Pengumuman

            </h2>


            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('pengumuman.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label">

                        Judul Pengumuman

                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           placeholder="Masukkan judul pengumuman"
                           required>

                </div>


                <div class="mb-4">

                    <label class="form-label">

                        Isi Pengumuman

                    </label>

                    <textarea name="isi"
                              rows="6"
                              class="form-control"
                              placeholder="Masukkan isi pengumuman..."
                              required></textarea>

                </div>


                <button class="btn btn-success">

                    <i class="fas fa-save me-2"></i>

                    Simpan

                </button>


                <a href="{{ route('pengumuman.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left me-2"></i>

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection