<div class="modal-header">
    <h5 class="modal-title font-secondary" id="galleryModalTitle">Gallery Detail</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
    </button>
</div>
<div class="modal-body">
    <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($galleries as $i => $item)
                <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="{{ $i }}"
                    class={{ $i === 0 ? 'active' : '' }} {{ $i != 'index' ? 'aria-current=true' : '' }}
                    aria-label="Slide {{ $i }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($galleries as $i => $gallery)
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                    <img class="d-block w-100" alt="Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah"
                        src="{{ asset('storage/' . $gallery->photo) }}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
</div>
