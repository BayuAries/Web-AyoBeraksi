@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">Tabel Feedback</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width: 100%;">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 6%">No</th>
                        <th>Nama pengguna</th>
                        <th>Bintang Penilaian</th>
                        <th>Response Penilaian</th>
                        <th>Alasan</th>
                        <th style="width: 5%">Aksi</th>
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
    var showurl = '{{ route('feedback.show', '_rowid') }}';
    $(document).ready(function() {
        // Databale for List
        var t = $('#datable').DataTable({
            ajax:{
                url: '{{ route('actions.feedback.list') }}',
                dataSrc: 'data'
            },
            columns: [
                {data: 'id',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {data: 'nama_pengguna'},
                {data: 'bintang_kepuasan',
                    render: function(data) {
                        if (data != null) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {data: 'respon_kepuasan',
                    render: function(data) {
                        if (data != null) {
                            return data;
                        } else {
                            return '';
                        }
                    }
                },
                {data: 'alasan'},
                {
                    // Button for actions
                    data: 'id',
                    "bSortable": false,
                    render: function (data) { return '<a class="btn btn-info mx-1" href="'+showurl.replace('_rowid', data)+'"><i class="fa fa-eye"></i></a>'; }
                },
            ]
        });
    });
</script>
@endsection
