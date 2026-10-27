@extends('layouts.main_dashboard')
@section('heads')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/table-datatable-jquery.css')}}">
@endsection()
@section('main_dashboard_content')
    <div class="card">
        <div id="content_list">
            <div class="card-body p-0">
                <div class="mb-3 d-flex justify-content-end">
                    <a href="javascript:;" onclick="load_input('{{route('admin.setting.banner.create')}}')" class="btn btn-sm icon icon-left btn-primary">
                        <i class="bi bi-plus"></i>
                        Tambah
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table" id="tableList">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Video</th>
                                <th>Tagline</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse($banners as $i => $banner) --}}
                                <tr>
                                    {{-- <td>{{$i+1}}</td>
                                    <td>
                                        <video playsinline="" data-automation="VideoPlayer" controls class="video-table rounded shadow-sm" poster="https://www.shutterstock.com/shutterstock/videos/1065281056/thumb/1.jpg?ip=x480" preload="auto" aria-label="video-player">
                                            <source src="https://www.shutterstock.com/shutterstock/videos/1065281056/preview/stock-footage-january-tenggarong-indonesia-driving-car-with-google-maps-as-navigation-route-guidance.webm" type="video/webm">
                                            <source src="https://www.shutterstock.com/shutterstock/videos/1065281056/preview/stock-footage-january-tenggarong-indonesia-driving-car-with-google-maps-as-navigation-route-guidance.mp4" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>{{$banner->tagline}}</td>
                                    <td>
                                        <div class="limit-char">
                                            {{$banner->deskripsi}}
                                            <strong>Test aja</strong>
                                            <p>Ini memuat deskripsi dari tagline yang telah dituliskan</p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, ratione!</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="javascript:;" onclick="load_input('{{route('admin.setting.banner.edit', $banner->id)}}')" class="btn btn-sm icon icon-left btn-success">
                                                <i class="bi bi-pen"></i>
                                                Edit
                                            </a>
                                            <a href="javascript:;" onclick="handle_delete('{{route('admin.setting.banner.destroy', $banner->id)}}')" class="btn btn-sm icon icon-left btn-danger">
                                                <i class="bi bi-trash"></i>
                                                Hapus
                                            </a>
                                        </div>
                                    </td> --}}
                                </tr>
                            {{-- @empty
                            <td colspan="5" align="center">No Data</td>
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="content_input"></div>
@endsection()
@section('scripts')
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
    <script>
        let jquery_datatable = $("#tableList").DataTable({
            responsive: true,
            ajax: '{{ route('admin.setting.banner.index') }}',
            pageLength: 10,
            scrollX: true,
            scrollY:"400px",
            scrollCollapse: true,
            autoWidth: false,
            columns: [{
                    data: 'DT_RowIndex',
                    defaultContent: '',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'media',
                    defaultContent: '',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'tagline',
                    defaultContent: '',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'description',
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
        })
        const setTableColor = () => {
            document.querySelectorAll('.dataTables_paginate .pagination').forEach(dt => {
                dt.classList.add('pagination-primary')
            })
        }
        setTableColor()
        jquery_datatable.on('draw', setTableColor)
    </script>
@endsection()
