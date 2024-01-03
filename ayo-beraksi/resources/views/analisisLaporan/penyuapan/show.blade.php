@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('analisisLaporan.penyuapan.index') }}">Analisis Laporan Penyuapan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Analisis Laporan Penyuapan</li>
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
                    <h5 class="card-title border-bottom">Detail Laporan Penyuapan</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm">
                                <div class="form-row  mb-3">
                                    <div class="col-md-12 mb-10">
                                        <label for="kode">Nama Terlapor</label>
                                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Karyawan" value="{{ $showAnalisisPenyuapan->nama_terlapor }}" readonly>
                                        <div class="invalid-feedback" id="invalid-code"></div>
                                    </div>
                                </div>
                                <div class="form-row  mb-3">
                                    <div class="col-md-12 mb-10">
                                        <label for="name">Jabatan</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Karyawan" value="{{ $showAnalisisPenyuapan->jabatan }}" readonly>
                                        <div class="invalid-feedback" id="invalid-name"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="instansi">Asal Perusahaan</label>
                                        <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" value="{{ $showAnalisisPenyuapan->instansi }}" readonly>
                                        <div class="invalid-feedback" id="invalid-tempat_lahir"></div>
                                </div>
                                <div class="form-group">
                                    <label for="kasus_suap">Kasus Penyuapan</label>
                                        <textarea class="form-control" id="kasus_suap" name="kasus_suap" placeholder="Kasus Penyuapan" value="{{ $showAnalisisPenyuapan->kasus_suap }}" readonly>{{ $showAnalisisPenyuapan->kasus_suap }}</textarea>
                                        <div class="invalid-feedback" id="invalid-kasus_suap"></div>
                                </div>
                                <div class="form-group">
                                    <label for="nilai_suap">Nilai Suap</label>
                                        <input type="text" class="form-control" id="nilai_suap" name="nilai_suap" placeholder="Nilai Suap" value="{{ $showAnalisisPenyuapan->nilai_suap != null ? $showAnalisisPenyuapan->nilai_suap : 'Nilai Tidak diketahui' }}" readonly>
                                        <div class="invalid-feedback" id="invalid-nilai_suap"></div>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Kejadian</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" value="{{ $showAnalisisPenyuapan->lokasi }}" readonly>
                                        <div class="invalid-feedback" id="invalid-lokasi"></div>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_selesai">Tanggal Kejadian</label>
                                        <input type="date" class="form-control" data-date-format="DD MMMM YYYY" id="tanggal_kejadian" name="tanggal_kejadian" placeholder="Tanggal Kejadian" value="{{ $showAnalisisPenyuapan->tanggal_kejadian }}" readonly>
                                        <div class="invalid-feedback" id="invalid-tanggal_kejadian"></div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pelaporan">Tanggal Pelaporan</label>
                                        <input type="date" class="form-control" data-date-format="DD MMMM YYYY" id="tanggal_pelaporan" name="tanggal_pelaporan" placeholder="Tanggal Pelaporan" value="{{ $showAnalisisPenyuapan->tanggal_pelaporan }}" readonly>
                                        <div class="invalid-feedback" id="invalid-tanggal_pelaporan"></div>
                                </div>
                                <div class="form-group">
                                    <label for="kronologis_kejadian">Kronologis</label>
                                        <textarea class="form-control" id="kronologis_kejadian" name="kronologis_kejadian" placeholder="Kronologis Kejadian" value="{{ $showAnalisisPenyuapan->kronologis_kejadian }}" readonly>{{ $showAnalisisPenyuapan->kronologis_kejadian }}</textarea>
                                        <div class="invalid-feedback" id="invalid-kronologis_kejadian"></div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pelapor">Nama Pelapor</label>
                                        <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Nama Pelapor" value="{{ $showAnalisisPenyuapan->nama_pelapor }}" readonly>
                                        <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                                </div>
                                <input type="hidden" id="id_pelapor" name="id_pelapor" value="{{ $showAnalisisPenyuapan->id_pelapor }}">
                                <div class="float-right">
                                    <a href="{{ route('analisisLaporan.penyuapan.index') }}" class="btn btn-primary">Kembali</a>
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
