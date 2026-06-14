@extends('layouts.app')

@section('content')

<style>

.form-card{
    background:#2a2a40;
    border:none;
    border-radius:25px;
}

.form-control,
.form-select{
    background:#353552;
    border:none;
    color:white;
    border-radius:15px;
}

.form-control:focus,
.form-select:focus{
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

        <div class="card-body p-5">

            <h2 class="fw-bold mb-4">

                <i class="fas fa-user-edit text-warning me-2"></i>

                Edit Karyawan

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


            <form action="{{ route('karyawan.update',$karyawan) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nama
                        </label>

                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ $karyawan->nama }}"
                               required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            NIP
                        </label>

                        <input type="text"
                               name="nip"
                               class="form-control"
                               value="{{ $karyawan->nip }}"
                               required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Jabatan
                        </label>

                        <input type="text"
                               name="jabatan"
                               class="form-control"
                               value="{{ $karyawan->jabatan }}"
                               required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Departemen
                        </label>

                        <input type="text"
                               name="departemen"
                               class="form-control"
                               value="{{ $karyawan->departemen }}"
                               required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ $karyawan->email }}"
                               required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nomor Telepon
                        </label>

                        <input type="text"
                               name="no_telepon"
                               class="form-control"
                               value="{{ $karyawan->no_telepon }}"
                               required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tanggal Masuk
                        </label>

                        <input type="date"
                               name="tanggal_masuk"
                               class="form-control"
                               value="{{ $karyawan->tanggal_masuk }}"
                               required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="aktif"
                                {{ $karyawan->status=='aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="nonaktif"
                                {{ $karyawan->status=='nonaktif' ? 'selected' : '' }}>
                                Nonaktif
                            </option>

                        </select>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Gaji
                        </label>

                        <input type="number"
                               name="gaji"
                               class="form-control"
                               value="{{ $karyawan->gaji }}"
                               required>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Foto Profil
                        </label>

                        <input type="file"
                               name="foto"
                               class="form-control">

                    </div>


                    <div class="col-12 mb-4">

                        <label class="form-label">
                            Alamat
                        </label>

                        <textarea name="alamat"
                                  rows="4"
                                  class="form-control">{{ $karyawan->alamat }}</textarea>

                    </div>

                </div>


                <button class="btn btn-warning">

                    <i class="fas fa-save me-2"></i>

                    Update

                </button>


                <a href="{{ route('karyawan.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left me-2"></i>

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

@endsection