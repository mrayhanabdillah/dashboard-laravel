@extends('layouts.user_type.auth')

@section('content')
    <div class="card">
        <div class="card-body p-3">
            <h5>Tiket Baru {{ $payment->program->name }}</h5>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Pemesan</label>
                        <p class="ps-2">{{ $payment->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email Pemesan</label>
                        <p class="ps-2">{{ $payment->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No. Telpon Pemesan</label>
                        <p class="ps-2">{{ $payment->phone }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah Tiket</label>
                        <p class="ps-2">{{$payment->tickets->name}} | {{$payment->tickets->amount + $payment->tickets->bonus }} Tiket |
                            @rupiah($payment->tickets->price)</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <label for="exampleFormControlInput1" class="form-label">Bukti Transfer</label>
                    <div class="mb-3">
                        <img class="img-fluid" src="{{ asset('storage/uploads/bukti_bayar/' . $payment->proof_payments) }}">
                    </div>
                </div>
            </div>

            @if ($payment->state == 0)
                <div class="text-end">
                    <a href="{{ route('delete-payment', $payment->id) }}" class="btn btn-danger">Hapus Tiket</a>
                    <a href="{{ route('valid-payment', $payment->id) }}" class="btn btn-info">Validasi Tiket</a>
                </div>
            @endif



        </div>
    </div>
@endsection
