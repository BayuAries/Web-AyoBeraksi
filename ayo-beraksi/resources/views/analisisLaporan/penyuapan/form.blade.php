@extends('layouts.main')
@section('container')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('analisisLaporan.penyuapan.index') }}">Analisis Laporan Penyuapan</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $detailAnalisis == null  ? 'Tambah' : 'Ubah' }} Laporan Penyuapan</li>
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
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_terlapor">Nama Terlapor</label>
                                    <input type="text" class="form-control" id="nama_terlapor" name="nama_terlapor" placeholder="Nama Terlapor" value="{{ $showAnalisisPenyuapan->nama_terlapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_terlapor"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ $showAnalisisPenyuapan->jabatan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-jabatan"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="instansi">Asal Perusahaan</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" value="{{ $showAnalisisPenyuapan->instansi }}" readonly>
                                    <div class="invalid-feedback" id="invalid-instansi"></div>
                            </div>
                            <div class="form-group">
                                <label for="kasus_suap">Kasus Penyuapan</label>
                                    <textarea class="form-control" id="kasus_suap" name="kasus_suap" placeholder="Kasus Suap" value="{{ $showAnalisisPenyuapan->kasus_suap }}" readonly>{{ $showAnalisisPenyuapan->kasus_suap }}</textarea>
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
                                <label for="tanggal_kejadian">Tanggal Kejadian</label>
                                    <input type="date" class="form-control" data-date-format="DD MMMM YYYY" id="tanggal_kejadian" name="tanggal_kejadian" placeholder="Tanggal Kejadian" value="{{ $showAnalisisPenyuapan->tanggal_kejadian }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_kejadian"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pelaporan">Tanggal Pelaporan</label>
                                    <input type="date" class="form-control" data-date-format="DD MMMM YYYY" id="tanggal_pelaporan" name="tanggal_pelaporan" placeholder="Waktu Selesai Karyawan" value="{{ $showAnalisisPenyuapan->tanggal_pelaporan }}" readonly>
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
                            <div class="form-group">
                                <label for="jabatan_pelapor">Jabatan Pelapor</label>
                                    <input type="text" class="form-control" id="jabatan_pelapor" name="jabatan_pelapor" placeholder="Jabatan Pelapor" value="{{ $showAnalisisPenyuapan->jabatan_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-jabatan_pelapor"></div>
                            </div>
                            <div class="form-group">
                                <label for="instansi_pelapor">Asal Perusahaan Pelapor</label>
                                    <input type="text" class="form-control" id="instansi_pelapor" name="instansi_pelapor" placeholder="Instansi Pelapor" value="{{ $showAnalisisPenyuapan->instansi_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-instansi_pelapor"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->
    </div>
</div>

<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 70%;">
    <div class="card-body">
        <section class="hk-sec-wrapper">
            <h5 class="card-title border-bottom">{{ $detailAnalisis == null  ? 'Tambah' : 'Ubah' }} Analisis Laporan Penyuapan</h5>
            <div class="row">
                <div class="col-md-12 col-sm">
                    <form class="needs-validation" enctype="multipart/form-data" novalidate id="{{ $detailAnalisis == null ? 'AddLaporan' : 'EditLaporan'}}">
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="{{ $detailAnalisis == null ? null : 'PUT'}}">
                        <div class="form-group">
                            <label for="hasil_investigasi">Hasil Investigasi</label>
                            <textarea class="form-control" id="hasil_investigasi" name="hasil_investigasi" placeholder="Hasil Investigasi" value="{{ $detailAnalisis == null ? '' : $detailAnalisis->hasil_investigasi  }}" required>{{ $detailAnalisis == null ? '' : $detailAnalisis->hasil_investigasi  }}</textarea>
                            <div class="invalid-feedback" id="invalid-hasil_investigasi"></div>
                        </div>
                        <div class="form-group">
                            <label for="kesimpulan">Kesimpulan Tim Investigasi</label>
                            <textarea class="form-control" id="kesimpulan" name="kesimpulan" placeholder="Kesimpulan Tim Investigasi" value="{{ $detailAnalisis == null ? '' : $detailAnalisis->kesimpulan  }}" required">{{ $detailAnalisis == null ? '' : $detailAnalisis->kesimpulan  }}</textarea>
                            <div class="invalid-feedback" id="invalid-kesimpulan"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-{{$detailAnalisis == null ? 'success' : 'warning'}} float-right" type="submit" id="btnSubmit">{{$detailAnalisis == null ? 'Simpan' : 'Edit'}}</button>
                        <a href="{{ route('analisisLaporan.penyuapan.index') }}" class="btn btn-primary float-right mr-3">Kembali</a>
                        </div>
                        <input type="hidden" value="{{ session('message') }}" id="index_message">
                        <input type="hidden" name="id_pengguna" id="id_pengguna" value="{{ $showAnalisisPenyuapan->id_pelapor }}" >
                        <input type="hidden" name="id_penyuapan" id="id_penyuapan" value="{{ $showAnalisisPenyuapan->id }}" >
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- /Container -->
@endsection
@section('script')
    <script>
        $(function() {
            const detail = '{{ $detailAnalisis === null ? '' : 1 }}';
            if (detail === '1') {
                const id = '{{ $detailAnalisis === null ? '' : $detailAnalisis->id  }}';
                const url = '{{ route('actions.analisis.penyuapan.update','_rowid') }}';
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
                                        window.location = '{{ route('analisisLaporan.penyuapan.index') }}'
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
                const url = '{{ route('actions.analisis.penyuapan.store') }}';
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
                                },
                                success: function(data){
                                    console.log(data)
                                    Swal.fire({ title: 'Data berhasil disimpan!', icon: 'success', showConfirmButton: false, timer: 1500 }).then((data) => {
                                        window.location = '{{ route('analisisLaporan.penyuapan.index') }}'
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
