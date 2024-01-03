@extends('layouts.main')
@section('container')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $detailLogbook->uraian_kejadian == null ? 'Tambah' : 'Ubah'}} Analisis Laporan Penyuapan</li>
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
                            <input class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Nama Pelapor" value="{{ $showPenyuapan == null ? '' : $showPenyuapan->nama_pelapor }}" required readonly>
                            <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                        </div>
                        <div class="form-group">
                            <label for="nama_terlapor">Nama Terlapor</label>
                            <input class="form-control" id="nama_terlapor" name="nama_terlapor" placeholder="Nama Terlapor" value="{{ $showPenyuapan == null ? '' : $showPenyuapan->nama_terlapor }}" required readonly>
                            <div class="invalid-feedback" id="invalid-nama_terlapor"></div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kejadian">Tanggal Kejadian</label>
                            <input class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" placeholder="Tanggal Kejadian" value="{{ $showPenyuapan == null ? '' : $showPenyuapan->tanggal_kejadian }}" required readonly>
                            <div class="invalid-feedback" id="invalid-tanggal_kejadian"></div>
                        </div>
                        <div class="form-group">
                            <label for="tempat_kejadian">Tempat Kejadian</label>
                            <input class="form-control" id="tempat_kejadian" name="tempat_kejadian" placeholder="Tempat Kejadian" value="{{ $showPenyuapan == null ? '' : $showPenyuapan->lokasi }}" required readonly>
                            <div class="invalid-feedback" id="invalid-tempat_kejadian"></div>
                        </div>
                        <div class="form-group">
                            <label for="uraian_kejadian">Uraian Kejadian</label>
                            <textarea class="form-control" id="uraian_kejadian" name="uraian_kejadian" placeholder="Uraian Kejadian" value="{{ $detailLogbook == null ? '' : $detailLogbook->uraian_kejadian }}" required>{{ $detailLogbook == null ? '' : $detailLogbook->uraian_kejadian }}</textarea>
                            <div class="invalid-feedback" id="invalid-uraian_kejadian"></div>
                        </div>
                        <div class="form-group">
                            <label for="saksi">Saksi</label>
                            <textarea class="form-control" id="saksi" name="saksi" placeholder="Saksi 1, Saksi 2, ...." value="{{ $detailLogbook == null ? '' : $detailLogbook->saksi }}" required>{{ $detailLogbook == null ? '' : $detailLogbook->saksi }}</textarea>
                            <div class="invalid-feedback" id="invalid-saksi"></div>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-{{$detailLogbook->uraian_kejadian == null ? 'success' : 'warning'}} float-right" type="submit" id="btnSubmit">{{$detailLogbook->uraian_kejadian == null ? 'Simpan' : 'Ubah'}}</button>
                        <a href="{{ route('logbook.penyuapan.index') }}" class="btn btn-primary float-right mr-3">Kembali</a>
                        </div>
                        <input type="hidden" value="{{ session('message') }}" id="index_message">
                        <input type="hidden" name="id_penyuapan" id="id_penyuapan" value="{{ $showPenyuapan->id }}" >
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
            const url = '{{ route('actions.logbook.penyuapan.update','_rowid') }}';
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
                                    window.location = '{{ route('logbook.penyuapan.index') }}'
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
