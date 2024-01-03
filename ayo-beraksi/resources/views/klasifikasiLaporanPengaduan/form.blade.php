@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item"><a href="{{ route('klasifikasi.pengaduan.index') }}">Klasifikasi Laporan Pengaduan</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $detailKlasifikasi != null ? 'Ubah' : 'Tambah' }} Klasifikasi Laporan Pengaduan</li>
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
                                    <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" placeholder="Kepada" value="{{ $showKlasifikasiPengaduan->nama_ketua }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_ketua"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" placeholder="Nama Pelapor" value="{{ $showKlasifikasiPengaduan->nama_pelapor }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nama_pelapor"></div>
                                </div>
                            </div>
                            <input type="hidden" id="id_pelapor" name="id_pelapor" value="{{ $showKlasifikasiPengaduan->id_pelapor }}">
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="{{ $showKlasifikasiPengaduan->alamat }}" readonly>{{ $showKlasifikasiPengaduan->alamat }}</textarea>
                                    <div class="invalid-feedback" id="invalid-alamat"></div>
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-10">
                                    <label for="nik">No Induk Kependudukan</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="No Induk Kependudukan" value="{{ $showKlasifikasiPengaduan->nik }}" readonly>
                                    <div class="invalid-feedback" id="invalid-nik"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="uraian_laporan">Uraian Laporan</label>
                                    <textarea class="form-control" id="uraian_laporan" name="uraian_laporan" placeholder="Uraian Laporan" value="{{ $showKlasifikasiPengaduan->uraian_laporan }}" readonly>{{ $showKlasifikasiPengaduan->uraian_laporan }}</textarea>
                                    <div class="invalid-feedback" id="invalid-uraian_laporan"></div>
                            </div>
                            <div class="form-group">
                                <label for="saran_masukan">Saran dan Masukan</label>
                                    <textarea class="form-control" id="saran_masukan" name="saran_masukan" placeholder="Saran dan Masukan" value="{{ $showKlasifikasiPengaduan->saran_masukan }}" readonly>{{ $showKlasifikasiPengaduan->saran_masukan }}</textarea>
                                    <div class="invalid-feedback" id="invalid-saran_masukan"></div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                                    <input type="date" class="form-control" id="tanggal_pengaduan" name="tanggal_pengaduan" placeholder="Tanggal Pengaduan" value="{{ $showKlasifikasiPengaduan->tanggal_pengaduan }}" readonly>
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
            <h5 class="card-title border-bottom">{{ $detailKlasifikasi != null ? 'Ubah' : 'Tambah' }} Klasifikasi Laporan Pengaduan</h5>
            <div class="row">
                <div class="col-md-12 col-sm">
                    <form class="needs-validation" enctype="multipart/form-data" id="{{ $detailKlasifikasi == null ? 'AddLaporan' : 'EditLaporan' }}" novalidate>
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="{{ $detailKlasifikasi == null ? null : 'PUT' }}">
                        <div class="form-group">
                            <label for="klasifikasi" class="required">Klasifikasi</label>
                            <div class="form-group">
                                @if ($detailKlasifikasi != null)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="klasifikasi" id="klasifikasiA" value="A" {{ $detailKlasifikasi->klasifikasi === 'A' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="klasifikasiA">A</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="klasifikasi" id="klasifikasiB" value="B" {{ $detailKlasifikasi->klasifikasi === 'B' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="klasifikasiB">B</label>
                                    </div>
                                @else
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="klasifikasi" id="klasifikasiA" value="A" required>
                                    <label class="form-check-label" for="klasifikasiA">A</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="klasifikasi" id="klasifikasiB" value="B" required>
                                    <label class="form-check-label" for="klasifikasiB">B</label>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div id="keterangan_klasifikasi">
                            <h6>Keterangan Klasifikasi:</h6>
                            <p class="keterangan">Lingkari yang dipilih, ditulis dalam kolom yang tersedia</p>
                            <p class="deskripsi-keterangan">A: Laporan tidak berkadar pengawasan</p>
                            <p class="deskripsi-keterangan">B: Laporan berkadar pengawasan</p>
                        </div>
                        <div class="form-group-hide" id="check_kategori" >
                            <label for="kategori">Kategori</label>
                            <div class="form-group">
                                @if ($detailKlasifikasi != null)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="1" id="kategori1" {{ $detailKlasifikasi->kategori === '1' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="kategori1">
                                        1
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="2" id="kategori2" {{ $detailKlasifikasi->kategori === '2' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="kategori2">
                                        2
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="3" id="kategori3" {{ $detailKlasifikasi->kategori === '3' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="kategori3">
                                        3
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="4" id="kategori4" {{ $detailKlasifikasi->kategori === '4' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="kategori4">
                                        4
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="5" id="kategori5" {{ $detailKlasifikasi->kategori === '5' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="kategori5">
                                        5
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="6" id="kategori6" {{ $detailKlasifikasi->kategori === '6' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="kategori6">
                                        6
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="1" id="kategori1" required>
                                        <label class="form-check-label" for="kategori1">
                                        1
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="2" id="kategori2" required>
                                        <label class="form-check-label" for="kategori2">
                                        2
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="3" id="kategori3" required>
                                        <label class="form-check-label" for="kategori3">
                                        3
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="4" id="kategori4" required>
                                        <label class="form-check-label" for="kategori4">
                                        4
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="5" id="kategori5" required>
                                        <label class="form-check-label" for="kategori5">
                                        5
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="kategori" value="6" id="kategori6" required>
                                        <label class="form-check-label" for="kategori6">
                                        6
                                        </label>
                                    </div>
                                @endif
                            </div>
                            <h6>Keterangan Kategori:</h6>
                            <p class="keterangan">Lingkari yang dipilih, ditulis dalam kolom yang tersedia</p>
                            <ol>
                                <li class="deskripsi-keterangan">kejadian force major</li>
                                <li class="deskripsi-keterangan">Pelanggaran kode etik/kinerja pelaku/pelaksana</li>
                                <li class="deskripsi-keterangan">Pelanggaran/penyimpangan mekanisme dan prosedur</li>
                                <li class="deskripsi-keterangan">Penyimpangan/penyelewengan/penyalahgunaan dana</li>
                                <li class="deskripsi-keterangan">Intervensi mengakibatkan kerugian masyarakat</li>
                                <li class="deskripsi-keterangan">Pelanggaran hukum terhadap kebijakan/ketetapan</li>
                            </ol>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-{{ $detailKlasifikasi != null ? 'warning': 'success'}} float-right" type="submit" id="btnSubmit">{{ $detailKlasifikasi != null ? 'Ubah': 'Simpan'}}</button>
                        <a href="{{ route('klasifikasi.pengaduan.index') }}" class="btn btn-primary float-right mr-3">Kembali</a>
                        </div>
                        <input type="hidden" value="{{ session('message') }}" id="index_message">
                        <input type="hidden" name="id_pengguna" id="id_pengguna" value="{{ $showKlasifikasiPengaduan->id_pelapor }}" >
                        <input type="hidden" name="id_pengaduan" id="id_pengaduan" value="{{ $showKlasifikasiPengaduan->id }}" id="index_message">
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
            const detail = '{{ $detailKlasifikasi === null ? '' : 1 }}'
            if (detail === '1') {
                const id = '{{ $detailKlasifikasi === null ? '' : $detailKlasifikasi->id }}';
                const url = '{{ route('actions.klasifikasi.pengaduan.update', '_rowid') }}';
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
                                        window.location = '{{ route('klasifikasi.pengaduan.index') }}'
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
                const url = '{{ route('actions.klasifikasi.pengaduan.store') }}';
                $('#AddLaporan').on('submit',function(e){
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
                                    Swal.fire({ title: 'Data berhasil disimpan!', icon: 'success', showConfirmButton: false, timer: 2000 }).then((data) => {
                                        window.location = '{{ route('klasifikasi.pengaduan.index') }}'
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
            $(document).ready(function() {
                $('.single-selected').select2({
                    width: '100%'
                });

                $('#klasifikasiA').change(function () {
                    if($(this).is(":checked")) {
                        $("#check_kategori").hide();
                        $("#keterangan_klasifikasi").show();
                    }
                });

                $('#klasifikasiB').change(function () {
                    if($(this).is(":checked")) {
                        $("#check_kategori").show();
                        $("#keterangan_klasifikasi").hide();
                    }
                });

                if($('#klasifikasiA').is(":checked")) {
                    $("#check_kategori").hide();
                }

                if($('#klasifikasiB').is(":checked")) {
                    $("#check_kategori").show();
                }
            });
        });
    </script>
@endsection
