@extends('layouts.main')
@section('content')
    <section class="w-100 py-5 my-3 my-lg-5">
        <div class="container mt-4 mt-lg-3">
            <div class="row justify-content-between mb-5">
                <div class="col-lg-3 text-black">
                    <p class="font-secondary ls-sm text-uppercase mb-1">List Tenda Pernikahan | Tenda Berkualitas untuk Kenyamanan Anda</p>
                    <h3 class="text-black">Temukan<span class="fs-1">Tenda</span> Kita</h3>
                </div>
                <div class="col-lg-7">
                    <p class="font-secondary m-0 text-black">
                      Tak perlu khawatir tentang cuaca eksternal saat merencanakan acara outdoor. Dengan tenda berkualitas tinggi dari Yovi Tenda, Anda dan tamu Anda dapat menikmati acara dengan nyaman tanpa terganggu oleh panas terik atau hujan. Pilih dari berbagai jenis tenda yang sesuai dengan kebutuhan Anda, dari tenda dekoratif hingga tenda rigging yang kokoh dan tahan lama.
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-start mb-3">
                @foreach($tents as $tent)
                    <div class="col">
                        <div class="card rounded-0 card-packet position-relative">
                            <img src="{{$tent->photo}}" alt="packet-1" class="img-fluid object-fit-cover" style="height:550px;" alt="Tenda Jakarta Barat Murah" style="height:550px;">
                            <div class="card-body position-absolute bottom-0 text-white">
                                <h5 class="card-title text-uppercase">{{ $tent->name }}</h5>
                                <!--<p class="card-text font-secondary">{!! $tent->description !!}</p>-->
                                <hr>
                                <a href="{{ route('frontend.pricelist.tent.detail', $tent->id) }}" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                <div class="text-center">
                    <a href="{{route('frontend.pricelist.tent.index')}}" role="button" class="d-inline-block m-auto btn px-5 py-2 rounded-pill btn-outline-primary">
                        Lihat Lainnya
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
