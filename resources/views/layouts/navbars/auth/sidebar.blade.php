<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
            <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
            <span class="ms-3 font-weight-bold">YPPI Vote</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Program</h6>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('program') ? 'active' : '' }}" href="{{ url('program') }}">
                    <span class="nav-link-text ms-1">Program</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Voting</h6>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('vote-types') ? 'active' : '' }}" href="{{ url('vote-types') }}">
                    <span class="nav-link-text ms-1">Paket Voting</span>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('voting-baru') ? 'active' : '' }}"
                    href="{{ url('voting-baru') }}">
                    <span class="nav-link-text ms-1">Voting Baru</span>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('voting-valid') ? 'active' : '' }}"
                    href="{{ url('voting-valid') }}">
                    <span class="nav-link-text ms-1">Voting Tervalidasi</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data Tiket</h6>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('tickets') ? 'active' : '' }}"
                    href="{{ url('tickets') }}">
                    <span class="nav-link-text ms-1">Tiket Acara</span>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('validasi/ticket') ? 'active' : '' }}"
                    href="{{ route('new-tiket') }}">
                    <span class="nav-link-text ms-1">Tiket Baru</span>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('valid/ticket') ? 'active' : '' }}"
                    href="{{ route('valid-tiket') }}">
                    <span class="nav-link-text ms-1">Tiket Tervalidasi</span>
                </a>
            </li>
            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pengaturan</h6>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Request::is('config') ? 'active' : '' }}" href="{{ url('config') }}">
                    <span class="nav-link-text ms-1">Homepage</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
