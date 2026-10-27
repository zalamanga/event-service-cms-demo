<div id="sidebar">
    <div class="sidebar-wrapper active border border-right">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}"><img style="width:150px;height:150px;" src="{{asset('images/Yovi Tenda Logo.png')}}" alt="Yovi Tenda Sewa Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah" srcset=""></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{Request::is('admin/dashboard') ? 'active': ''}}">
                    <a href="{{route('admin.dashboard')}}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{Request::segment(2) == 'category' ? 'active': ''}}">
                    <a href="{{route('admin.pages.category')}}" class="sidebar-link">
                        <i class="bi bi-card-list"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub {{Request::segment(2) == 'packet' ? 'active': ''}}">
                    <a href="" class='sidebar-link'>
                        <i class="bi bi-box2-heart"></i>
                        <span>Paket</span>
                    </a>
                    <ul class="submenu ps-2">
                        <li class="submenu-item {{Request::is('admin/packet') || Request::segment(2) == 'packet' ? 'active': ''}}">
                            <a href="{{route('admin.pages.packet')}}" class="submenu-link">
                                <i class="bi bi-box2-heart-fill"></i>
                                <span>
                                    Paket Layanan
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub {{Request::segment(2) == 'setting' ? 'active': ''}}">
                    <a href="" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Setting Page</span>
                    </a>
                    <ul class="submenu ps-2">
                        <li class="submenu-item  {{Request::segment(3) == 'gallery' ? 'active': ''}}">
                            <a href="{{route('admin.pages.gallery')}}" class='submenu-link'>
                                <i class="bi bi-images"></i>
                                <span>Gallery</span>
                            </a>
                        </li>
                        <li class="submenu-item  {{Request::segment(3) == 'banner' ? 'active': ''}}">
                            <a href="{{route('admin.pages.banner')}}" class='submenu-link'>
                                <i class="bi bi-card-image"></i>
                                <span>Banner</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
