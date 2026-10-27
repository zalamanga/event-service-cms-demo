@extends('layouts.main_dashboard')
@section('heads')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection()
@section('main_dashboard_content')
<div class="row">
    <div class="col-12 col-md-10 col-lg-8 col-xl-7">
        <form class="form form-vertical" id="form_profile">
            <div class="form-body">
                <div class="row">
                    {{-- <div class="col-12">
                        <div class="form-group">
                            <label for="image" class="w-100 cursor-pointer ">
                                <span class="mb-2 d-block">Image Profile</span>
                                <div class="w-100 py-5 border d-flex align-items-center justify-content-center rounded position-relative ">
                                    <p>
                                        <i class="bi bi-plus display-5"></i>
                                    </p>
                                    <img src="" alt="preview-image" class="position-absolute w-100 h-100 object-fit-cover bg-secondary-subtle d-none" id="image-preview">
                                    <button id="btn-reset-image" type="button" class="btn btn-sm rounded-circle btn-danger position-absolute top-0 end-0 m-2 d-none">
                                        <bi class="bi bi-x-circle"></bi>
                                    </button>
                                </div>
                            </label>
                        </div>
                        <input type="file" name="image" id="image" class="d-none">
                    </div> --}}
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="name" class="mb-2">* Nama</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="name" placeholder="Masukkan nama profile disini" id="name" value="{{ Auth::user()->name }}">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="username" class="mb-2">* Username</label>
                            <div class="position-relative">
                                <input type="username" class="form-control"  name="username" placeholder="Masukkan username disini" id="username" value="{{ Auth::user()->username }}">
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope-at-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="password" class="mb-2">Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control"  name="password" id="password">
                                <div class="form-control-icon">
                                    <i class="bi bi-lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="address" class="mb-2 fw-bold">Address</label>
                        <div class="form-group with-title mb-3">
                            <textarea class="form-control" id="address" disabled rows="3"></textarea>
                            <label>Your address</label>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button id="button_profile" onclick="handle_upload('#button_profile','#form_profile','{{ route('admin.profile.update') }}','PATCH','Submit')" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection()
@section('scripts')
    <script>
        const resetImage = () => {
            $('#image').wrap('<form>').closest('form').get(0).reset();
            $('#image').unwrap();
        }

        const imagePreview = (file) => {
            const url = URL.createObjectURL(file);
            const AvailableTypes = ["image/jpeg", "image/jpg", "image/png"];
            const checkAvailibiltyType = AvailableTypes.includes(file.type.toLowerCase())
            if(checkAvailibiltyType) {
                $('#image-preview').prop('src', url).removeClass('d-none');
                $('#btn-reset-image').removeClass('d-none');
            } else {
                toastify.error({
                    text: 'File type not allowed!',
                    close: true,
                })
                resetImage();
                $('#btn-reset-image').addClass('d-none');
            }
        }
        $('#btn-reset-image').click(function() {
            $(this).addClass('d-none');
            $('#image-preview').prop('src', '').addClass('d-none');
            resetImage();
        });

        $('#image').change(function({target}){
            const file = target.files[0];
            imagePreview(file);
        })
    </script>
@endsection()
