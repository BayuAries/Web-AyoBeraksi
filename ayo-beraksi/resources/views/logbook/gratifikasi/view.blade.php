@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">Logbook Laporan Gratifikasi</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title border-bottom">Tabel Logbook Laporan Gratifikasi</h5>
        <div class="table-responsive">
            <table id="datable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 6%">No</th>
                        <th>Nama Pelapor</th>
                        <th>Tanggal Pelaporan</th>
                        <th>Jenis Hadiah, Sumbangan & Keuntungan Serupa</th>
                        <th>Pemberi Hadiah, Sumbangan & Keuntungan Serupa</th>
                        <th>Hasil Analisa Tim Fungsi Kepatuhan</th>
                        <th>Keterangan</th>
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
    var showurl = '{{ route('logbook.gratifikasi.show', '_rowid') }}';
    var editurl = '{{ route('logbook.gratifikasi.edit', '_rowid') }}';
    $(document).ready(function() {
        var t = $('#datable').DataTable({
            bJQueryUI: true,
            ajax:{
                url: '{{ route('actions.logbook.gratifikasi.list') }}',
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
                {data: 'id_analisis_gratifikasi.jenis_gratifikasi'},
                {data: 'id_gratifikasi.nama_terlapor'},
                {data: "hasil_analisis",
                    render : function(data) {
                        if (data != null) {
                            return data == "0" ? 'Dikembalikan' : 'Diterima';
                        } else {
                            return "";
                        }
                    }
                },
                {data: 'keterangan',
                    render : function(data) {
                        if (data != null) {
                            return data;
                        } else {
                            return "";
                        }
                    }
                },
                {
                    // Button for actions
                    data: 'id_gratifikasi.id',
                    "bSortable": false,
                    render: function (data) { return '<a class="btn btn-info mx-1" href="'+showurl.replace('_rowid', data)+'"><i class="fa fa-eye"></i></a><a class="btn btn-warning mx-1" href="'+editurl.replace('_rowid', data)+'"><i class="fa fa-pencil"></i></a>'; }
                },
            ]
        });
    });
    </script>
@endsection
