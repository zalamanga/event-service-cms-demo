<div class="row mb-3">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>{{$titlePage}}</h3>
        <p class="text-subtitle text-muted">{{$infoPage}}</p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        @php
         $segments = Request::segments();
        @endphp
        @if(Request::segment(2) == 'setting' && count($segments) > 3)
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize">
                        <a href="{{route('admin.setting.'.Request::segment(3).'.index')}}">{{Request::segment(3)}}</a>
                    </li>
                    <li class="breadcrumb-item {{count($segments) == 4 ? 'active' : ''}} text-capitalize" aria-current="page">
                        {{Request::segment(4)}}
                    </li>
                    @if(count($segments) > 4)
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">{{Request::segment(5)}}</li>
                    @endif
                </ol>
            </nav>
        @elseif(count($segments) > 2 && Request::segment(2) != 'setting')
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-capitalize">
                        @if(request()->is('admin/pages/category'))
                            <a href="{{route('admin.pages.'.Request::segment(3))}}">{{Request::segment(3)}}</a>
                        @elseif(request()->is('admin/pages/packet'))
                            <a href="{{route('admin.pages.'.Request::segment(3))}}">{{Request::segment(3)}}</a>
                        @endif
                    </li>
                    <li class="breadcrumb-item {{count($segments) == 3 ? 'active' : ''}} text-capitalize" aria-current="page">
                        {{Request::segment(3)}}
                    </li>
                    @if(count($segments) > 3)
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">{{Request::segment(4)}}</li>
                    @endif
                </ol>
            </nav>
        @else
            <div class="float-start float-lg-end">
                {{date('l, d F Y')}}
            </div>
        @endif
    </div>
</div>
