@extends('layouts.user_type.guest')

@section('content')
    <div data-bs-spy="scroll" data-bs-target="#navbar-vote-page" data-bs-offset="0" class="scrollspy-example" tabindex="0">
        <div class="image-banner d-flex align-items-center justify-content-center text-light">
            <div class="text-center px-lg-12">
                <h1 class="fw-bold text-light">Ayo Pilih Peserta Favoritmu!</h1>
                <p class="fw-bold">Satu vote mu sangat berarti bagi peserta favoritmu. Vote terbanyak akan mengantarkan
                    peserta
                    favoritmu
                    menjadi {{ $program->name }}</p>
                <button class="btn bg-gradient-secondary">Vote Sekarang!</button>
            </div>
        </div>
        <div class="px-lg-12 py-5 text-center text-light" style="background-color: #DA70D6">
            <h3 class="fw-bold text-light">{{ $program->name }}</h3>
            <p>{{ $program->description }}</p>

        </div>
        <div class="px-lg-8 py-5" id="caraVote">
            <h3 class="text-center">Cara Pilih Peserta Favoritmu</h3>
            <div class="d-lg-flex gap-5">
                <div class="text-center">
                    <i class="bi bi-person-check-fill fs-1" style="color:#DA70D6"></i>
                    <h5>1. Pilih Peserta Favoritmu</h5>
                    <p>Pilih foto peserta yang akan di vote.</p>
                </div>
                <div class="text-center">
                    <i class="bi bi-input-cursor fs-1" style="color:#DA70D6"></i>
                    <h5>2. Isi Data Diri dan Votemu</h5>
                    <p>Isi data diri dan votemu pada form yang tersedia.</p>
                </div>
                <div class="text-center">
                    <i class="bi bi-receipt fs-1" style="color:#DA70D6"></i>
                    <h5>3. Unggah Bukti Transfer</h5>
                    <p>Unggah bukti transfer sesuai dengan paket vote pilihanmu.</p>
                </div>
                <div class="text-center">
                    <i class="bi bi-check2-circle fs-1" style="color:#DA70D6"></i>
                    <h5>4. Votemu Sudah Berhasil</h5>
                    <p>Votemu sudah berhasil, tunggu notifikasi di emailmu.</p>
                </div>
            </div>
        </div>
        <div id="peserta" class="p-5 text-light shadow-lg" style="background-color: #DA70D6">
            <h3 class="fw-bold text-light text-center mb-3">Peserta Mister Young Indonesia 2023</h3>
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($program->participants as $participant)
                    <div class="col">
                        <div class="card" style="width: 18rem">
                            <img src="{{ asset('storage/uploads/participants/' . $participant->photo) }}"
                                class="card-img-top" style="height: 18rem;" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $participant->name }}</h5>
                                <h5 class="">{{ $participant->origin }}</h5>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-info">{{ $participant->votes }}</button>
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#vote{{ $participant->id }}"
                                        class="btn bg-gradient-info">Vote!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="vote{{ $participant->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Voting {{ $program->name }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{route('store-voting')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name@example.com" name="name">
                                            <label for="floatingInput">Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput"
                                                placeholder="name@example.com" name="email">
                                            <label for="floatingInput">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="name@example.com" name="phone">
                                            <label for="floatingInput">Nomor Handphone</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="participant_id">
                                                <option hidden selected>Open this select menu</option>
                                                @foreach ($program->participants as $option)
                                                    <option value="{{ $option->id }}">{{ $option->name }} -
                                                        {{ $option->origin }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Pilihan Anda</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="voteType_id">
                                                <option hidden selected>Open this select menu</option>
                                                @foreach ($voteTypes as $option)
                                                    <option value="{{ $option->id }}">{{ $option->name }} -
                                                        {{ $option->point }}
                                                        @if ($option->bonus_point != 0)
                                                            + {{ $option->bonus_point }}
                                                        @endif Point
                                                        | @rupiah($option->price)
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Paket Vote</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload Bukti Pembayaran</label>
                                            <input class="form-control" name="proof_payment" type="file" id="formFile">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="tiket" class="bg-gradient-secondary px-lg-8 px-3 py-3 text-center">
            <h1 class="text-center fw-bold text-light">Tiket Acara Ning Ayu 2024</h1>
            <p class="text-justify text-light fw-bold">Malam Penganugrahan Ning Ayu 2024 akan diadakan pada June 21, 2024,
                yang
                bertempatkan di Ballroom Sunset 100.
                Pastikan anda menjadi saksi sejarah lahirnya putra-putri kebanggaan Indonesia. Tiket sudah bisa dibeli
                melalui
                link di bawah ini.</p>
            <button type="button" class="btn bg-gradient-info">Beli Tiket</button>
            <p class="text-light fw-bold">Sudah membeli tiket acara Ning Ayu 2024? Silahkan cek tiket anda di bawah ini :
            </p>
            <button type="button" class="btn bg-gradient-info">Cek Tiket</button>
        </div>
        <div id="kontak" class="container mt-5 px-lg-12">
            <h3 class="text-center">Hubungi Kami</h3>
            <form >
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap">
                    <label for="floatingInput">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="phone" class="form-control" id="floatingInput" placeholder="+62861231232">
                    <label for="floatingInput">Nomor Telepon</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Pesan</label>
                </div>
                <div class="d-grid gap-2 mt-2">
                    <button class="btn btn-info" type="button">Kirim</button>
                </div>
            </form>

        </div>
    </div>
@endsection
