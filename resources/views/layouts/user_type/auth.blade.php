@extends('layouts.app')

@section('auth')
    @if (\Request::is('/'))
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    @include('layouts.navbars.auth.nav_home')
                </div>
            </div>
        </div>
        @yield('content')
        @include('layouts.footers.guest.footer')
    @else
        @include('layouts.navbars.auth.sidebar')
        <main
            class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg {{ Request::is('rtl') ? 'overflow-hidden' : '' }}">
            @include('layouts.navbars.auth.nav')
            <div class="container-fluid py-4">
                @yield('content')
                @include('layouts.footers.auth.footer')
            </div>
        </main>
    @endif

    @include('components.fixed-plugin')
@endsection
