@extends('layouts.main_dashboard')
@section('heads')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table-datatable-jquery.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
@endsection
@section('main_dashboard_content')
    <div class="card">
        <div id="content_list">
            <div class="card-body p-0">
                <div class="mb-3 d-flex justify-content-end">
                    <a href="javascript:;" onclick="load_input('{{ route('admin.setting.gallery.create') }}')"
                        class="btn btn-sm icon icon-left btn-primary">
                        <i class="bi bi-plus"></i>
                        Tambah
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table" id="tableList">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="content_input"></div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script>
        let jquery_datatable = $("#tableList").DataTable({
            responsive: true,
            ajax: '{{ route('admin.setting.gallery.index') }}',
            scrollX: true,
            scrollY: "400px",
            pageLength: 10,
            scrollCollapse: true,
            autoWidth: false,
            columns: [{
                    data: 'DT_RowIndex',
                    defaultContent: '',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'id',
                    name: 'id',
                    visible: false,
                    searchable: false
                },
                {
                    data: 'position',
                    name: 'position',
                    visible: false,
                    searchable: false
                },
                {
                    data: 'photo',
                    defaultContent: '',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'name',
                    defaultContent: '',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'category_name',
                    defaultContent: '',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    defaultContent: '',
                    orderable: false,
                    searchable: false
                }
            ],
            // set pagination options
            lengthMenu: [
                5, 10, 20, 30, 50, 100
            ],
            rowReorder: {
                selector: 'tr td:not(:first-of-type,:last-of-type)',
                dataSrc: '2'
            }
        })
        const setTableColor = () => {
            document.querySelectorAll('.dataTables_paginate .pagination').forEach(dt => {
                dt.classList.add('pagination-primary')
            })
        }
        setTableColor()
        jquery_datatable.on('draw', setTableColor)
        jquery_datatable.on('row-reorder', function(e, details) {
            if (details.length) {
                let rows = [];
                details.forEach(element => {
                    rows.push({
                        id: jquery_datatable.row(element.node).data().id,
                        position: element.newPosition
                    });
                });
                $.ajax({
                    url: '{{ route('admin.setting.gallery.reorder') }}',
                    type: 'POST',
                    data: {
                        rows
                    },
                    success: function(response) {
                        jquery_datatable.ajax.reload();
                    }
                });
            }
        });
    </script>
@endsection()
