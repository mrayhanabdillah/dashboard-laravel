@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-body">
                        @if (Request::is('validasi/ticket'))
                            <h5>Tiket Baru</h5>
                        @else
                            <h5>Tiket Tervalidasi</h5>
                        @endif
                        <div class="table-responsive p-0">
                            <table class="table align-items-center" id="ticket-baru">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-start text-secondary text-xxs font-weight-bolder opacity-7">
                                            No
                                        </th>
                                        @if (Request::is('valid/ticket'))
                                            <th
                                                class="text-uppercase text-start text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Program
                                            </th>
                                        @endif
                                        <th
                                            class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Pemesan
                                        </th>
                                        <th
                                            class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Email
                                        </th>
                                        <th
                                            class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nomor Telpon
                                        </th>
                                        <th
                                            class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Jumlah Tiket
                                        </th>
                                        <th
                                            class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tagihan Tertulis
                                        </th>
                                        @if (Request::is('validasi/ticket'))
                                            <th
                                                class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Validasi
                                            </th>
                                        @else
                                            <th
                                                class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID Tiket
                                            </th>
                                            <th
                                                class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status Tiket
                                            </th>
                                            <th
                                                class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Detail
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $index => $payment)
                                        <tr>
                                            <td class="ps-4 text-start">
                                                <p class="text-xs font-weight-bold mb-0">{{ $index + 1 }}</p>
                                            </td>
                                            @if (Request::is('valid/ticket'))
                                                <td class="text-start">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $payment->program->name }}</p>
                                                </td>
                                            @endif
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">{{ $payment->name }}</p>
                                            </td>
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">{{ $payment->email }}</p>
                                            </td>
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">{{ $payment->phone }}</p>
                                            </td>
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $payment->tickets->amount + $payment->tickets->bonus }}</p>
                                            </td>
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">@rupiah($payment->tickets->price)</p>
                                            </td>
                                            @if (Request::is('valid/ticket'))
                                                <td class="text-start">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $payment->guest->username }}
                                                    </p>
                                                </td>
                                                <td class="text-start">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $payment->guest->state }}
                                                    </p>
                                                </td>
                                            @endif
                                            <td class="text-start">
                                                <a href="{{ route('detail-tiket', $payment->id) }}" class="me-3">
                                                    @if (Request::is('validasi/ticket'))
                                                        <i class="bi bi-check-square-fill"></i>
                                                    @else
                                                        <i class="bi bi-arrow-right-square-fill"></i>
                                                    @endif
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

            var table = $('#ticket-baru').DataTable({
                responsive: true,


            });

        });
    </script>
@endsection
