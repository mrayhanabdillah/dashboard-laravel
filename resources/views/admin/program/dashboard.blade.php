@extends('layouts.user_type.auth')

@section('content')
    <h3>Dashboard {{ $program->name }}</h3>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pendapatan Harian</p>
                                <h5 class="font-weight-bolder mb-0">
                                    @rupiah($pendapatanHarian)
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="bi bi-cash text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pendapatan</p>
                                <h5 class="font-weight-bolder mb-0">
                                    @rupiah($pendapatanTotal)
                                    <span class="text-success text-sm font-weight-bolder">+3%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="bi bi-cash-stack text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Program Target Vote</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="progress-percentage">
                                                <span class="text-md font-weight-bold">{{ $percent }}%</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-info" style="width: {{ $percent }}%;"
                                                role="progressbar" aria-valuenow="{{ $percent }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="bi bi-list-ul text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Vote</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{ count($pendingVote) }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                <i class="bi bi-hourglass-split text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-3 mt-3">
        <h5>Data Program</h5>
        <div class="card-body">
            <form action="{{ route('update-program', $program->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="name" value="{{ $program->name }}" class="form-control"
                        id="floatingInput" placeholder="name">
                    <label for="floatingInput">Nama Acara</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="location" value="{{ $program->location }}" class="form-control"
                        id="floatingInput" placeholder="Monas">
                    <label for="floatingInput">Tempat Acara</label>
                </div>

                <div class="row g-3">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="date" name="date_program" value="{{ $program->date_program }}"
                                class="form-control" id="floatingInput" placeholder="name">
                            <label for="floatingInput">Tanggal Acara</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="time" name="time_program" value="{{ $program->time_program }}"
                                class="form-control" id="floatingInput" placeholder="name">
                            <label for="floatingInput">Waktu Acara</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="date" name="open_vote" value="{{ $program->open_vote }}"
                                class="form-control" id="floatingInput" placeholder="name">
                            <label for="floatingInput">Tanggal Vote Buka</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="date" name="close_vote" value="{{ $program->close_vote }}"
                                class="form-control" id="floatingInput" placeholder="name">
                            <label for="floatingInput">Tanggal Vote Tutup</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="number" name="target_vote" value="{{ $program->target_vote }}"
                                class="form-control" id="floatingInput" placeholder="name">
                            <label for="floatingInput">Target Vote</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px">{{ $program->description }}</textarea>
                    <label for="floatingTextarea2">Tentang Acara</label>
                </div>
                <button type="submit" class="btn btn-info">Update</button>
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">Peserta {{ $program->name }}</h5>
                </div>
                <a href="{{ route('create-participant', $program->id) }}"
                    class="btn bg-gradient-info btn-sm mb-0">+&nbsp; New
                    Participant</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="participants-voting">
                    <thead>
                        <tr>
                            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                No
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Foto
                            </th>
                            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nama
                            </th>
                            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Daerah
                            </th>
                            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Votes
                            </th>
                            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($program->participants as $index => $participant)
                            <tr>
                                <td class="text-start">
                                    <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                </td>
                                <td>
                                    <div>
                                        <img src="{{ asset('storage/uploads/participants/' . $participant->photo) }}"
                                            class="avatar avatar-lg me-3">
                                    </div>
                                </td>
                                <td class="text-start">
                                    <p class="text-xs font-weight-bold mb-0">{{ $participant->name }}</p>
                                </td>
                                <td class="text-start">
                                    <p class="text-xs font-weight-bold mb-0">{{ $participant->origin }}</p>
                                </td>
                                <td class="text-start">
                                    <p class="text-xs font-weight-bold mb-0">{{ $participant->votes }}</p>
                                </td>
                                <td class="text-start">
                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                        data-bs-original-title="Edit user">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <span>
                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4 mt-3">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">Voting Tervalidasi</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive p-0">
                <table class="table align-items-center" id="voting-management">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                No
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nama Voter
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Email
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nomor Telepon
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Program
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Peserta Pilihan
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Tagihan Tertulis
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Jumlah Vote
                            </th>

                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Detail
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($program->votings as $index => $voting)
                            <tr>
                                <td class="ps-4">
                                    <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $voting->name }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $voting->email }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $voting->phone }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $program->name }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $voting->participant->name }} -
                                        {{ $voting->participant->origin }}</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">@rupiah($voting->voteType->price)</p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $voting->voteType->point + $voting->voteType->bonus_point }}</p>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('check-voting', $voting->id) }}">

                                        <i class="bi bi-arrow-right-square-fill"></i>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(function() {

            var table = $('#participants-voting').DataTable({
                responsive: true,


            });

        });
    </script>
@endsection
