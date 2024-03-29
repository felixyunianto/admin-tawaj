<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="javascript:void(0)">
            <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Admin Tawajjuhad</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link @if (Request::is('home')) active @endif" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::is('category-content')) active @endif d-flex align-items-center"
                    href="{{ route('content-category') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-quran text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1 mt-1">Konten</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  @if (Request::is('button-page')) active @endif d-flex align-items-center"
                    href="{{ route('button_page.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-book text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1 mt-1">Button Page</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  @if (Request::is('notifikasi')) active @endif d-flex align-items-center"
                    href="{{ route('notifications.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-bell text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1 mt-1">Notifikasi</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
