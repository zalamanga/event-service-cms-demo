<style>
    .dropzone {
        background: white;
        border-radius: 5px;
        border: 2px dashed rgb(0, 135, 247);
        border-image: none;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .dz-image img {
        width: 100%;
        height: 100%;
    }
</style>
<div class="row">
    <div class="col-12 col-md-10 col-lg-8 col-xl-7">
        <form class="form form-vertical" id="form_gallery"
            action="{{ $gallery->id ? route('admin.setting.gallery.update', $gallery->id) : route('admin.setting.gallery.store') }}">
            <div class="form-body">
                <input type="hidden" name="id" value="{{ $gallery->id }}">
                <input type="hidden" name="files" id="files">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label text-muted opacity-75 fw-medium" for="formImage">Image</label>
                            <!--begin::Dropzone-->
                            <div class="dropzone needsclick" id="dropzoneForm">
                                <!--begin::Message-->
                                <div class="dz-message needsclick" id="dzPlaceholder">
                                    <i class="bi bi-file-earmark-arrow-up text-primary display-4"></i>
                                    <h3 class="mb-4">Drop files here or click to upload.</h3>
                                </div>
                                <div class="dz-previews-container" id="dzPreviews"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="name" class="mb-2">Nama</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="name"
                                    placeholder="Masukkan nama gallery disini" id="name"
                                    value="{{ $gallery->name }}">
                                <div class="form-control-icon">
                                    <i class="bi bi-image"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="category" class="mb-2">Kategori</label>
                            <select class="form-select" id="category" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $gallery->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        @if (!$gallery->id)
                            <button id="button_gallery"
                                onclick="handle_upload('#button_gallery','#form_gallery','{{ route('admin.setting.gallery.store') }}','POST','Submit')"
                                class="btn btn-primary me-1 mb-1">Submit</button>
                        @else
                            <button id="button_gallery"
                                onclick="handle_upload('#button_gallery','#form_gallery','{{ route('admin.setting.gallery.update', $gallery->id) }}','PATCH','Update')"
                                class="btn btn-primary me-1 mb-1">Update</button>
                        @endif
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Inisialisasi file yang ada
    let existingFiles = @json($gallery->details);
    var uploadedDocumentMap = new Array();
    var MAX_FILE_SIZE = 2 // MB
    var MAX_FILE_COUNT = 100

    // Inisialisasi Dropzone
    var dropzone = new Dropzone('#dropzoneForm', {
        url: "{{ route('admin.setting.gallery.upload') }}",
        acceptedFiles: 'image/*',
        maxFilesize: MAX_FILE_SIZE,
        maxFiles: MAX_FILE_COUNT,
        addRemoveLinks: true,
        parallelUploads: 100,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        thumbnail: function(file, dataUrl) {
            if (file.previewElement) {
                file.previewElement.classList.remove("dz-file-preview");
                var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                for (var i = 0; i < images.length; i++) {
                    var thumbnailElement = images[i];
                    thumbnailElement.alt = file.name;
                    thumbnailElement.src = dataUrl;
                }
                setTimeout(function() {
                    file.previewElement.classList.add("dz-image-preview");
                }, 1);
            }
        },
        init: function() {
            this.on("addedfile", function(file) {
                this.files.length > MAX_FILE_COUNT && Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Maksimal file yang diupload adalah " + MAX_FILE_COUNT
                });

                // Tambahkan properti penghapusan
                file.previewElement.querySelector(".dz-remove").setAttribute("data-dz-remove", file
                    .name);
            });

            this.on("removedfile", function(file) {
                // Tambahkan properti penghapusan
                file.previewElement.querySelector(".dz-remove").setAttribute("data-dz-remove", file
                    .name);
            });

            this.on("success", function(file, response) {
                var obj = {
                    size: file.size,
                    path: response.path
                };
                uploadedDocumentMap.push(obj), $("#files").val(JSON.stringify(
                        uploadedDocumentMap)),
                    file.previewElement.classList.add("dz-success");
                var fileuploded = file.previewElement.querySelector("[data-dz-name]");
                fileuploded.innerHTML = response.path
            })
        },
        removedfile: function(file) {
            if (this.options.dictRemoveFile && file.previewElement) {
                Swal.fire({
                    title: "Hapus File",
                    text: "Apakah Anda yakin ingin menghapus file ini?",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.setting.gallery.remove') }}",
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: "{{ csrf_token() }}",
                                url: file.name
                            },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'File deleted successfully',
                                });
                            }
                        });
                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(
                            file
                            .previewElement) : void 0;
                    }
                })
            }
        }
    });

    // Mendengarkan event error pada Dropzone
    dropzone.on('error', function(file, response) {

    });

    // Mendengarkan event complete pada Dropzone
    dropzone.on('complete', function(file) {
        // Tambahkan properti penghapusan
        file.previewElement.querySelector(".dz-remove").setAttribute("data-dz-remove", file
            .name);
    });

    // Fungsi untuk menambahkan file yang sudah ada ke Dropzone
    function addExistingFile(file) {
        var mockFile = {
            name: file.photo,
            size: file.size
        };
        dropzone.emit("addedfile", mockFile);
        dropzone.emit("thumbnail", mockFile, "{{ asset('storage/') }}" + "/" + file.photo);
        dropzone.emit("complete", mockFile);
        dropzone.files.push(mockFile);
        var obj = {
            size: file.size,
            path: file.photo
        };
        uploadedDocumentMap.push(obj), $("#files").val(JSON.stringify(
            uploadedDocumentMap))
    }

    // Jika ada file yang sudah ada, tambahkan ke Dropzone
    if (existingFiles && existingFiles.length > 0) {
        existingFiles.forEach(function(file) {
            addExistingFile(file);
        });
    }
</script>
<script>
    // Sortable
    new Sortable(document.getElementById('dropzoneForm'), {
        draggable: '.dz-preview',
        handle: '.dz-details',
        onSort: function( /**Event*/ evt) {
            var files = dropzone.files;
            newQueue = [];
            $('#dropzoneForm .dz-preview .dz-filename [data-dz-name]').each(function(count, el) {
                var name = el.innerHTML;
                files.forEach(function(file) {
                    if (file.name === name) {
                        newQueue.push(file);
                    }
                });
            });
            dropzone.files = newQueue;
            uploadedDocumentMap = [];
            newQueue.forEach(function(file) {
                var obj = {
                    size: file.size,
                    path: file.name
                };
                uploadedDocumentMap.push(obj);
            });
            $("#files").val(JSON.stringify(uploadedDocumentMap));
        },
        onEnd: function( /**Event*/ evt) {

        }
    });
</script>
