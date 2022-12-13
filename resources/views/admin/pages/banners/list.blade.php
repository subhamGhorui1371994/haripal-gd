@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Banners</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/home-page-banners/create') }}" class="btn btn-primary">Add Banner</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="portfolioList" style="width: 100%"></table>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')

    <link href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" id="theme" rel="stylesheet">

    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootbox.min.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('#portfolioList').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: {
                    url: base_url + '/admin/home-page-banners/get-list',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                },
                aoColumnDefs: [
                    {bSortable: false, aTargets: [1, 3]},
                ],
                order: [[0, 'asc']],
                columns: [
                    {data: 'title', title: 'Title'},
                    {
                        title: 'Image',
                        data: null,
                        className: 'text-center',
                        width: '20%',
                        mRender: function (data, type, row) {
                            return '<img src="' + base_url + '/'+row.image_link + '" width="100" class="img-thumbnail">';
                        },
                    },
                    {title: 'Created', data: 'created_at', className: 'text-center'},
                    {
                        title: 'Action',
                        data: null,
                        className: 'text-center',
                        width: '10%',
                        mRender: function (data, type, row) {
                            return '<a href="' + base_url + '/admin/home-page-banners/' + row.id + '/edit" style="margin-right: 1.5rem"><i class="icon-pencil"></i></a>' +
                                '<a class="delete-action" data-id="' + row.id + '"><i class="icon-trash" style="color:red;"></i></a>';
                        },
                    },
                ],
                initComplete: function (settings, json) {

                    $('#portfolioList tbody').on('click', 'tr td .delete-action', function (e) {

                        var delete_id = $(this).data('id');

                        bootbox.confirm('Are you sure you want to delete this banner image?',
                            function (result) {
                                if (result === true) {
                                    window.location.href = base_url + '/admin/home-page-banners/delete/' + delete_id;
                                }
                            },
                        );
                    });

                },
            });
        });
    </script>
@endsection
