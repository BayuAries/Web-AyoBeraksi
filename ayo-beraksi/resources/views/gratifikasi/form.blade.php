@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('laporan.gratifikasi.index') }}">Laporan Gratifikasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $showGratifikasi->status != null ? 'Ubah': ''}} Pengajuan Laporan Gratifikasi</li>
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
                                    <input type="text" class="form-control" id="no_laporan" name="no_laporan" placeholder="Nomor Laporan" value="{{ $showGratifikasi->no_laporan === null ? "Belum ada": $showGratifikasi->no_laporan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-no_laporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Pelapor" value="{{ $showGratifikasi->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                            </div>
                            <div class="form-group">
                                <label for="nama_pelapor">Nama Pengirim</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Pengirim" value="{{ $showGratifikasi->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_terlapor">Nama Terlapor</label>
                                    <input type="text" class="form-control" id="nama_terlapor" name="nama_terlapor" placeholder="Nama" value="{{ $showGratifikasi->nama_terlapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_terlapor"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ $showGratifikasi->jabatan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-jabatan"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="instansi">Instansi/Perusahaan</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi/Perusahaan" value="{{ $showGratifikasi->instansi }}" readonly>
                                    <div class="invalid-feedback" id="invalid-instansi"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kronologis_kejadian">Kronologis Kejadian</label>
                                    <input type="text" class="form-control" id="kronologis_kejadian" name="kronologis_kejadian" placeholder="Kronologis Kejadian" value="{{ $showGratifikasi->kronologis_kejadian }}" readonly>
                                    <div class="invalid-feedback" id="invalid-kronologis_kejadian"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pelaporan">Tanggal Kejadian</label>
                                    <input type="date" class="form-control" id="tanggal_pelaporan" name="tanggal_pelaporan" placeholder="Tanggal Pelaporan" value="{{ $showGratifikasi->tanggal_pelaporan }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_pelaporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kejadian">Tanggal Pelaporan</label>
                                    <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" placeholder="Tanggal Kejadian" value="{{ $showGratifikasi->tanggal_kejadian }}" readonly>
                                    <div class="invalid-feedback" id="invalid-tanggal_kejadian"></div>
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
            <h5 class="card-title border-bottom">{{ $showGratifikasi->status != null ? 'Ubah': 'Tambah'}} Laporan Pengaduan</h5>
            <div class="row">
                <div class="col-md-12 col-sm">
                    <form class="needs-validation" enctype="multipart/form-data" novalidate id="EditLaporan">
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        <h6 class="judul-hasil-analisa">Hasil Analisa Tim Kepatuhan : </h6>
                        <div class="form-group">
                            <div class="form-group">
                                @if (isset($id))
                                    @if ($showGratifikasi->status != null)
                                        @if ($showGratifikasi->status == '1')
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked required>
                                            <label class="form-check-label" for="status1">Diterima</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status0" value="0" required>
                                            <label class="form-check-label" for="status0">Ditolak</label>
                                        </div>
                                        @else
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status1" value="1" required>
                                            <label class="form-check-label" for="status1">Diterima</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status0" value="0" checked required>
                                            <label class="form-check-label" for="status0">Ditolak</label>
                                        </div>
                                        @endif
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
                        <div class="form-group" id="input_alasan" >
                            <label for="deskripsi_status">Alasan</label>
                                <textarea class="form-control" id="deskripsi_status" name="deskripsi_status" placeholder="Masukkan alasan anda." value="{{ $showGratifikasi->deskripsi_status }}" required>{{ $showGratifikasi->deskripsi_status }}</textarea>
                                <div class="invalid-feedback" id="invalid-deskripsi_status"></div>
                        </div>
                        <div class="form-group" id="input_tindaklanjut" >
                            <label for="tindaklanjut">Tindaklanjut</label>
                                <textarea class="form-control" id="tindaklanjut" name="tindaklanjut" placeholder="Masukkan tindaklanjut anda." value="{{ $showGratifikasi->tindaklanjut }}" required>{{ $showGratifikasi->tindaklanjut }}</textarea>
                                <div class="invalid-feedback" id="invalid-tindaklanjut"></div>
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
                            <button class="btn btn-{{ $showGratifikasi->status != null ? 'warning': 'success'}} float-right" type="submit" id="btnSubmit">{{ $showGratifikasi->status != null ? 'Ubah': 'Simpan'}}</button>
                        <a href="{{ route('laporan.gratifikasi.index') }}" class="btn btn-primary float-right mr-3">Kembali</a>
                        </div>
                        <input type="hidden" id="id_pelapor" name="id_pelapor" value="{{ $showGratifikasi->id_pelapor }}">
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
            // console.log('{{ count($detailTim) }}');
            const id = '{{ isset($id) ? $id : 'zonk' }}';
            const url = '{{ route('actions.gratifikasi.updateStatus','_rowid') }}';
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
                                    window.location = '{{ route('laporan.gratifikasi.index') }}'
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
                    }
                });

                $('#status0').change(function () {
                    if($(this).is(":checked")) {
                        $("#input_anggota").hide();
                    }
                });

                if($('#status1').is(":checked")) {
                    $("#input_anggota").show();
                }

                if($('#status0').is(":checked")) {
                    $("#input_anggota").hide();
                }
            });
        });
    </script>
@endsection
