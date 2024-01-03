@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('analisisLaporan.gratifikasi.index') }}">Analisis Laporan Gratifikasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $detailAnalisis == null  ? 'Tambah' : 'Ubah' }} Analisis Laporan Gratifikasi</li>
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
                    <h5 class="card-title border-bottom">Detail Laporan Gratifikasi</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm">
                            <div class="form-group">
                                <label for="no_laporan">Nomor Laporan</label>
                                    <input type="text" class="form-control" id="no_laporan" name="no_laporan" placeholder="Nomor Laporan" value="{{ $showAnalisisGratifikasi->no_laporan === null ? "Belum ada": $showAnalisisGratifikasi->no_laporan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-no_laporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Pelapor" value="{{ $showAnalisisGratifikasi->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelapor">Nama Pengirim</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Pengirim" value="{{ $showAnalisisGratifikasi->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_terlapor">Nama Terlapor</label>
                                    <input type="text" class="form-control" id="nama_terlapor" name="nama_terlapor" placeholder="Nama" value="{{ $showAnalisisGratifikasi->nama_terlapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_terlapor"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ $showAnalisisGratifikasi->jabatan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-jabatan"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="instansi">Instansi/Perusahaan</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi/Perusahaan" value="{{ $showAnalisisGratifikasi->instansi }}" readonly>
                                    <div class="invalid-feedback" id="invalid-instansi"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kronologis_kejadian">Kronologis Kejadian</label>
                                    <input type="text" class="form-control" id="kronologis_kejadian" name="kronologis_kejadian" placeholder="Kronologis Kejadian" value="{{ $showAnalisisGratifikasi->kronologis_kejadian }}" readonly>
                                    <div class="invalid-feedback" id="invalid-kronologis_kejadian"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pelaporan">Tanggal Kejadian</label>
                                    <input type="date" class="form-control" id="tanggal_pelaporan" name="tanggal_pelaporan" placeholder="Tanggal Pelaporan" value="{{ $showAnalisisGratifikasi->tanggal_pelaporan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_pelaporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kejadian">Tanggal Pelaporan</label>
                                    <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" placeholder="Tanggal Kejadian" value="{{ $showAnalisisGratifikasi->tanggal_kejadian }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_kejadian"></div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_status">Alasan</label>
                                    <textarea class="form-control" id="deskripsi_status" name="deskripsi_status" placeholder="Alasan" value="{{ $showAnalisisGratifikasi->deskripsi_status }}" readonly>{{ $showAnalisisGratifikasi->deskripsi_status }}</textarea>
                                    <div class="invalid-feedback" id="invalid-deskripsi_status"></div>
                            </div>
                            <div class="form-group">
                                <label for="tindaklanjut">Tindaklanjut</label>
                                    <textarea class="form-control" id="tindaklanjut" name="tindaklanjut" placeholder="Tindaklanjut" value="{{ $showAnalisisGratifikasi->tindaklanjut }}" readonly>{{ $showAnalisisGratifikasi->tindaklanjut }}</textarea>
                                    <div class="invalid-feedback" id="invalid-tindaklanjut"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
</div>

<form class="needs-validation" enctype="multipart/form-data" novalidate id="{{ $detailAnalisis == null ? 'AddLaporan' : 'EditLaporan'}}">
    <div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 70%;">
        <div class="card-body">
            <section class="hk-sec-wrapper">
                <h5 class="card-title border-bottom">{{ $detailAnalisis == null  ? 'Tambah' : 'Ubah' }} Analisis Laporan Gratifikasi</h5>
                <div class="row">
                    <div class="col-md-12 col-sm">
                        <div class="form-row mb-3">
                            <div class="col-md-12 mb-10">
                                <label for="jenis_gratifikasi">Jenis Hadiah & Sumbangan</label>
                                <textarea class="form-control" id="jenis_gratifikasi" name="jenis_gratifikasi" placeholder="Jenis Hadiah & Sumbangan" value="{{ $detailAnalisis == null ? '' : $detailAnalisis->jenis_gratifikasi  }}" required>{{ $detailAnalisis == null ? '' : $detailAnalisis->jenis_gratifikasi  }}</textarea>
                                <div class="invalid-feedback" id="invalid-jenis_gratifikasi"></div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-12 mb-10">
                                <label for="nilai_gratifikasi">Nilai Hadiah & Sumbangan yang diterima</label>
                                <textarea class="form-control" id="nilai_gratifikasi" name="nilai_gratifikasi" placeholder="Nilai Hadiah & Sumbangan yang diterima" value="{{ $detailAnalisis == null ? '' : $detailAnalisis->nilai_gratifikasi  }}" required>{{ $detailAnalisis == null ? '' : $detailAnalisis->nilai_gratifikasi  }}</textarea>
                                <div class="invalid-feedback" id="invalid-nilai_gratifikasi"></div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-12 mb-10">
                                <label for="frekuensi_pelapor">Frekuensi Pelapor menerima Hadiah & Sumbangan pada tahun ini</label>
                                <textarea class="form-control" id="frekuensi_pelapor" name="frekuensi_pelapor" placeholder="Frekuensi Pelapor menerima Hadiah & Sumbangan pada tahun ini" value="{{ $detailAnalisis == null ? '' : $detailAnalisis->frekuensi_pelapor  }}" required>{{ $detailAnalisis == null ? '' : $detailAnalisis->frekuensi_pelapor  }}</textarea>
                                <div class="invalid-feedback" id="invalid-frekuensi_pelapor"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan Pemberian hadiah & sumbangan oleh pemberi</label>
                                <textarea class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan dari pemberian hadiah" value="{{ $detailAnalisis == null ? '' : $detailAnalisis->tujuan  }}" required>{{ $detailAnalisis == null ? '' : $detailAnalisis->tujuan  }}</textarea>
                                <div class="invalid-feedback" id="invalid-tujuan"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 70%;">
        <div class="card-body">
            <section class="hk-sec-wrapper">
                {{-- <h5 class="hk-sec-title">Detail Laporan Pengaduan</h5> --}}
                <div class="row">
                    <div class="col-md-12 col-sm">
                        <h5 class="card-title border-bottom">Kesimpulan</h5>
                        <div class="form-group">
                            <label for="status_batas">Apakah Hadiah & Sumbangan dibawah batas yang ditetapkan</label>
                            <div class="form-group">
                                @if ($detailAnalisis != null)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_batas" id="status_batas1" value="1" {{ $detailAnalisis->status_batas == '1' ? "checked" : ""  }} required>
                                        <label class="form-check-label" for="status_batas1">YA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_batas" id="status_batas0" value="0" {{ $detailAnalisis->status_batas == '0' ? "checked" : ""  }} required>
                                        <label class="form-check-label" for="status_batas0">TIDAK</label>
                                    </div>
                                @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_batas" id="status_batas1" value="1" required>
                                        <label class="form-check-label" for="status_batas1">YA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_batas" id="status_batas0" value="0" required>
                                        <label class="form-check-label" for="status_batas0">TIDAK</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status_frekuensi">Apakah frekuensi pemberian hadiah & sumbangan dibawah batas yang ditetapkan bagi pelapor</label>
                            <div class="form-group">
                                @if ($detailAnalisis != null)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_frekuensi" id="status_frekuensi1" value="1" {{ $detailAnalisis->status_frekuensi == '1' ? "checked" : ""  }} required>
                                        <label class="form-check-label" for="status_frekuensi1">YA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_frekuensi" id="status_frekuensi0" value="0" {{ $detailAnalisis->status_frekuensi == '0' ? "checked" : ""  }} required>
                                        <label class="form-check-label" for="status_frekuensi0">TIDAK</label>
                                    </div>
                                @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_frekuensi" id="status_frekuensi1" value="1" required>
                                        <label class="form-check-label" for="status_frekuensi1">YA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_frekuensi" id="status_frekuensi0" value="0" required>
                                        <label class="form-check-label" for="status_frekuensi0">TIDAK</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rekomendasi_tindak_lanjut">Rekomendasi tindaklanjut bagi pelapor</label>
                            <div class="form-group">
                                @if ( $detailAnalisis != null)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rekomendasi_tindak_lanjut" id="rekomendasi_tindak_lanjut1" value="1" {{ $detailAnalisis->rekomendasi_tindak_lanjut == '1' ? "checked" : ""  }} required>
                                        <label class="form-check-label" for="rekomendasi_tindak_lanjut1">DITERIMA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rekomendasi_tindak_lanjut" id="rekomendasi_tindak_lanjut0" value="0" {{ $detailAnalisis->rekomendasi_tindak_lanjut == '0' ? "checked" : ""  }} required>
                                        <label class="form-check-label" for="rekomendasi_tindak_lanjut0">DIKEMBALIKAN</label>
                                    </div>
                                @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rekomendasi_tindak_lanjut" id="rekomendasi_tindak_lanjut1" value="1" required>
                                        <label class="form-check-label" for="rekomendasi_tindak_lanjut1">DITERIMA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rekomendasi_tindak_lanjut" id="rekomendasi_tindak_lanjut0" value="0" required>
                                        <label class="form-check-label" for="rekomendasi_tindak_lanjut0">DIKEMBALIKAN</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div id="input_anggota" class="form-group-hide">
                            <label for="tim_kepatuhan">Tim Kepatuhan yang Hadir</label>
                            <div class="form-group">
                                <label for="ketua">Ketua</label>
                                <select class="single-selected" id="ketua" name="ketua" >
                                    <option value="">:: Pilih Ketua ::</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="anggota1">Anggota 1</label>
                                <select class="single-selected" id="anggota1" name="anggota1">
                                    <option value="">:: Pilih Anggota ::</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="anggota2">Anggota 2</label>
                                <select class="single-selected" id="anggota2" name="anggota2">
                                    <option value="">:: Pilih Anggota ::</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-{{$detailAnalisis == null ? 'success' : 'warning'}} float-right" type="submit" id="btnSubmit">{{$detailAnalisis == null ? 'Simpan' : 'Ubah'}}</button>
                        <a href="{{ route('analisisLaporan.gratifikasi.index') }}" class="btn btn-primary float-right mr-3">Kembali</a>
                        </div>
                        <input type="hidden" value="{{ session('message') }}" id="index_message">
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_gratifikasi" id="id_gratifikasi" value="{{ $showAnalisisGratifikasi->id }}" >
                        <input type="hidden" name="id_pengguna" id="id_pengguna" value="{{ $showAnalisisGratifikasi->id_pelapor }}" >
                        <input type="hidden" name="_method" value="{{ $detailAnalisis == null ? null : 'PUT'}}">
                    </div>
                </div>
            </section>
        </div>
    </div>
</form>
<!-- /Container -->

@endsection
@section('script')
    <script>
        $(function() {
            // const id = '{{ isset($id) ? $id : 'zonk' }}';
            const detail = '{{ $detailAnalisis === null ? '' : 1 }}';
            if (detail === '1') {
                const id = '{{ $detailAnalisis === null ? '' : $detailAnalisis->id  }}';
                const url = '{{ route('actions.analisis.gratifikasi.update','_rowid') }}';
                $('#EditLaporan').on('submit',function(e){
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah anda yakin untuk menyimpan perubahan?',
                        showDenyButton: true,
                        confirmButtonText: 'Simpan',
                        confirmButtonColor: '#38c172',
                        denyButtonText: 'Batalkan',
                    }).then((data) => {
                        if (data.isConfirmed) {
                            $.ajax({
                                type:'POST',
                                url: url.replace('_rowid', id),
                                data: new FormData(this),
                                dataType:'json',
                                processData:false,
                                cache:false,
                                contentType:false,
                                headers:{
                                    'X-CSRF-TOKEN': $('#_token').val(),
                                    '_method': 'PUT',
                                },
                                success: function(data){
                                    console.log(data)
                                    Swal.fire({ title: 'Data berhasil disimpan!', icon: 'success', showConfirmButton: false, timer: 1500 }).then((data) => {
                                        window.location = '{{ route('analisisLaporan.gratifikasi.index') }}'
                                    })
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire({ title: formatErrorMessage(xhr, error), icon: 'error',confirmButtonColor: '#dc3741' })
                                }
                            })
                        } else if (result.isDenied) {
                            Swal.fire({ title: 'Perubahan data tidak disimpan!', icon: 'info', confirmButtonColor: '#3490dc' })
                        }
                    })
                })
            } else {
                const url = '{{ route('actions.analisis.gratifikasi.store') }}';
                $('#AddLaporan').on('submit',function(e){
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah anda yakin untuk menyimpan perubahan?',
                        showDenyButton: true,
                        confirmButtonText: 'Simpan',
                        confirmButtonColor: '#38c172',
                        denyButtonText: 'Batalkan',
                    }).then((data) => {
                        if (data.isConfirmed) {
                            $.ajax({
                                type:'POST',
                                url: url,
                                data: new FormData(this),
                                dataType:'json',
                                processData:false,
                                cache:false,
                                contentType:false,
                                headers:{
                                    'X-CSRF-TOKEN': $('#_token').val(),
                                    // '_method': 'PUT',
                                },
                                success: function(data){
                                    console.log(data)
                                    Swal.fire({ title: 'Data berhasil disimpan!', icon: 'success', showConfirmButton: false, timer: 2000 }).then((data) => {
                                        window.location = '{{ route('analisisLaporan.gratifikasi.index') }}'
                                    })
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire({ title: formatErrorMessage(xhr, error), icon: 'error',confirmButtonColor: '#dc3741' })
                                }
                            })
                        } else if (result.isDenied) {
                            Swal.fire({ title: 'Perubahan data tidak disimpan!', icon: 'info', confirmButtonColor: '#3490dc' })
                        }
                    })
                })
            }
        });
    </script>
@endsection
