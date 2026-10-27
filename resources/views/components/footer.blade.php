<footer class="w-100 pt-5 bg-primary">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 justify-content-center">
            <div class="col text-shadow-sm">
                <h3 class="text-white mb-3">Yovi Wedding Tenda</h3>
                <p class="font-secondary text-white mb-3">
                    Jalan Kedaung Basmol RT 12/RW 06. Kembangan Utara Jakarta Barat
                </p>
                <a href="https://maps.app.goo.gl/Ww1VfETv1jzYkZGf9" target="_blank" role="button" class="d-inline-block m-auto btn px-5 py-2 rounded-pill btn-outline-white ">
                    Lihat di Map
                </a>
            </div>
            <div class="col">
                <h3 class="text-shadow-sm text-white">Explore</h3>
                <ul class="list-unstyled">
                    <li class="mb-1 slideRight">
                        <a class="font-secondary text-shadow-sm text-white" href="{{route('frontend.home')}}">
                            <i class="bi bi-arrow-right"></i> Home
                        </a>
                    </li>
                    <li class="mb-1 slideRight">
                        <a class="font-secondary text-shadow-sm text-white" href="{{route('frontend.about')}}">
                            <i class="bi bi-arrow-right"></i> About
                        </a>
                    </li>
                    <li class="mb-1 slideRight">
                        <a class="font-secondary text-shadow-sm text-white" href="{{route('frontend.gallery')}}">
                            <i class="bi bi-arrow-right"></i> Gallery
                        </a>
                    </li>
                    <li class="mb-1 slideRight">
                        <a class="font-secondary text-shadow-sm text-white" href="{{route('frontend.pricelist.packet.index')}}">
                            <i class="bi bi-arrow-right"></i> Pricelist
                        </a>
                    </li>
                    <li class="mb-1 slideRight">
                        <a class="font-secondary text-shadow-sm text-white" href="{{route('frontend.service')}}">
                            <i class="bi bi-arrow-right"></i> Services
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h3 class="text-shadow-sm text-white">PriceList</h3>
                <ul class="list-unstyled">
                    <li class="mb-1 slideRight">
                        <a class="font-secondary text-shadow-sm text-white" href="{{route('frontend.pricelist.packet.index')}}">
                            <i class="bi bi-arrow-right"></i> Paket
                        </a>
                    </li>
                    <li class="mb-1 slideRight">
                        <a class="font-secondary text-shadow-sm text-white" href="{{route('frontend.pricelist.tent.index')}}">
                            <i class="bi bi-arrow-right"></i> Tenda
                        </a>
                    </li>
                    <li class="mb-1 slideRight">
                        <a class="font-secondary text-shadow-sm text-white" href="{{route('frontend.pricelist.makeup.index')}}">
                            <i class="bi bi-arrow-right"></i> Make Up
                        </a>
                    </li>
                    <li class="mb-1 slideRight">
                        <a class="font-secondary text-shadow-sm text-white" href="{{route('frontend.pricelist.accessories.index')}}">
                            <i class="bi bi-arrow-right"></i> Aksesoris
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <h3 class="text-shadow-sm text-white">Sosial Media Kami</h3>
                <ul class="list-unstyled d-flex gap-2">
                    <li class="">
                        <a class="font-secondary text-shadow-sm text-white" target="_blank" href="https://www.facebook.com/profile.php?id=100041398556814">
                            <i class="bi bi-facebook fs-4"></i>
                        </a>
                    </li>
                    <li class="">
                        <a class="font-secondary text-shadow-sm text-white" target="_blank" href="https://www.instagram.com/Yovitenda/">
                            <i class="bi bi-instagram fs-4"></i>
                        </a>
                    </li>
                    <li class="">
                        <a class="font-secondary text-shadow-sm text-white" target="_blank" href="https://wa.me/6285156056381?text=Halo%2C%20saya%20ingin%20bertanya%20mengenai%20wedding%20organizer.">
                            <i class="bi bi-whatsapp fs-4"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="border border-white">
        <div class="text-center text-white">
            <p>
                Yovi Wedding &copy; {{ date('Y') }}
            </p>
            <p>Made With ❤️
                {{-- by <a href="https://www.linkedin.com/in/ardianto-nugroho-004043244/" class="text-white"
                    target="_blank" rel="noopener noreferrer">Ardianto</a> --}}
                </p>
        </div>
    </div>
</footer>
