@extends('layouts.user_type.auth')

@section('content')
    <div class="card">
        <div class="card-body p-3">
            <h5>Voting Baru {{ $voting->programs->name }}</h5>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama Voter</label>
                        <p class="ps-2">{{ $voting->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email Voter</label>
                        <p class="ps-2">{{ $voting->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No. Telpon Voter</label>
                        <p class="ps-2">{{ $voting->phone }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Jumlah Vote</label>
                        <p class="ps-2">{{ $voting->voteType->point + $voting->voteType->bonus_point }} Votes |
                            @rupiah($voting->voteType->price)</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Peserta Pilihan</label>
                        <p class="ps-2">{{ $voting->participant->name }} | {{ $voting->participant->origin }}</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <label for="exampleFormControlInput1" class="form-label">Bukti Transfer</label>
                    <div class="mb-3">
                        <img class="img-fluid" src="{{ asset('storage/uploads/bukti_bayar/' . $voting->proof_payment) }}">
                    </div>
                </div>
            </div>

            @if ($voting->state == 'pending')
                <div class="text-end">
                    <a href="{{ route('delete-voting', $voting->id) }}" class="btn btn-danger">Hapus Voting</a>
                    <a href="{{ route('validate-voting', $voting->id) }}" class="btn btn-info">Validasi Voting</a>
                </div>
            @endif



        </div>
    </div>
@endsection
