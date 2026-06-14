@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">

                    <h3 class="fw-bold mb-0">

                        <i class="fas fa-file-signature me-2"></i>

                        Pengajuan Cuti / Izin

                    </h3>

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

                    <form action="{{ route('cuti.store') }}"
                          method="POST">

                        @csrf

                        <div class="mb-4">

                            <label class="form-label">

                                <i class="fas fa-calendar text-warning me-2"></i>

                                Tanggal Cuti

                            </label>

                            <input type="date"
                                   name="tanggal"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                <i class="fas fa-comment-dots text-info me-2"></i>

                                Alasan Pengajuan

                            </label>

                            <textarea name="alasan"
                                      rows="5"
                                      class="form-control"
                                      placeholder="Masukkan alasan pengajuan cuti..."
                                      required></textarea>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-success">

                                <i class="fas fa-paper-plane me-2"></i>

                                Kirim Pengajuan

                            </button>

                            <a href="{{ route('cuti.index') }}"
                               class="btn btn-secondary">

                                <i class="fas fa-arrow-left me-2"></i>

                                Kembali

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection