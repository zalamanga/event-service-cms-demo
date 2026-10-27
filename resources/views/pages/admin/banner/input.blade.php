<div class="row">
    <div class="col-12 col-md-10 col-lg-8 col-xl-7">
        <form class="form form-vertical" id="form_banner">
            <div class="form-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="video" class="w-100 cursor-pointer">
                                <span class="mb-2 d-block">Video</span>
                                <div class="w-100 py-5 border d-flex align-items-center justify-content-center rounded position-relative">
                                    <p>
                                        <i class="bi bi-plus display-5"></i>
                                    </p>
                                    <video id="video-preview" src="{{ $banner->image }}" controls class="position-absolute w-100 h-100 object-fit-cover bg-secondary-subtle {{ $banner->id == null ? 'd-none' : '' }} rounded">
                                        <source src="{{ $banner->image }}" >
                                    </video>
                                    <button id="btn-reset-video" type="button" class="btn btn-sm rounded-circle btn-danger position-absolute top-0 end-0 m-2 {{ $banner->id == null ? 'd-none' : '' }}">
                                        <bi class="bi bi-x-circle"></bi>
                                    </button>
                                </div>
                            </label>
                        </div>
                        <input type="file" name="video" accept="video/*" id="video" class="d-none">
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="tagline" class="mb-2">Tagline</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="tagline" value="{{ $banner->tagline }}" placeholder="Masukkan tagline dari banner disini" id="tagline">
                                <div class="form-control-icon">
                                    <i class="bi bi-alphabet"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="description" class="mb-2 fw-bold">Deskripsi</label>
                        <div class="form-group with-title mb-3">
                            <textarea class="form-control" id="description" rows="3" name="description">{{ $banner->description }}</textarea>
                            <label>Your description</label>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        @if($banner->id)
                            <button id="button_banner" onclick="handle_upload('#button_banner','#form_banner','{{route('admin.setting.banner.update', $banner->id)}}','PATCH','Update')" class="btn btn-primary me-1 mb-1">Update</button>
                        @else
                            <button id="button_banner" onclick="handle_upload('#button_banner','#form_banner','{{route('admin.setting.banner.store')}}','POST','Submit')" class="btn btn-primary me-1 mb-1">Submit</button>
                        @endif
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
    <script>

    if (typeof window.yovi === 'undefined') {
        window.yovi = {};
    }
    if (typeof window.resetVideo !== 'function') {
        window.resetVideo = () => {
            $('#video').wrap('<form>').closest('form').get(0).reset();
            $('#video').unwrap();
        }
    }
    if (typeof window.yovi.videoPreview !== 'function') {
        window.videoPreview = (file) => {
            const url = URL.createObjectURL(file);
            const AvailableTypes = ["video/webm", "video/mp4", "video/mkv", "image/jpeg", "image/png", "image/gif"];
            const maxSizeVideo = 100485760; // 100MB
            const checkAvailibiltyType = AvailableTypes.includes(file.type.toLowerCase())
            if(!checkAvailibiltyType) {
                toastify.error({
                    text: 'File type not allowed!',
                    close: true,
                })
                resetVideo();
                $('#btn-reset-video').addClass('d-none');
            } else if(file.size > maxSizeVideo) {
                toastify.error({
                    text: 'File size is too large!',
                    close: true,
                })
                resetVideo();
                $('#btn-reset-video').addClass('d-none');
            } else {
                $('#video-preview').prop('src', url).removeClass('d-none');
                $('#btn-reset-video').removeClass('d-none');
            }
        }
    }
        $('#btn-reset-video').click(function() {
            $(this).addClass('d-none');
            $('#video-preview').prop('src', '').addClass('d-none');
            resetVideo();
        });

        $('#video').change(function({target}){
            let file = target.files[0];
            videoPreview(file);
        })
    </script>
