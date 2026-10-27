@extends('layouts.main')
@section('content')
    <section class="w-100 pt-5 my-3 mt-lg-5">
        <div class="container mt-4 mt-lg-3 px-xl-5">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-8 mb-3 mb-lg-0">
                    <div class="w-100 mb-4">
                        <img src="{{ $packet->photo }}" alt="packet-1" class="img-primary mb-3">
                        @if($packet->primary == '1')
                        <div class="">
                            <i class="bi bi-award text-primary"></i>
                            <span class="font-secondary">Unggulan</span>
                        </div>
                        @endif
                        <h3 class="text-capitalize">{{$packet->name}}</h3>
                        <span class="badge bg-primary mb-4 font-secondary">{{ $packet->category->name }}</span>
                        <div class="">
                            <p class="mb-2">{!! $packet->description !!}</p>
                        </div>
                    </div>
                    <hr>
                    <h5 class="text-capitalize">Koleksi Foto Yovi Tenda Wedding Organizer - {{$packet->name}}</h5>
                    <div class="row" style="margin: auto;">
                        @foreach($packet->details as $detail)
                            <div class="col-lg-3 mt-1">
                                <a href="{{ $detail->photo }}" target="_blank">
                                    <img
                                      src="{{ $detail->photo }}"
                                      data-mdb-img="{{ $detail->photo }}"
                                      alt="Image"
                                      class="w-100 shadow-1-strong rounded"
                                    />  
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    @if(count($packets) > 0)
                        <div>
                            <h4 class="mb-3"> Paket Populer</h4>
                            <div class="row row-cols-2 row-cols-md-3 justify-content-start">
                                {{-- <div class="col">
                                    <div class="card rounded-0 card-packet-detail position-relative">
                                        <img src="{{ asset('images/packets/packet-1.jpeg') }}" alt="Tenda dan Makeup Jakarta Barat Murah"
                                            class="img-fluid object-fit-cover">
                                        <div class="card-body position-absolute top-0 mb-5 text-white">
                                            <h5 class="card-title text-uppercase text-shadow-sm">Gold</h5>
                                            <a href="{{ route('frontend.pricelist.packet.detail', 1) }}"
                                                class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card rounded-0 card-packet-detail position-relative">
                                        <img src="{{ asset('images/packets/packet-2.jpg') }}" alt="Tenda dan Makeup Jakarta Barat Murah"
                                            class="img-fluid object-fit-cover">
                                        <div class="card-body position-absolute top-0 mb-5 text-white">
                                            <h5 class="card-title text-uppercase text-shadow-sm">Silver</h5>
                                            <a href="{{ route('frontend.pricelist.packet.detail', 1) }}"
                                                class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div> --}}
                                @foreach($packets as $recomendPacket)
                                <div class="col">
                                    <div class="card rounded-0 card-packet-detail position-relative">
                                        <img src="{{ $recomendPacket->photo }}" alt="Tenda dan Makeup Jakarta Barat Murah"
                                            class="img-fluid object-fit-cover" style="height:550px;">
                                        <div class="card-body position-absolute top-0 mb-5 text-white">
                                            <h5 class="card-title text-uppercase text-shadow-sm">{{$recomendPacket->name}}</h5>
                                            <a href="{{ route('frontend.pricelist.packet.detail', $recomendPacket->id) }}"
                                                class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-lg-5 col-xl-4  position-sticky">
                    <div class="card rounded-0 bg-secondary bg-opacity-10 px-4 py-4 mb-3">
                        <div class="card-title p-0">
                            <h3>{{ $titlePage }}</h3>
                        </div>
                        <div class="card-body p-0 ">
                            <div class="bg-white d-flex align-items-center justify-content-between mb-2 py-2 px-3">
                                <h6 class="font-secondary">Nama:</h6>
                                <p class="font-secondary m-0">{{ $packet->name }}</p>
                            </div>
                            <div class="bg-white d-flex align-items-center justify-content-between mb-2 py-2 px-3">
                                <h6 class="font-secondary">Kategori:</h6>
                                <p class="font-secondary m-0">{{ $packet->category->name }}</p>
                            </div>
                            <div class="bg-white d-flex align-items-center justify-content-between mb-2 py-2 px-3">
                                <h6 class="font-secondary">Harga:</h6>
                                <p class="font-secondary m-0">Rp {{number_format($packet->price)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-secondary bg-opacity-10 px-4 py-4 ">
                        <h3 class="mb-3">Butuh Bantuan?</h3>
                        <div class="bg-white p-3">
                            <div>
                                <div class="d-flex align-items-start gap-2 fs-5 mb-2">
                                    <i class="bi bi-telephone d-block text-primary"></i>
                                    <p class="m-0 font-secondary">Telp</p>
                                </div>
                                <h5 class="m-0 font-secondary"><a target="_blank" href="https://wa.me/62081212641199">085156056381</a> </h5>
                                <h5 class="m-0 font-secondary"><a target="_blank" href="https://wa.me/6281212641199">081212641199</a> </h5>
                            </div>
                            <hr>
                            <div>
                                <div class="d-flex align-items-start gap-2 fs-5 mb-2">
                                    <i class="bi bi-at d-block text-primary"></i>
                                    <p class="m-0 font-secondary">Email</p>
                                </div>
                                <h5 class="m-0 font-secondary"><a href="mailto:yovi.entertain@gmail.com">yovi.entertain@gmail.com</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
