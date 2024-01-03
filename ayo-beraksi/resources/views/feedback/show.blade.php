@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('feedback.index') }}">Feedback</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Feedback</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 70%;">
    <div class="card-body">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="card-title border-bottom">Detail Feedback</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm">
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_pengguna">Nama Pengguna</label>
                                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna" value="{{ $showFeedback->nama_pengguna }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pengguna"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="bintang_kepuasan">Bintang Kepuasan</label>
                                    <input type="text" class="form-control" id="bintang_kepuasan" name="bintang_kepuasan" placeholder="Bintang Kepuasan" value="{{ $showFeedback->bintang_kepuasan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-bintang_kepuasan"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="respon_kepuasan">Respon Kepuasan</label>
                                    <input type="text" class="form-control" id="respon_kepuasan" name="respon_kepuasan" placeholder="Respon Kepuasan" value="{{ $showFeedback->respon_kepuasan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-respon_kepuasan"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="alasan">Alasan</label>
                                    <input type="text" class="form-control" id="alasan" name="alasan" placeholder="Alasan" value="{{ $showFeedback->alasan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-alasan"></div>
                                </div>
                            </div>
                            <input type="hidden" id="id_pengguan" name="id_pengguan" value="{{ $showFeedback->id_pengguan }}">
                            <div class="form-group">
                                <a href="{{ route('feedback.index') }}" class="btn btn-info float-right margin-right ">Kembali</a>
                            </div>
                            <input type="hidden" value="{{ session('message') }}" id="index_message">
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
</div>
<!-- /Container -->

@endsection
