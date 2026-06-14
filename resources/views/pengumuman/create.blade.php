@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow">
        <div class="card-header">
            <h3>Buat Pengumuman</h3>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengumuman.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Pengumuman</label>
                    <input type="text"
                           name="judul"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Pengumuman</label>
                    <textarea name="isi"
                              rows="5"
                              class="form-control"
                              required></textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Pengumuman
                </button>

                <a href="{{ route('pengumuman.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>
@endsection