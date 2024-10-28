<!-- Navbar -->
<nav
    class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ Request::is('static-sign-up') ? 'w-100 shadow-none  navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-0 end-0 mx4' }}" id="navbar-vote-page">
    <div class="container-fluid {{ Request::is('static-sign-up') ? 'container' : 'container-fluid' }}">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-lg" href="/">
            YPPI.Vote!
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ms-auto">
                @if (auth()->user())
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center hover-underline-animation center fw-bold me-2 active"
                            aria-current="page" href="{{ url('dashboard') }}">

                            Dashboard
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link me-2 hover-underline-animation center fw-bold"
                        href="#caraVote">
                        Cara Vote
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 hover-underline-animation center fw-bold"
                        href="#peserta">
                        Peserta
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 hover-underline-animation center fw-bold"
                        href="#tiket">
                        Tiket
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 hover-underline-animation center fw-bold"
                        href="#kontak">
                        Kontak
                    </a>
                </li>
                @if (auth()->user())
                    <li class="nav-item">
                        <a class="nav-link me-2 hover-underline-animation center fw-bold" href="{{ url('/logout') }}">
                            Sign Out
                        </a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>
<!-- End Navbar -->
