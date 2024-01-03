@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('laporan.pengaduan.index') }}">Laporan Pengaduan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Laporan Pengaduan</li>
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
                    <h5 class="card-title border-bottom">Detail Laporan Pengaduan</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm">
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="kepada">Kepada</label>
                                    <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" placeholder="Kepada" value="{{ $showPengaduan->nama_ketua }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_ketua"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Nama Pelapor" value="{{ $showPengaduan->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                                </div>
                            </div>
                            <input type="hidden" id="id_pelapor" name="id_pelapor" value="{{ $showPengaduan->id_pelapor }}">
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="{{ $showPengaduan->alamat }}" readonly>{{ $showPengaduan->alamat }}</textarea>
                                    <div class="invalid-feedback" id="invalid-alamat"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nik">No Induk Kependudukan</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="No Induk Kependudukan" value="{{ $showPengaduan->nik }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nik"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="uraian_laporan">Uraian Laporan</label>
                                    <textarea class="form-control" id="uraian_laporan" name="uraian_laporan" placeholder="Uraian Laporan" value="{{ $showPengaduan->uraian_laporan }}" readonly>{{ $showPengaduan->uraian_laporan }}</textarea>
                                    <div class="invalid-feedback" id="invalid-uraian_laporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="saran_masukan">Saran dan Masukan</label>
                                    <textarea class="form-control" id="saran_masukan" name="saran_masukan" placeholder="Saran dan Masukan" value="{{ $showPengaduan->saran_masukan }}" readonly>{{ $showPengaduan->saran_masukan }}</textarea>
                                    <div class="invalid-feedback" id="invalid-saran_masukan"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                                    <input type="date" class="form-control" id="tanggal_pengaduan" name="tanggal_pengaduan" placeholder="Tanggal Pengaduan" value="{{ $showPengaduan->tanggal_pengaduan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_pengaduan"></div>
                            </div>
                            <div class="form-group">
                                <label for="waktu_selesai">Status Laporan</label>
                                    <input type="text" class="form-control" id="waktu_selesai" name="waktu_selesai" placeholder="Waktu Selesai Karyawan" value="{{ $showPengaduan->status  === null ? 'Data Baru' : 'Laporan telah diterima' }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tempat_lahir"></div>
                            </div>
                            <div class="form-group" {{ $showPengaduan->status  == '0' ? '' : 'hidden' }}>
                                <label for="deskripsi_status">Alasan Penolakan</label>
                                    <textarea class="form-control" id="deskripsi_status" name="deskripsi_status" placeholder="Alasan" value="{{ $showPengaduan->deskripsi_status }}" readonly>{{ $showPengaduan->deskripsi_status }}</textarea>
                                    <div class="invalid-feedback" id="invalid-deskripsi_status"></div>
                            </div>
                            <div class="form-group">
                            <a href="{{ route('laporan.pengaduan.index') }}" class="btn btn-primary float-right">Kembali</a>
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
