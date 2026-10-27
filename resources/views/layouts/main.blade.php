@section('heads')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@include('includes.head')
<div id="main" class="layout-horizontal">
    @include('components.navbar')
    <main>
        @yield('content')
        {{-- contact start --}}
        @include('components.contact')
        {{-- contact end --}}
    </main>
    @include('components.footer')
</div>
@include('includes.foot')
