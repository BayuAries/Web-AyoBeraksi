@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('laporan.pengaduan.index') }}">Laporan Pengaduan</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $showPengaduan->status != null ? 'Ubah': 'Tambah'}} Laporan Pengaduan</li>
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
                                    <label for="nama_ketua">Kepada</label>
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
            <h5 class="card-title border-bottom">{{ $showPengaduan->status != null ? 'Ubah': 'Tambah'}} Laporan Pengaduan</h5>
            <div class="row">
                <div class="col-md-12 col-sm">
                    <form class="needs-validation" enctype="multipart/form-data" novalidate id="EditLaporan">
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="status">Status Laporan</label>
                            <div class="form-group">
                                @if ($showPengaduan->status != null)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status1" {{ $showPengaduan->status === '1' ? 'checked' : '' }} value="1" required>
                                        <label class="form-check-label" for="status1">Diterima</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status0" {{ $showPengaduan->status === '0' ? 'checked' : '' }} value="0" required>
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
                                <textarea class="form-control" id="deskripsi_status" name="deskripsi_status" placeholder="Masukkan alasan anda." value="{{ $showPengaduan->deskripsi_status }}" required>{{ $showPengaduan->deskripsi_status }}</textarea>
                                <div class="invalid-deskripsi_status" id="invalid-deskripsi_status"></div>
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
                            <button class="btn btn-{{ $showPengaduan->status != null ? 'warning': 'success'}} float-right" type="submit" id="btnSubmit">{{ $showPengaduan->status != null ? 'Ubah': 'Simpan'}}</button>
                        <a href="{{ route('laporan.pengaduan.index') }}" class="btn btn-primary float-right mr-3">Kembali</a>
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
            const url = '{{ route('actions.pengaduan.updateStatus','_rowid') }}';
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
                            url: url.replace('_rowid',id),
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
                                    window.location = '{{ route('laporan.pengaduan.index') }}'
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
