@extends('layouts.user_type.auth')

@section('content')
    <div class="container py-5 shadow-lg rounded">
        <form action="{{ route('store-program') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name">
                <label for="floatingInput">Nama Acara</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="location" class="form-control" id="floatingInput" placeholder="Monas">
                <label for="floatingInput">Tempat Acara</label>
            </div>

            <div class="row g-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="date_program" class="form-control" id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Tanggal Acara</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="time" name="time_program" class="form-control" id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Waktu Acara</label>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="open_vote" class="form-control" id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Tanggal Vote Buka</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" name="close_vote" class="form-control" id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Tanggal Vote Tutup</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" name="target_vote" class="form-control" id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Target Vote</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Tentang Acara</label>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>

    </div>
@endsection
