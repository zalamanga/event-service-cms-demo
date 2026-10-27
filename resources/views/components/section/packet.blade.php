<section class="w-100 py-5 my-3 my-lg-5">
    <div class="container">
        <div class="row justify-content-between mb-5">
            <div class="col-lg-3 text-black">
                <p class="font-secondary ls-sm text-uppercase mb-1">Paket Populer</p>
                <h3 class="text-black">Temukan <span class="fs-1">Paket</span> Kita</h3>
            </div>
            <div class="col-lg-7">
                <p class="font-secondary m-0 text-black">
                   “Pernikahan adalah momen berharga yang harus dirayakan dengan indah. Biarkan tim wedding organizer kami membantu kamu membuat momenmu menjadi lebih spesial dengan detail-detail yang sempurna.”
                </p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-start mb-3">
            @foreach($packets as $packet)
            <div class="col">
                <div class="card rounded-0 card-packet position-relative">
                    <img src="{{$packet->photo}}" alt="Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah" class="img-fluid object-fit-cover" style="height:550px;">
                    <div class="card-body position-absolute bottom-0 text-white">
                        <h5 class="card-title text-uppercase text-shadow-sm">{{ $packet->name }}</h5>
                        <!--<p class="card-text font-secondary">{!! $packet->description !!}</p>-->
                        <hr>
                        <a href="{{ route('frontend.pricelist.packet.detail', $packet->id) }}" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col">
                <div class="card rounded-0 card-packet position-relative">
                    <img src="{{asset('images/packets/packet-2.jpg')}}" alt="Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah" class="img-fluid object-fit-cover">
                    <div class="card-body position-absolute bottom-0 text-white">
                        <h5 class="card-title text-uppercase text-shadow-sm">Silver</h5>
                        <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <hr>
                        <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-0 card-packet position-relative">
                    <img src="{{asset('images/packets/packet-3.jpeg')}}" alt="Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah" class="img-fluid object-fit-cover">
                    <div class="card-body position-absolute bottom-0 text-white">
                        <h5 class="card-title text-uppercase text-shadow-sm">Bronze</h5>
                        <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <hr>
                        <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-0 card-packet position-relative">
                    <img src="{{asset('images/packets/packet-4.png')}}" alt="Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah" class="img-fluid object-fit-cover" style="height:550px;">
                    <div class="card-body position-absolute bottom-0 text-white">
                        <h5 class="card-title text-uppercase text-shadow-sm">Akad</h5>
                        <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <hr>
                        <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="text-center">
            <a href="{{route('frontend.pricelist.packet.index')}}" role="button" class="d-inline-block m-auto btn px-5 py-2 rounded-pill btn-outline-primary">
                Lihat Lainnya
            </a>
        </div>
    </div>
</section>
