<section class="hero-section">
    <div class="shadow-section"></div>
    <div id="carouselHero" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded-0 position-relative">
            @foreach ($banner as $item)
                <div class="carousel-item active position-relative">
                    <div class="" style="height:100vh; width: 100vw">
                        {{-- <iframe
                            width="100%" height="100%"
                            src="https://www.youtube.com/embed/fq2CdnfijhQ?autoplay=1&mute=1&controls=0&loop=1&color=white&modestbranding=1&playsinline=1&rel=0&enablejsapi=1&playlist=fq2CdnfijhQ&start=20" title="YouTube video player"
                            frameBorder="0"
                            allowFullScreen
                            allow="autoplay; accelerometer; encrypted-media; gyroscope; picture-in-picture; clipboard-write;"
                            ></iframe> --}}
                            <video playsinline="" data-automation="VideoPlayer" loop muted autoplay width="100%" poster="{{ $item->image }}" preload="auto" aria-label="video-player">
                                <source src="{{ $item->image }}" type="video/webm">
                                <source src="{{ $item->image }}" type="video/mp4">
                            </video>
                        {{-- <img src="{{asset('images/wedding-hero-1.jpg')}}" class="d-block w-100" alt="Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah"> --}}
                    </div>
                    <div class="hero-section__tagline position-absolute z-2 bg-white p-4 mb-10 ms-5 shadow">
                        <h6 class="text-black fw-light font-secondary mb-2 ls-sm text-uppercase">{{ $item->tagline }}</h6>
                        <h1 class="text-primary mb-3">Yovi Wedding Organizer</h1>
                        <p class="font-secondary text-black">{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
            {{-- <div class="carousel-item position-relative">
                <div class="hero-section-image">
                    <img src="{{asset('images/wedding-hero-2.jpg')}}" class="d-block w-100" alt="Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah">
                </div>
                <div class="hero-section__tagline position-absolute z-2 bg-white p-4 mb-10 ms-5 shadow">
                    <h6 class="text-black fw-light font-secondary mb-2 ls-sm text-uppercase">Buat impianmu menjadi nyata</h6>
                    <h1 class="text-primary mb-3">Wedding Organizer</h1>
                    <p class="font-secondary text-black">Nikmati berbagai paket wedding dengan harga terjangkau! Wedding nyaman, biaya aman! Dapatkan potongan harganya sekarang juga!</p>
                </div>
            </div>
            <div class="carousel-item position-relative">
                <div class="hero-section-image">
                    <img src="{{asset('images/wedding-hero-3.jpg')}}" class="d-block w-100" alt="Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah">
                </div>
                <div class="hero-section__tagline position-absolute z-2 bg-white p-4 mb-10 ms-5 shadow">
                    <h6 class="text-black fw-light font-secondary mb-2 ls-sm text-uppercase">Buat impianmu menjadi nyata</h6>
                    <h1 class="text-primary mb-3">Wedding Organizer</h1>
                    <p class="font-secondary text-black">"Nikmati berbagai paket wedding dengan harga terjangkau! Wedding nyaman, biaya aman! Dapatkan potongan harganya sekarang juga!"</p>
                </div>
            </div> --}}
            <div class="position-absolute z-2 d-flex bottom-0 end-0 me-5 pe-xl-5 mb-10 gap-3">
                <a href="#carouselHero" class="border border-white-50 text-white-50 btn btn-arrow rounded-circle" role="button" data-bs-slide="prev">
                    <i class="d-block bi bi-chevron-left" aria-hidden="true"></i>
                </a>
                <a href="#carouselHero" class="border border-white-50 text-white-50 btn btn-arrow rounded-circle" role="button" data-bs-slide="next">
                    <i class="d-block bi bi-chevron-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</section>
