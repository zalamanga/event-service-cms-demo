<div class="row gallery align-items-center justify-content-start row-cols-1 row-cols-md-3 row-cols-lg-4 mb-5">
    @foreach($galleries as $gallery)
        <div class="col mb-3 mb-md-4 position-relative" onclick="handle_open_modal('{{ route('frontend.galleryDetail',$gallery->id) }}','#galleryModal','#content_modal_gallery')">
            <a href="#">
                <img class="w-100 img-gallery active"
                    src="{{ $gallery->image }}"
                    alt="Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah"
                    data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
            </a>
            <span class="position-absolute badge bg-primary top-0 start-0 ms-4 mt-2 font-secondary shadow-sm">{{ $gallery->category->name }}</span>
        </div>
    @endforeach
</div>
{{$galleries->links()}}
