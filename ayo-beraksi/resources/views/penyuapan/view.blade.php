@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">Laporan Penyuapan</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width:100%">
    <div class="card-body">
        <h5 class="card-title border-bottom">Tabel Laporan Penyuapan</h5>
        <div class="table-responsive">
            <table id="datable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Terlapor</th>
                        <th>Jabatan</th>
                        <th>Kasus</th>
                        <th style="width: 16%">Nilai Suap</th>
                        <th>Tanggal Kejadian</th>
                        <th>Tanggal Laporan</th>
                        <th>Status Laporan</th>
                        <th style="width: 13%">Aksi</th>
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
    var showurl = '{{ route('laporan.penyuapan.show', '_rowid') }}';
    var editurl = '{{ route('laporan.penyuapan.edit', '_rowid') }}';
    $(document).ready(function() {
        // Databale for List
        var t = $('#datable').DataTable({
            ajax:{
                url: '{{ route('actions.penyuapan.list') }}',
                dataSrc: 'data'
            },
            columns: [
                {data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'nama_terlapor'},
                {data: 'jabatan'},
                {data: 'kasus_suap'},
                {data: 'nilai_suap',
                    render : function(data) {
                        if (data != null) {
                            return 'Rp. '+ $.fn.dataTable.render.number(',', '.', '', '').display(data);
                        } else {
                            return 'Nilai Tidak diketahui';
                        }
                    }
                },
                {data: 'tanggal_kejadian',
                    render: function (data, type, row) {
                        return moment(new Date(data).toString()).format('DD/MM/YYYY');
                    }
                },
                {data: 'tanggal_pelaporan',
                    render: function (data, type, row) {
                        return moment(new Date(data).toString()).format('DD/MM/YYYY');
                    }
                },
                {data: "status",
                    render : function(data) {
                        // return data == "0" ? 'Ditolak' : 'Diterima';        // if else for status
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

