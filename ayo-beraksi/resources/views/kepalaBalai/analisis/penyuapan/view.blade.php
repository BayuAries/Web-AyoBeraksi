@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">Analisis Laporan Penyuapan</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width:100%">
    <div class="card-body">
        <h5 class="card-title border-bottom">Tabel Analisis Laporan Penyuapan</h5>
        <div class="table-responsive">
            <table id="datable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 6%">No</th>
                        <th>Nama Terlapor</th>
                        <th>Kasus</th>
                        <th>Tanggal Laporan</th>
                        <th>Hasil Investigasi</th>
                        <th>Kesimpulan</th>
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
    var showurl = '{{ route('analisisLaporan.penyuapan.showMonitor', '_rowid') }}';
    // var editurl = '{{ route('analisisLaporan.penyuapan.edit', '_rowid') }}';
    $(document).ready(function() {
        // Databale for List
        var t = $('#datable').DataTable({
            ajax:{
                url: '{{ route('actions.analisis.penyuapan.list') }}',
                dataSrc: 'data'
            },
            columns: [
                {data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'id_penyuapan.nama_terlapor'},
                {data: 'id_penyuapan.kasus_suap'},
                {data: 'id_penyuapan.tanggal_pelaporan',
                    render: function (data, type, row) {
                        return moment(new Date(data).toString()).format('DD/MM/YYYY');
                    }
                },
                {data: 'hasil_investigasi',
                    render: function (data) {
                        if (data != null) {
                            return data;
                        } else {
                            return 'Masih dalam investigasi';
                        }
                    }
                },
                {data: 'kesimpulan',
                    render: function (data) {
                        if (data != null) {
                            return data;
                        } else {
                            return 'Masih dalam investigasi';
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
        // getData();
        // function getData() {
        //     $('#tbody_datable').html('');
        //     $.ajax({
        //         type: 'GET',
        //         url: '{{ route('actions.penyuapan.list') }}',
        //         dataType: 'json',
        //         success: function (response) {
        //             console.log(response)
        //             if (response.total > 0) {
        //                 var $tr = '';
        //                 var num = 0;
        //                 var showurl = '{{ route('laporan.penyuapan.show', '_rowid') }}';
        //                 var editurl = '{{ route('laporan.penyuapan.edit', '_rowid') }}';
        //                 $.each(response.data, function(i, item) {
        //                     var row = i % 2 === 0 ? 'even' : 'odd';
        //                     var $row = $('<tr>').attr('role', 'row')
        //                     .addClass(row)
        //                     .append(
        //                         $('<td>').text(++num),
        //                         $('<td>').text(item.nama_terlapor),
        //                         $('<td>').text(item.jabatan),
        //                         $('<td>').text(item.kasus_suap),
        //                         $('<td>').text(item.status === "0" ? 'Selesai' : 'Dalam Proses'),
        //                         '<td><a class="btn btn-info mx-1" href="'+showurl.replace('_rowid', item.id)+'">Show<i class="fa fa-eye"></i></a><a class="btn btn-warning mx-1" href="'+editurl.replace('_rowid', item.id)+'">Edit<i class="fa fa-pencil"></i></a></td>'
        //                     );
        //                     $tr += $('<div>').html($row.clone()).html();
        //                 });
        //                 // $('#tbody_datable').html($tr);
        //             } else {
        //                 $tr = '<tr class="odd"><td colspan="6" class="dataTables_empty" valign="top">Data Tidak Ditemukan</td></tr>';
        //                 $('#tbody_datable').html($tr);
        //             }
        //         }
        //     });
        // }
    });
</script>
@endsection
