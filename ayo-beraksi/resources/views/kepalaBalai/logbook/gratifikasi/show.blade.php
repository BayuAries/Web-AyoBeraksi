@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('logbook.gratifikasi.view') }}">Logbook Laporan Gratifikasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Logbook Laporan Gratifikasi</li>
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
                    <h5 class="card-title border-bottom">Detail Logbook Laporan Gratifikasi</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm">
                            <input type="hidden" id="id_pelapor" name="id_pelapor" value="{{ $showLogbookGratifikasi->id_pelapor }}">
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Nama Pelapor" value="{{ $showLogbookGratifikasi->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pelaporan">Tanggal Pelaporan</label>
                                    <input type="date" class="form-control" id="tanggal_pelaporan" name="tanggal_pelaporan" placeholder="Tanggal Pengaduan" value="{{ $showLogbookGratifikasi->tanggal_pelaporan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_pelaporan"></div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="jenis_gratifikasi">Jenis Hadiah, Sumbangan & Keuntungan Serupa</label>
                                    <textarea class="form-control" id="jenis_gratifikasi" name="jenis_gratifikasi" placeholder="Jenis Hadiah, Sumbangan & Keuntungan Serupa" value="{{ $detailAnalisis->jenis_gratifikasi }}" readonly>{{ $detailAnalisis->jenis_gratifikasi }}</textarea>
                                    <div class="invalid-feedback" id="invalid-jenis_gratifikasi"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_terlapor">Pemberi Hadiah, Sumbangan & Keuntungan Serupa</label>
                                    <input class="form-control" id="nama_terlapor" name="nama_terlapor" placeholder="Jenis Hadiah, Sumbangan & Keuntungan Serupa" value="{{ $showLogbookGratifikasi->nama_terlapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_terlapor"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="hasil_analisis">Hasil Analisa Tim Fungsi Kepatuhan</label>
                                    @if ($detailLogbook->hasil_analisis != null)
                                        <input class="form-control" id="hasil_analisis" name="hasil_analisis" placeholder="Sedang dalam Proses Investigasi" value="{{ $detailLogbook->hasil_analisis === '0' ? 'Dikembalikan' : 'Diterima' }}" readonly>
                                    @else
                                        <input class="form-control" id="hasil_analisis" name="hasil_analisis" placeholder="Sedang dalam Proses Investigasi"  readonly>
                                    @endif
                                    <div class="invalid-feedback" id="invalid-hasil_analisis"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Sedang dalam Proses Investigasi" value="{{ $detailLogbook->keterangan }}" readonly>{{ $detailLogbook->keterangan }}</textarea>
                                    <div class="invalid-feedback" id="invalid-keterangan"></div>
                                </div>
                            </div>
                            <div class="form-group">
                            <a href="{{ route('logbook.gratifikasi.view') }}" class="btn btn-primary float-right">Kembali</a>
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
