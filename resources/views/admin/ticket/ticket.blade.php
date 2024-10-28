@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Data Tiket</h5>
                            </div>
                            <a href="{{ route('tickets-create') }}" class="btn bg-gradient-info btn-sm mb-0"
                                type="button">+&nbsp; Buat
                                Tiket</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center" id="ticket-management">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-start text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Paket Tiket
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Harga Paket
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jumlah Tiket
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Bonus Tiket
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $index => $ticket)
                                        <tr>
                                            <td class="ps-4 text-start">
                                                <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">@rupiah($ticket->price)</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->amount }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $ticket->bonus }}</p>
                                            </td>
                                            <td>
                                                <a href="{{ route('delete-program', $ticket->id) }}" class="me-3">
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

            var table = $('#ticket-management').DataTable({
                responsive: true,


            });

        });
    </script>
@endsection
