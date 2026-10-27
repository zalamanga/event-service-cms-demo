<header>
    <nav class="{{Route::is('/') ? 'bg-transparent' : 'bg-primary'}} header-top fixed-top">
        <div class="container">
            <div class="logo">
                 <a href="{{route('frontend.home')}}"><img style="width:65px;height:65px;" src="{{asset('images/Yovi Tenda Logo.png')}}" alt="Logo | Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah"></a>
                <!--<a href="{{route('frontend.home')}}" class="font-primary fs-4 text-white m-0">Yovi Tenda</a>-->
            </div>
            <ul class="header-top-right nav">
                <div class="position-absolute z-2 top-0 end-0 p-2 m-3 d-lg-none">
                    <button class="btn-close"></button>
                </div>
                <li class="nav-item">
                    <a class="nav-link text-white text-uppercase {{Route::is('frontend.home') ? 'active' : ''}}" aria-current="page" href="{{route('frontend.home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white text-uppercase {{Route::is('frontend.about') ? 'active' : ''}}" href="{{route('frontend.about')}}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white text-uppercase {{Route::is('frontend.gallery') ? 'active' : ''}}" href="{{route('frontend.gallery')}}">Galeri</a>
                </li>
                <li class="nav-item">
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn text-white border-0 nav-link text-white text-uppercase {{Request::segment(1) == 'pricelist' ? 'active' : ''}}" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Pricelist
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item {{ request()->is('pricelist/packet') ? 'active' : '' }}" href="{{route('frontend.pricelist.packet.index')}}">Paket</a>
                                <a class="dropdown-item {{ request()->is('pricelist/tent') ? 'active' : '' }}" href="{{route('frontend.pricelist.tent.index')}}">Tenda</a>
                                <a class="dropdown-item {{ request()->is('pricelist/makeup') ? 'active' : '' }}" href="{{route('frontend.pricelist.makeup.index')}}">Make Up</a>
                                <a class="dropdown-item {{ request()->is('pricelist/accessories') ? 'active' : '' }}" href="{{route('frontend.pricelist.accessories.index')}}">Aksesoris</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white text-uppercase {{Route::is('frontend.service') ? 'active' : ''}}" href="{{route('frontend.service')}}">Layanan</a>
                </li>
            </ul>
            <a role="button" class="btn p-0 burger-btn d-block d-lg-none">
                <i class="bi bi-justify fs-3 text-white"></i>
            </a>
        </div>
    </nav>
</header>
