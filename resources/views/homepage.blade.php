@extends('layouts.user_type.guest')

@section('content')

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if (count($config->images) != 0)
                @foreach ($config->images as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/uploads/carousel_images/' . $image->filename) }}" style="max-height: 500px" class="d-block w-100"
                            alt="carousel-img">
                    </div>
                @endforeach
            @else
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/1.jpg') }}" class="d-block w-100" alt="carousel-img">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/2.jpg') }}" class="d-block w-100" alt="carousel-img">
                </div>
            @endif

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mt-3">
        <h3 class="text-center fs-4">{{ $config->title }}</h3>
        <div class="row g-2">
            @foreach ($programs as $program)
                <div class="col-6">
                    <button class="btn btn-info fs-6 w-100" style="height:60px" type="button" data-bs-toggle="modal"
                        data-bs-target="#voting{{ $program->id }}"><i class="fas fa-vote-yea"></i>
                        {{ $program->name }}</button>
                </div>
                <div class="modal fade" id="voting{{ $program->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>Apakah anda sudah membaca Syarat dan Ketentuan Pembelian Tiket, serta Tahapan Pemesanan
                                    Tiket di bawah?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Belum</button>
                                <a href="{{ route('program-page', $program->id) }}" target="_blank"
                                    class="btn btn-info">Sudah</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-3">
        <h3 class="text-center fs-4">Ketentuan Voting Finalis dan
            Pemesanan Tiket</h3>
        {!! $config->tnc !!}
    </div>
@endsection
