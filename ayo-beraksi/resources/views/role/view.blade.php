@extends('layouts.main')
@section('container')
<!-- Breadcrumb -->
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active" aria-current="page">Role</li>
    </ol>
</nav>
<!-- /Breadcrumb -->
<div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="width:100%">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 6%">No</th>
                        <th>Nama Role</th>
                        <th>Hak Akses</th>
                        <th style="width: 12%">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbody_datable">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Show -->
{{-- <div class="modal" id="showProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="text-center ss">Loading ...</div>
                    <div class="row d-none" id="showing">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal modal-sheet py-5" tabindex="-1" role="dialog" id="showProductModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-6 shadow">
        <div class="modal-header border-bottom-0">
            <h5 class="modal-title">Detail Data</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-0">
            <div class="container">
                <div class="text-center ss">Loading ...</div>
                <div class="row d-none" id="showing">
                </div>
            </div>
        </div>
        <div class="modal-footer flex-column border-top-0">
            {{-- <button type="button" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Save changes</button> --}}
            <button type="button" class="btn btn-lg btn-secondary w-100 mx-0" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    // var showurl = '{{ route('role.show', '_rowid') }}';
    var editurl = '{{ route('role.edit', '_rowid') }}';
    $(document).ready(function() {
        // Databale for List
        var t = $('#datable').DataTable({
            ajax:{
                url: '{{ route('actions.role.list') }}',
                dataSrc: 'data'
            },
            columns: [
                {data: null},
                {data: 'nama'},
                {data: 'permission',
                    render: function (value, type, row) {
                        var val = [];
                        $.each(value, function(i, v) {
                            if (v.id == 1) {
                                val.push(' Akses Laporan Penyuapan');
                            } else if(v.id == 2) {
                                val.push(' Akses Laporan Pengaduan');
                            } else if(v.id == 3) {
                                val.push(' Akses Laporan Gratifikasi');
                            } else if(v.id == 4) {
                                val.push(' Akses Feedback');
                            } else if(v.id == 5) {
                                val.push(' Akses Role');
                            } else if(v.id == 6) {
                                val.push(' Akses Notifikasi');
                            }
                        })
                        return val;
                    }
                },
                {
                    // Button for actions
                    data: 'id',
                    "bSortable": false,
                    render: function (data) { return '<a class="btn btn-info mx-1" id="show_data" data-toggle="modal" data-target="#showProductModal" data-productid="'+data+'" ><i class="fa fa-eye"></i></a><a class="btn btn-warning mx-1" href="'+editurl.replace('_rowid', data)+'"><i class="fa fa-pencil"></i></a>'; }
                },
            ]
        });

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        // getData();
        // function getData() {
        //     $('#tbody_datable').html('');
        //     $.ajax({
        //         type: 'GET',
        //         url: '{{ route('actions.role.list') }}',
        //         dataType: 'json',
        //         success: function (response) {
        //             console.log(response)
        //         }
        //     });
        // }

    });

    //show
    $(document).on('click','#show_data',function(){
        var id = $(this).data('productid')
        const route = '{{ route('actions.role.show','_rowid') }}'
        const url = route.replace('_rowid',id)
        const nama_role = $('#nama_role')
        const permission = $('#permission')
        $('#showing').addClass('d-none')
        $('.ss').removeClass('d-none')
        $.ajax({
            type:'GET',
            url: url,
            success: function(data){
                // console.log(data);
                if (data != null) {
                    $.each(data.data, function(i, item) {
                        // console.log(item.nama);
                        // console.log(item.permissions);
                        var val = [];
                        $.each(item.permissions, function(i, v) {
                            if (v.id == 1) {
                                val.push(' Akses Laporan Penyuapan');
                            } else if(v.id == 2) {
                                val.push(' Akses Laporan Pengaduan');
                            } else if(v.id == 3) {
                                val.push(' Akses Laporan Gratifikasi');
                            } else if(v.id == 4) {
                                val.push(' Akses Feedback');
                            } else if(v.id == 5) {
                                val.push(' Akses Role');
                            } else if(v.id == 6) {
                                val.push(' Akses Notifikasi');
                            }
                        })
                        // console.log(val);

                        const contents = '<div class="col-4">'+
                                '<p style="weight: 700">Nama Role</p>'+
                                '<p style="weight: 700">Hak Akses</p>'+
                                '</div><div class="col-8">'+
                                '<p id="nama_role">'+item.nama+'</p><p id="permission">'+val+'</p></div>';
                        $('#showing').html(contents)
                        $('#showing').removeClass('d-none')
                        $('.ss').addClass('d-none')

                    })
                }
            }
        })
    })

</script>
@endsection

