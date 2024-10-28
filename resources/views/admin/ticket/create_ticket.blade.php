@extends('layouts.user_type.auth')

@section('content')
    <div class="container py-5 shadow-lg rounded">
        <form action="{{ route('tickets-store') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name">
                <label for="floatingInput">Nama Paket Tiket</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="price" class="form-control" id="floatingInput" placeholder="Monas">
                <label for="floatingInput">Harga Tiket</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="amount" class="form-control" id="floatingInput" placeholder="Monas">
                <label for="floatingInput">Jumlah Tiket</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="bonus" class="form-control" id="floatingInput" placeholder="Monas">
                <label for="floatingInput">Bonus Tiket</label>
            </div>

            <button type="submit" class="btn btn-info">Submit</button>
        </form>

    </div>
@endsection
