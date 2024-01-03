@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('klasifikasi.pengaduan.view') }}">Klasifikasi Laporan Pengaduan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Klasifikasi Laporan Pengaduan</li>
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
                    <h5 class="card-title border-bottom">Detail Klasifikasi Laporan Pengaduan</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm">
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_ketua">Kepada</label>
                                    <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" placeholder="Kepada" value="{{ $showKlasifikasiPengaduan->nama_ketua }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_ketua"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Nama Pelapor" value="{{ $showKlasifikasiPengaduan->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                                </div>
                            </div>
                            <input type="hidden" id="id_pelapor" name="id_pelapor" value="{{ $showKlasifikasiPengaduan->id_pelapor }}">
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="{{ $showKlasifikasiPengaduan->alamat }}" readonly>{{ $showKlasifikasiPengaduan->alamat }}</textarea>
                                    <div class="invalid-feedback" id="invalid-alamat"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nik">No Induk Kependudukan</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="No Induk Kependudukan" value="{{ $showKlasifikasiPengaduan->nik }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nik"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="uraian_laporan">Uraian Laporan</label>
                                    <textarea class="form-control" id="uraian_laporan" name="uraian_laporan" placeholder="Uraian Laporan" value="{{ $showKlasifikasiPengaduan->uraian_laporan }}" readonly>{{ $showKlasifikasiPengaduan->uraian_laporan }}</textarea>
                                    <div class="invalid-feedback" id="invalid-uraian_laporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="saran_masukan">Saran dan Masukan</label>
                                    <textarea class="form-control" id="saran_masukan" name="saran_masukan" placeholder="Saran dan Masukan" value="{{ $showKlasifikasiPengaduan->saran_masukan }}" readonly>{{ $showKlasifikasiPengaduan->saran_masukan }}</textarea>
                                    <div class="invalid-feedback" id="invalid-saran_masukan"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                                    <input type="date" class="form-control" id="tanggal_pengaduan" name="tanggal_pengaduan" placeholder="Tanggal Pengaduan" value="{{ $showKlasifikasiPengaduan->tanggal_pengaduan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_pengaduan"></div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan Hasil Penyelesaian Laporan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Hasil Penyelesaian Laporan" value="{{ $detailKlasifikasi->keterangan }}" readonly>{{ $detailKlasifikasi->keterangan }}</textarea>
                                    <div class="invalid-feedback" id="invalid-keterangan"></div>
                            </div>
                            <div class="form-group">
                            <a href="{{ route('klasifikasi.pengaduan.view') }}" class="btn btn-primary float-right">Kembali</a>
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
