@extends('layouts.main')
@section('container')

<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('laporan.penyuapan.index') }}">Laporan Penyuapan</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $showPenyuapan->status != null ? 'Ubah' : 'Tambah' }} Laporan Penyuapan</li>
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
                                    <input type="text" class="form-control" id="nama_terlapor" name="nama_terlapor" placeholder="Nama Terlapor" value="{{ $showPenyuapan->nama_terlapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_terlapor"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ $showPenyuapan->jabatan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-jabatan"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="instansi">Asal Perusahaan</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi" value="{{ $showPenyuapan->instansi }}" readonly>
                                    <div class="invalid-feedback" id="invalid-instansi"></div>
                            </div>
                            <div class="form-group">
                                <label for="kasus_suap">Kasus Penyuapan</label>
                                    <textarea class="form-control" id="kasus_suap" name="kasus_suap" placeholder="Kasus Penyuapan" value="{{ $showPenyuapan->kasus_suap }}" readonly>{{ $showPenyuapan->kasus_suap }}</textarea>
                                    <div class="invalid-feedback" id="invalid-kasus_suap"></div>
                            </div>
                            <div class="form-group">
                                <label for="nilai_suap">Nilai Suap</label>
                                    <input type="text" class="form-control" id="nilai_suap" name="nilai_suap" placeholder="Nilai Suap" value="{{ $showPenyuapan->nilai_suap != null ? 'Rp. ' . number_format($showPenyuapan->nilai_suap) : 'Nilai Tidak diketahui' }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nilai_suap"></div>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi Kejadian</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" value="{{ $showPenyuapan->lokasi }}" readonly>
                                    <div class="invalid-feedback" id="invalid-lokasi"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kejadian">Tanggal Kejadian</label>
                                    <input type="date" class="form-control" data-date-format="DD MMMM YYYY" id="tanggal_kejadian" name="tanggal_kejadian" placeholder="Tanggal Kejadian" value="{{ $showPenyuapan->tanggal_kejadian }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_kejadian"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pelaporan">Tanggal Pelaporan</label>
                                    <input type="date" class="form-control" data-date-format="DD MMMM YYYY" id="tanggal_pelaporan" name="tanggal_pelaporan" placeholder="Tanggal Pelaporan" value="{{ $showPenyuapan->tanggal_pelaporan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_pelaporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="kronologis_kejadian">Kronologis</label>
                                    <textarea class="form-control" id="kronologis_kejadian" name="kronologis_kejadian" placeholder="Kronologis Kejadian" value="{{ $showPenyuapan->kronologis_kejadian }}" readonly>{{ $showPenyuapan->kronologis_kejadian }}</textarea>
                                    <div class="invalid-feedback" id="invalid-kronologis_kejadian"></div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Nama Pelapor" value="{{ $showPenyuapan->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                            </div>
                            <div class="form-group">
                                <label for="jabatan_pelapor">Jabatan Pelapor</label>
                                    <input type="text" class="form-control" id="jabatan_pelapor" name="jabatan_pelapor" placeholder="Jabatan Pelapor" value="{{ $showPenyuapan->jabatan_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-jabatan_pelapor"></div>
                            </div>
                            <div class="form-group">
                                <label for="instansi_pelapor">Asal Perusahaan Pelapor</label>
                                    <input type="text" class="form-control" id="instansi_pelapor" name="instansi_pelapor" placeholder="Instansi Pelapor" value="{{ $showPenyuapan->instansi_pelapor }}" readonly>
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
            <h5 class="card-title border-bottom">{{ $showPenyuapan->status != null ? 'Ubah' : 'Tambah' }} Laporan Penyuapan</h5>
            <div class="row">
                <div class="col-md-12 col-sm">
                    <form class="needs-validation" enctype="multipart/form-data" id="EditLaporan" novalidate>
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="status">Status Laporan</label>
                            <div class="form-group">
                                @if ($showPenyuapan->status != null)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{ $showPenyuapan->status == '1' ? "checked" : ""  }} required>
                                        <label class="form-check-label" for="status1">Diterima</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status0" value="0" {{ $showPenyuapan->status == '0' ? "checked" : ""  }} required>
                                        <label class="form-check-label" for="status0">Ditolak</label>
                                    </div>
                                @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status1" value="1" required>
                                    <label class="form-check-label" for="status1">Diterima</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status0" value="0" required>
                                    <label class="form-check-label" for="status0">Ditolak</label>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group-hide" id="input_alasan" >
                            <label for="deskripsi_status">Alasan</label>
                                <textarea class="form-control" id="deskripsi_status" name="deskripsi_status" placeholder="Masukkan alasan anda."  required>{{ $showPenyuapan->deskripsi_status }}</textarea>
                                <div class="invalid-feedback" id="invalid-deskripsi_status"></div>
                        </div>
                        <div id="input_anggota" class="form-group-hide">
                            <div class="form-group">
                                <label for="ketua">Ketua</label>
                                <select class="single-selected" id="ketua" name="ketua" required>
                                    <option value="">:: Pilih Ketua ::</option>
                                    @if (count($detailTim) != 0)
                                        @foreach ($tim_kepatuhan as $row)
                                            <option value="{{ $row->id }}" {{ $detailTim[0]->id_anggota == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($tim_kepatuhan as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="anggota1">Anggota 1</label>
                                <select class="single-selected" id="anggota1" name="anggota1" required>
                                    <option value="">:: Pilih Anggota ::</option>
                                    @if (count($detailTim) != 0)
                                        @foreach ($tim_kepatuhan as $row)
                                            <option value="{{ $row->id }}" {{ $detailTim[1]->id_anggota == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($tim_kepatuhan as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="anggota2">Anggota 2</label>
                                <select class="single-selected" id="anggota2" name="anggota2" required>
                                    <option value="">:: Pilih Anggota ::</option>
                                    @if (count($detailTim) != 0)
                                        @foreach ($tim_kepatuhan as $row)
                                            <option value="{{ $row->id }}" {{ $detailTim[2]->id_anggota == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($tim_kepatuhan as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-{{ $showPenyuapan->status != null ? 'warning' : 'success' }} float-right" type="submit" id="btnSubmit">{{ $showPenyuapan->status != null ? 'Ubah' : 'Simpan' }}</button>
                        <a href="{{ route('laporan.penyuapan.index') }}" class="btn btn-primary float-right mr-3">Kembali</a>
                        </div>
                        <input type="hidden" value="{{ session('message') }}" id="index_message">
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
            const id = '{{ isset($id) ? $id : 'zonk' }}';
            const url = '{{ route('actions.penyuapan.updateStatus','_rowid') }}';
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
                                    window.location = '{{ route('laporan.penyuapan.index') }}'
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

            $(document).ready(function() {
                $('.single-selected').select2({
                    width: '100%'
                });

                $('#status1').change(function () {
                    if($(this).is(":checked")) {
                        $("#input_anggota").show();
                        $("#input_alasan").hide();
                    }
                });

                $('#status0').change(function () {
                    if($(this).is(":checked")) {
                        $("#input_anggota").hide();
                        $("#input_alasan").show();
                    }
                });

                if($('#status1').is(":checked")) {
                    $("#input_anggota").show();
                    $("#input_alasan").hide();
                }

                if($('#status0').is(":checked")) {
                    $("#input_anggota").hide();
                    $("#input_alasan").show();
                }
            });
        });

    </script>
@endsection
