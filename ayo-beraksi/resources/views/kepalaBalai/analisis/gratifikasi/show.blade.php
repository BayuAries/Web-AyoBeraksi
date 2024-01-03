@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('analisisLaporan.gratifikasi.view') }}">Analisis Laporan Gratifikasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Analisis Laporan Gratifikasi</li>
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
                    <h5 class="card-title border-bottom">Detail Analisis Laporan Gratifikasi</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm">
                            <div class="form-group">
                                <label for="no_laporan">Nomor Laporan</label>
                                    <input type="text" class="form-control" id="no_laporan" name="no_laporan" placeholder="Nomor Laporan" value="{{ $laporanGratifikasi->no_laporan === null ? "Belum ada": $laporanGratifikasi->no_laporan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-no_laporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Pelapor" value="{{ $laporanGratifikasi->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelapor">Nama Pengirim</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Pengirim" value="{{ $laporanGratifikasi->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_terlapor">Nama Terlapor</label>
                                    <input type="text" class="form-control" id="nama_terlapor" name="nama_terlapor" placeholder="Nama" value="{{ $laporanGratifikasi->nama_terlapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_terlapor"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ $laporanGratifikasi->jabatan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-jabatan"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="instansi">Instansi/Perusahaan</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi/Perusahaan" value="{{ $laporanGratifikasi->instansi }}" readonly>
                                    <div class="invalid-feedback" id="invalid-instansi"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kronologis_kejadian">Kronologis Kejadian</label>
                                <textarea class="form-control" id="kronologis_kejadian" name="kronologis_kejadian" placeholder="Kronologis Kejadian" value="{{ $laporanGratifikasi->kronologis_kejadian }}" readonly>{{ $laporanGratifikasi->kronologis_kejadian }}</textarea>
                                    <div class="invalid-feedback" id="invalid-kronologis_kejadian"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pelaporan">Tanggal Kejadian</label>
                                    <input type="date" class="form-control" id="tanggal_pelaporan" name="tanggal_pelaporan" placeholder="Tanggal Pelaporan" value="{{ $laporanGratifikasi->tanggal_pelaporan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_pelaporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kejadian">Tanggal Pelaporan</label>
                                    <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" placeholder="Tanggal Kejadian" value="{{ $laporanGratifikasi->tanggal_kejadian }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_kejadian"></div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_gratifikasi">Jenis Hadiah & Sumbangan</label>
                                <textarea class="form-control" id="jenis_gratifikasi" name="jenis_gratifikasi" placeholder="Kronologis Kejadian" value="{{ $showAnalisis == null ? 'Masih dalam Investigasi' : $showAnalisis->jenis_gratifikasi }}" readonly>{{ $showAnalisis == null ? 'Masih dalam Investigasi' : $showAnalisis->jenis_gratifikasi }}</textarea>
                                    <div class="invalid-feedback" id="invalid-jenis_gratifikasi"></div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nilai_gratifikasi">Nilai Hadiah & Sumbangan yang diterima</label>
                                    <textarea class="form-control" id="nilai_gratifikasi" name="nilai_gratifikasi" placeholder="Nilai Hadiah & Sumbangan yang diterima" value="{{ $showAnalisis == null ? 'Masih dalam Investigasi' : $showAnalisis->nilai_gratifikasi  }}" readonly>{{ $showAnalisis == null ? 'Masih dalam Investigasi' : $showAnalisis->nilai_gratifikasi  }}</textarea>
                                    <div class="invalid-feedback" id="invalid-nilai_gratifikasi"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="frekuensi_pelapor">Frekuensi Pelapor menerima Hadiah & Sumbangan pada tahun ini</label>
                                    <textarea class="form-control" id="frekuensi_pelapor" name="frekuensi_pelapor" placeholder="Frekuensi Pelapor menerima Hadiah & Sumbangan pada tahun ini" value="{{ $showAnalisis == null ? 'Masih dalam Investigasi' : $showAnalisis->frekuensi_pelapor  }}" readonly>{{ $showAnalisis == null ? 'Masih dalam Investigasi' : $showAnalisis->frekuensi_pelapor  }}</textarea>
                                    <div class="invalid-feedback" id="invalid-frekuensi_pelapor"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tujuan">Tujuan Pemberian hadiah & sumbangan oleh pemberi</label>
                                    <textarea class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan dari pemberian hadiah" value="{{ $showAnalisis == null ? 'Masih dalam Investigasi' : $showAnalisis->tujuan  }}" readonly>{{ $showAnalisis == null ? 'Masih dalam Investigasi' : $showAnalisis->tujuan  }}</textarea>
                                    <div class="invalid-feedback" id="invalid-tujuan"></div>
                            </div>
                            <div class="form-group">
                                <label for="rekomendasi_tindak_lanjut">Rekomendasi tindaklanjut bagi pelapor</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="rekomendasi_tindak_lanjut" name="rekomendasi_tindak_lanjut" placeholder="Tanggal Pelaporan" value="{{ $showAnalisis === '0' ? 'Dikembalikan' : 'Diterima' }}" readonly>
                                </div>
                            </div>
                            <input type="hidden" id="id_pelapor" name="id_pelapor" value="{{ $laporanGratifikasi->id_pelapor }}">
                            <input type="hidden" id="deskripsi_status" name="deskripsi_status" value="{{ $laporanGratifikasi->deskripsi_status }}">
                            <div class="form-group">
                            <a href="{{ route('analisisLaporan.gratifikasi.view') }}" class="btn btn-primary float-right margin-right ">Kembali</a>
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
    // $(document).ready(function() {
    //     const id = {{ $id }}
    //     $('#status').html('Loading');
    //     const url = '{{ route('actions.gratifikasi.show','_rowid') }}';
    //     $.ajax({
    //         type: 'GET',
    //         url: url.replace('_rowid',id),
    //         success: function (data){
    //             console.log(data.data.status);
    //             if (data.data.status != null) {
    //                 if (data.data.status == 0) {
    //                     $('#status').html( 'Ditolak' );
    //                     console.log('tolak');
    //                 } else {
    //                     $('#status').html( 'Diterima' );
    //                     console.log('terima');
    //                 }
    //             } else {
    //                 $('#status').html('Data Baru Masuk');
    //                 console.log('baru');
    //             }
    //         }
    //     });
    // });
</script>
@endsection
