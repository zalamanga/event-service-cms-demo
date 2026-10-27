@extends('layouts.main')
@section('content')
    <section class="w-100 py-5 my-3 my-lg-5">
        <div class="container mt-4 mt-lg-3" id="content_list">
            <div class="row justify-content-between mb-5">
                <div class="col-lg-3 text-black">
                    <p class="font-secondary ls-sm text-uppercase mb-1">List Paket Pernikahan | Paket Dekorasi Tenda yang Memikat</p>
                    <h3 class="text-black">Temukan <span class="fs-1">Paket</span> Kita</h3>
                </div>
                <div class="col-lg-7">
                    <p class="font-secondary m-0 text-black">
                       Rencanakan acara Anda dengan sentuhan elegan dan memikat dari paket dekorasi kami. Dari nuansa klasik hingga modern, kami menyediakan beragam opsi dekorasi yang akan membuat acara Anda tak terlupakan. Percayakan pada tim profesional kami untuk menghadirkan atmosfer yang sesuai dengan tema dan gaya acara Anda.
                    </p>
                </div>
            </div>
            {{-- <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-start mb-5">
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{ asset('images/packets/packet-1.jpeg') }}" alt="Paket Tenda Jakarta Barat Murah"
                            class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Gold</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                            <hr>
                            <a href="{{ route('frontend.pricelist.packet.detail', 1) }}"
                                class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{ asset('images/packets/packet-2.jpg') }}" alt="Paket Tenda Jakarta Barat Murah"
                            class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Silver</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                            <hr>
                            <a href="{{ route('frontend.pricelist.packet.detail', 1) }}" class="text-white slideRight d-block">Detail <i
                                    class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{ asset('images/packets/packet-3.jpeg') }}" alt="packet-1"
                            class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Bronze</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                            <hr>
                            <a href="{{ route('frontend.pricelist.packet.detail', 1) }}" class="text-white slideRight d-block">Detail <i
                                    class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{ asset('images/packets/packet-4.png') }}" alt="Paket Tenda Jakarta Barat Murah"
                            class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Akad</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                            <hr>
                            <a href="{{ route('frontend.pricelist.packet.detail', 1) }}" class="text-white slideRight d-block">Detail <i
                                    class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div id="list_result">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-start mb-3">
                    @foreach($packets as $packet)
                    <div class="col">
                        <div class="card rounded-0 card-packet position-relative">
                            <img src="{{$packet->photo}}" alt="Paket Tenda Jakarta Barat Murah" class="img-fluid object-fit-cover" style="height:550px;">
                            <div class="card-body position-absolute bottom-0 text-white">
                                <h5 class="card-title text-uppercase text-shadow-sm">{{ $packet->name }}</h5>
                                <!--<p class="card-text font-secondary">{!! $packet->description !!}</p>-->
                                <hr>
                                <a href="{{ route('frontend.pricelist.packet.detail', $packet->id) }}" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
           {{$packets->links()}}
        </div>
    </section>
@endsection
