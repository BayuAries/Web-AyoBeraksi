@extends('layouts.main')
@section('container')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $detailLogbook->hasil_analisis == null  ? 'Tambah' : 'Ubah' }} Logbook Laporan Gratifikasi</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 70%;">
    <div class="card-body">
        <section class="hk-sec-wrapper">
            {{-- <h5 class="hk-sec-title">Detail Laporan Pengaduan</h5> --}}
            <div class="row">
                <div class="col-md-12 col-sm">
                    <form class="needs-validation" enctype="multipart/form-data" novalidate id="EditLaporan">
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="nama_pelapor">Nama Pelapor</label>
                            <input class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Nama Pelapor" value="{{ $showGratifikasi == null ? '' : $showGratifikasi->nama_pelapor }}" required readonly>
                            <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pelaporan">Tanggal Pelaporan</label>
                            <input class="form-control" id="tanggal_pelaporan" name="tanggal_pelaporan" placeholder="Tanggal Pelaporan" value="{{ $showGratifikasi == null ? '' : $showGratifikasi->tanggal_pelaporan }}" required readonly>
                            <div class="invalid-feedback" id="invalid-tanggal_pelaporan"></div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_gratifikasi">Jenis Hadiah, Sumbangan & Keuntungan Serupa</label>
                            <input class="form-control" id="jenis_gratifikasi" name="jenis_gratifikasi" placeholder="Jenis Hadiah, Sumbangan & Keuntungan Serupa" value="{{ $detailAnalisis == null ? '' : $detailAnalisis->jenis_gratifikasi }}" required readonly>
                            <div class="invalid-feedback" id="invalid-jenis_gratifikasi"></div>
                        </div>
                        <div class="form-group">
                            <label for="nama_terlapor">Pemberian Hadiah, Sumbangan & Keuntungan Serupa</label>
                            <input class="form-control" id="nama_terlapor" name="nama_terlapor" placeholder="Tempat Kejadian" value="{{ $showGratifikasi == null ? '' : $showGratifikasi->nama_terlapor }}" required readonly>
                            <div class="invalid-feedback" id="invalid-nama_terlapor"></div>
                        </div>
                        <div class="form-group">
                            <label for="hasil_analisis">Hasil Analisis Tim Fungsi Kepatuhan</label>
                            <div class="form-group">
                                @if ($detailLogbook != null)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hasil_analisis" id="hasil_analisis1" value="1" {{ $detailLogbook->hasil_analisis === "1" ? 'checked' : ''}} required>
                                        <label class="form-check-label" for="hasil_analisis1">Diterima</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hasil_analisis" id="hasil_analisis0" value="0" {{ $detailLogbook->hasil_analisis === "0" ? 'checked' : ''}} required>
                                        <label class="form-check-label" for="hasil_analisis0">Dikembalikan</label>
                                    </div>
                                @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hasil_analisis" id="hasil_analisis1" value="1" required>
                                        <label class="form-check-label" for="hasil_analisis1">Diterima</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hasil_analisis" id="hasil_analisis0" value="0" required>
                                        <label class="form-check-label" for="hasil_analisis0">Dikembalikan</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ $detailLogbook != null ? $detailLogbook->keterangan : '' }}" required>{{ $detailLogbook != null ? $detailLogbook->keterangan : '' }}</textarea>
                            <div class="invalid-feedback" id="invalid-keterangan"></div>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-{{$detailLogbook->hasil_analisis == null ? 'success' : 'warning'}} float-right" type="submit" id="btnSubmit">{{$detailLogbook->hasil_analisis == null ? 'Simpan' : 'Ubah'}}</button>
                        <a href="{{ route('logbook.gratifikasi.index') }}" class="btn btn-primary float-right mr-3">Kembali</a>
                        </div>
                        <input type="hidden" value="{{ session('message') }}" id="index_message">
                        <input type="hidden" name="id_gratifikasi" id="id_gratifikasi" value="{{ $showGratifikasi->id }}">
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
            const id = '{{ $detailLogbook === null ? '' : $detailLogbook->id  }}';
            const url = '{{ route('actions.logbook.gratifikasi.update','_rowid') }}';
            $('#EditLaporan').on('submit',function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin untuk menyimpan perubahan?',
                    showDenyButton: true,
                    confirmButtonText: 'Simpan',
                    confirmButtonColor: '#38c172',
                    denyButtonText: 'Batalkan',
                }).then((result) => {
                    if (result.isConfirmed) {
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
                                    window.location = '{{ route('logbook.gratifikasi.index') }}'
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

        });
    </script>
@endsection
