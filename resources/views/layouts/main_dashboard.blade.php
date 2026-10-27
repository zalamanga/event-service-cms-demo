@include('includes.head')
<div id="app" class="bg-white">
    @include('components.admin.sidebar')
    <div id="main" class="layout-navbar navbar-fixed">
        @include('components.admin.navbar')
        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    @include('components.admin.heading')
                </div>
                <section class="section">
                    @yield('main_dashboard_content')
                </section>
            </div>
            @include('components.admin.footer')
        </div>
    </div>
</div>
@include('includes.foot')
