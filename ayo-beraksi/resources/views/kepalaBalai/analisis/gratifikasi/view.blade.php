@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">Analisis Laporan Gratifikasi</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title border-bottom">Tabel Analisis Laporan Gratifikasi</h5>
        <div class="table-responsive">
            <table id="datable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 6%">No</th>
                        <th>Nama Pelapor</th>
                        <th>Tanggal Pelaporan</th>
                        <th>Jenis Hadiah, Sumbangan & Keuntungan Serupa</th>
                        <th>Rekomendasi Tindaklanjut</th>
                        {{-- <th>Nomor Pelaporan</th> --}}
                        <th style="width: 6%">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbody_datable">
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
    var showurl = '{{ route('analisisLaporan.gratifikasi.showMonitor', '_rowid') }}';
    // var editurl = '{{ route('analisisLaporan.gratifikasi.edit', '_rowid') }}';
    $(document).ready(function() {
        // Databale for List
        var t = $('#datable').DataTable({
            ajax:{
                url: '{{ route('actions.analisis.gratifikasi.list') }}',
                dataSrc: 'data'
            },
            columns: [
                {data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'id_gratifikasi.nama_pelapor'},
                {data: 'id_gratifikasi.tanggal_pelaporan',
                    render: function (data, type, row) {
                        return moment(new Date(data).toString()).format('DD/MM/YYYY');
                    }
                },
                {data: 'jenis_gratifikasi',
                    render: function (data) {
                        if (data != null) {
                            return data;
                        } else {
                            return 'Masih dalam investigasi';
                        }
                    }
                },
                {data: 'rekomendasi_tindak_lanjut',
                    render: function (data) {
                        if (data != null) {
                            return data === "0" ? 'Diterima' : 'Dikembalikan';
                        } else {
                            return 'Masih dalam investigasi';
                        }
                    }
                },
                // {data: 'nomor_pelaporan'},
                {
                    // Button for actions
                    data: 'id_gratifikasi.id',
                    "bSortable": false,
                    render: function (data) { return '<a class="btn btn-info mx-1" href="'+showurl.replace('_rowid', data)+'"><i class="fa fa-eye"></i></a>'; }
                },
            ]
        });
    });
    </script>
@endsection
