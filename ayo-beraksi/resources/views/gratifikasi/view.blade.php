@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">Laporan Gratifikasi</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title border-bottom">Tabel Laporan Gratifikasi</h5>
        <div class="table-responsive">
            <table id="datable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 6%">No</th>
                        <th>Nama Pelapor</th>
                        <th>Nama Terlapor</th>
                        <th>Instansi/Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Tanggal Kejadian</th>
                        <th>Status Laporan</th>
                        <th style="width: 12%">Aksi</th>
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
    var showurl = '{{ route('laporan.gratifikasi.show', '_rowid') }}';
    var editurl = '{{ route('laporan.gratifikasi.edit', '_rowid') }}';
    $(document).ready(function() {
        // Databale for List
        var t = $('#datable').DataTable({
            ajax:{
                url: '{{ route('actions.gratifikasi.list') }}',
                dataSrc: 'data'
            },
            columns: [
                {data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'nama_pelapor'},
                {data: 'nama_terlapor'},
                {data: 'instansi'},
                {data: 'jabatan'},
                {data: 'tanggal_kejadian',
                    render: function (data, type, row) {
                        return moment(new Date(data).toString()).format('DD/MM/YYYY');
                    }
                },
                {data: "status",
                    render : function(data) {
                        // return data == "0" ? 'Selesai' : 'Dalam Proses';        // if else for status
                        if (data != null) {
                            return data == "0" ? 'Ditolak' : 'Diterima';
                        } else {
                            return "Data Baru";
                        }
                    }
                },
                {
                    // Button for actions
                    data: 'id',
                    "bSortable": false,
                    render: function (data) { return '<a class="btn btn-info mx-1" href="'+showurl.replace('_rowid', data)+'"><i class="fa fa-eye"></i></a><a class="btn btn-warning mx-1" href="'+editurl.replace('_rowid', data)+'"><i class="fa fa-pencil"></i></a>'; }
                },
            ]
        });
    });
    </script>
@endsection
