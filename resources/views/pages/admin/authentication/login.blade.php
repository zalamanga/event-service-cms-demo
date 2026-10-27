@section('heads')
<style>
    .screen {
        width: 100%;
        height: 100vh;
        font-family: "Didact Gothic" !important;
    }
    </style>
@endsection()
@include('includes.head')
<main class="screen row align-items-center justify-content-center overflow-hidden g-0">
    <div class="col-12 col-lg-5 h-100 bg-white row align-items-center justify-content-center">
        <form id="form_login" class="col-md-9 col-lg-10">
            <h4 class=" fs-3">Hello 👋, Welcome back for this Yovi Wedding Organizer</h4>
            <p class="mb-5 text-muted">Please fill your credential here</p>
            <h3 class="text-uppercase text-center mb-4">Login</h3>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
                <div class="form-control-icon">
                    <i class="bi bi-envelope-at"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <button id="button_login" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" onclick="handle_post('#button_login','#form_login','{{ route('admin.do_login') }}')">Log in</button>
        </form>
    </div>
    <div class="d-none d-lg-block col-lg-7"></div>
</main>
@include('includes.foot')
