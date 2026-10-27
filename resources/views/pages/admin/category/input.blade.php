<div class="row">
    <div class="col-12 col-md-10 col-lg-8 col-xl-7">
        <form class="form form-vertical" id="form_category">
            <div class="form-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="name" class="mb-2">Nama Kategori</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                    placeholder="Masukkan nama kategori disini" id="name">
                                <div class="form-control-icon">
                                    <i class="bi bi-card-list"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        @if ($category->id)
                            <button id="button_category" type="button"
                                onclick="handle_save('#button_category','#form_category','{{ route('admin.category.update', $category->id) }}','PATCH','Submit')"
                                class="btn btn-primary me-1 mb-1">Ubah</button>
                        @else
                            <button id="button_category" type="button"
                                onclick="handle_save('#button_category','#form_category','{{ route('admin.category.store') }}','POST','Submit')"
                                class="btn btn-primary me-1 mb-1">Submit</button>
                        @endif
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
