@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Program</h5>
                            </div>
                            <a href="{{ route('create-program') }}" class="btn bg-gradient-info btn-sm mb-0"
                                type="button">+&nbsp;
                                Program Baru</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center" id="program-management">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-start text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Acara
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Waktu Acara
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Buka Vote
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tutup Vote
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            active
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programs as $index => $program)
                                        <tr>
                                            <td class="ps-4 text-start">
                                                <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $program->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ Carbon\Carbon::parse($program->date_program)->locale('id')->isoFormat('D MMMM Y') }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ Carbon\Carbon::parse($program->open_vote)->locale('id')->isoFormat('D MMMM Y') }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ Carbon\Carbon::parse($program->close_vote)->locale('id')->isoFormat('D MMMM Y') }}
                                                </p>
                                            </td>
                                            <td>
                                                <a href="{{ route('active-program', $program->id) }}"
                                                    class="fs-5 font-weight-bold mb-0">
                                                    @if ($program->is_active == 0)
                                                        <i class="cursor-pointer bi bi-eye-slash-fill text-danger"></i>
                                                    @else
                                                        <i class="cursor-pointer bi bi-eye-fill text-success"></i>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard-program', $program->id) }}" class="me-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Lihat Dashboard">
                                                    <i class="bi bi-arrow-up-right-square-fill text-secondary"></i>
                                                </a>
                                                <a href="{{ route('delete-program', $program->id) }}" class="me-3">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {

            var table = $('#program-management').DataTable({
                responsive: true,


            });

        });
    </script>
@endsection
