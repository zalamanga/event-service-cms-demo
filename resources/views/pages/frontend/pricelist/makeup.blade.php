@extends('layouts.main')
@section('content')
    <section class="w-100 py-5 my-3 my-lg-5">
        <div class="container mt-4 mt-lg-3">
            <div class="row justify-content-between mb-5">
                <div class="col-lg-3 col-xl-4 text-black">
                    <p class="font-secondary ls-sm text-uppercase mb-1">List Make Up Pernikahan | Tampil Memukau dengan Makeup Profesional</p>
                    <h3 class="text-black">Temukan <span class="fs-1">Make Up</span> Kita</h3>
                </div>
                <div class="col-lg-7">
                    <p class="font-secondary m-0 text-black">
                        Tampil sempurna adalah impian setiap individu pada hari istimewa mereka. Dengan layanan makeup profesional kami, Anda dapat tampil memukau dengan riasan yang sesuai dengan gaya dan kepribadian Anda. Percayakan pada tim ahli kami untuk menciptakan tampilan yang sempurna dan menonjolkan kecantikan alami Anda.
                    </p>
                </div>
            </div>
            {{-- <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-start mb-3">
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{asset('images/makeups/makeup-engagement.png')}}" alt="Tenda dan Makeup Jakarta Barat Murah" class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Make Up Engagement</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <hr>
                            <a href="{{route('frontend.pricelist.makeup.detail', 1)}}" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{asset('images/makeups/makeup-party.png')}}" alt="Tenda dan Makeup Jakarta Barat Murah" class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Make Up Party</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <hr>
                            <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{asset('images/makeups/makeup-graduation.png')}}" alt="Tenda dan Makeup Jakarta Barat Murah" class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Make Up Graduation</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <hr>
                            <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{asset('images/makeups/makeup-engagement.png')}}" alt="Tenda dan Makeup Jakarta Barat Murah" class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase">Akad</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <hr>
                            <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-start mb-3">
                {{-- <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{asset('images/makeups/makeup-engagement.png')}}" alt="Tenda dan Makeup Jakarta Barat Murah" class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Make Up Engagement</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <hr>
                            <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{asset('images/makeups/makeup-party.png')}}" alt="Tenda dan Makeup Jakarta Barat Murah" class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Make Up Party</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <hr>
                            <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card rounded-0 card-packet position-relative">
                        <img src="{{asset('images/makeups/makeup-graduation.png')}}" alt="Tenda dan Makeup Jakarta Barat Murah" class="img-fluid object-fit-cover">
                        <div class="card-body position-absolute bottom-0 text-white">
                            <h5 class="card-title text-uppercase text-shadow-sm">Make Up Graduation</h5>
                            <p class="card-text font-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <hr>
                            <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div> --}}
                @foreach($makeups as $makeup)
                    <div class="col">
                        <div class="card rounded-0 card-packet position-relative">
                            <img src="{{asset('images/makeups/makeup-engagement.png')}}" alt="Tenda dan Makeup Jakarta Barat Murah" class="img-fluid object-fit-cover" style="height:550px;">
                            <div class="card-body position-absolute bottom-0 text-white">
                                <h5 class="card-title text-uppercase">{{ $makeup->name }}</h5>
                                <!--<p class="card-text font-secondary">{!! $makeup->description !!}</p>-->
                                <hr>
                                <a href="#" class="text-white slideRight d-block">Detail <i class="bi bi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <ul class="pagination pagination-primary  justify-content-center">
                <li class="page-item me-1 disabled">
                    <a class="page-link font-secondary" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item me-1 active"><a class="page-link font-secondary" href="#">1</a></li>
                <li class="page-item me-1"><a class="page-link font-secondary" href="#">2</a></li>
                <li class="page-item me-1"><a class="page-link font-secondary" href="#">3</a></li>
                <li class="page-item me-1">
                    <a class="page-link font-secondary" href="#">Next</a>
                </li>
            </ul>
        </div>
    </section>
@endsection
