@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">Logbook Laporan Penyuapan</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title border-bottom">Tabel Logbook Laporan Penyuapan</h5>
        <div class="table-responsive">
            <table id="datable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 6%">No</th>
                        <th>Nama Pelapor</th>
                        <th>Nama Terlapor</th>
                        <th>Tanggal Kejadian</th>
                        <th>Tempat Kejadian</th>
                        <th>Uraian Kejadian</th>
                        <th>Saksi</th>
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
<script type="text/javascript">
    var showurl = '{{ route('logbook.penyuapan.showMonitorPelaporan', '_rowid') }}';
    // var editurl = '{{ route('logbook.penyuapan.edit', '_rowid') }}';
    $(document).ready(function() {
        // Databale for List
        var t = $('#datable').DataTable({
            ajax:{
                url: '{{ route('actions.logbook.penyuapan.list') }}',
                dataSrc: 'data'
            },
            columns: [
                {data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'id_penyuapan.nama_pelapor'},
                {data: 'id_penyuapan.nama_terlapor'},
                {data: 'id_penyuapan.tanggal_kejadian',
                    render: function (data, type, row) {
                        return moment(new Date(data).toString()).format('DD/MM/YYYY');
                    }
                },
                {data: 'id_penyuapan.lokasi'},
                {data: 'uraian_kejadian',
                    render : function(data) {
                        if (data != null) {
                            return data;
                        } else {
                            return "Sedang dalam Proses Investigasi";
                        }
                    }
                },
                {data: 'saksi',
                    render : function(data) {
                        if (data != null) {
                            return data;
                        } else {
                            return "Sedang dalam Proses Investigasi";
                        }
                    }
                },
                {
                    // Button for actions
                    data: 'id_penyuapan.id',
                    "bSortable": false,
                    render: function (data) { return '<a class="btn btn-info mx-1" href="'+showurl.replace('_rowid', data)+'"><i class="fa fa-eye"></i></a>'; }
                },
            ]
        });
    });
</script>
@endsection
