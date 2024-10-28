@extends('layouts.user_type.auth')

@section('content')
    <div class="container py-5 shadow-lg rounded">
        <form action="{{ route('store-vote-types') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name">
                <label for="floatingInput">Nama Paket</label>
            </div>
            <div class="row g-3">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" name="price" class="form-control" id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Harga Paket</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" name="point" class="form-control" id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Jumlah Point</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" name="bonus_point" class="form-control" id="floatingInput"
                            placeholder="name">
                        <label for="floatingInput">Bonus Point</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-info">Submit</button>
        </form>

    </div>
@endsection
