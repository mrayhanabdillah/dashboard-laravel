@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Paket Voting</h5>
                            </div>
                            <a href="{{ route('create-vote-types') }}" class="btn bg-gradient-info btn-sm mb-0"
                                type="button">+&nbsp; Paket Voting</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="voteType-table">
                                <thead>
                                    <tr>
                                        <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Paket
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga Paket
                                        </th>
                                        <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jumlah Point
                                        </th>
                                        <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bonus Point
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Active
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($voteTypes as $index => $voteType)
                                        <tr>
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $voteType->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">@rupiah($voteType->price)</p>
                                            </td>
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">{{ $voteType->point }}</p>
                                            </td>
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">{{ $voteType->bonus_point }}</p>
                                            </td>
                                            <td>
                                                <a href="{{ route('active-vote-types', $voteType->id) }}"
                                                    class="fs-5 font-weight-bold mb-0">
                                                    @if ($voteType->is_active == 0)
                                                        <i class="cursor-pointer bi bi-eye-slash-fill text-danger"></i>
                                                    @else
                                                        <i class="cursor-pointer bi bi-eye-fill text-success"></i>
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
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
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {

            var table = $('#voteType-table').DataTable({
                responsive: true,
            });

        });
    </script>
@endsection
