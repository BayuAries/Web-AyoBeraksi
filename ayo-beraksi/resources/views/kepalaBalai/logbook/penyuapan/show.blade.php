@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('logbook.penyuapan.view') }}">Logbook Laporan Penyuapan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Logbook Laporan Penyuapan</li>
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
                    <h5 class="card-title border-bottom">Detail Logbook Laporan Penyuapan</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm">
                            <input type="hidden" id="id_pelapor" name="id_pelapor" value="{{ $showLogbookPenyuapan->id_pelapor }}">
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Nama Pelapor" value="{{ $showLogbookPenyuapan->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_terlapor">Nama Terlapor</label>
                                    <input class="form-control" id="nama_terlapor" name="nama_terlapor" placeholder="Jenis Hadiah, Sumbangan & Keuntungan Serupa" value="{{ $showLogbookPenyuapan->nama_terlapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_terlapor"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kejadian">Tanggal Kejadian</label>
                                    <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" placeholder="Tanggal Kejadian" value="{{ $showLogbookPenyuapan->tanggal_kejadian }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_kejadian"></div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="lokasi">Tempat Kejadian</label>
                                    <textarea class="form-control" id="lokasi" name="lokasi" placeholder="Tempat Kejadian" value="{{ $showLogbookPenyuapan->lokasi }}" readonly>{{ $showLogbookPenyuapan->lokasi }}</textarea>
                                    <div class="invalid-feedback" id="invalid-lokasi"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="uraian_kejadian">Uraian Kejadian</label>
                                    <textarea class="form-control" id="uraian_kejadian" name="uraian_kejadian" placeholder="Sedang dalam Proses Investigasi" value="{{ $detailLogbook->uraian_kejadian }}" readonly>{{ $detailLogbook->uraian_kejadian }}</textarea>
                                    <div class="invalid-feedback" id="invalid-uraian_kejadian"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="saksi">Saksi</label>
                                    <textarea class="form-control" id="saksi" name="saksi" placeholder="Sedang dalam Proses Investigasi" value="{{ $detailLogbook->saksi }}" readonly>{{ $detailLogbook->saksi }}</textarea>
                                    <div class="invalid-feedback" id="invalid-saksi"></div>
                                </div>
                            </div>
                            <div class="form-group">
                            <a href="{{ route('logbook.penyuapan.view') }}" class="btn btn-primary float-right">Kembali</a>
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
@section('script')
    <script>
    </script>
@endsection
