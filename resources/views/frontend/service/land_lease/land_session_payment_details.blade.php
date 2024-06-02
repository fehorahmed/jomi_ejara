@extends('frontend.layouts.app')

@section('content')
    <div class="container wid-cont">
        <div class="land-widget">
            <div class="col-md-6 wid-area">
                <div class="row wid-title-sec">
                    <div class="col-xs-7">
                        <h2 class="wid-titel">LAND-{{ $lease_session->dagList->id }}</h2>
                        {{-- <p class="wid-sub-title">(date থেকে date)</p> --}}
                    </div>
                    <div class="col-xs-5">
                        {{-- @if (true)
                            <button type="button" class="btn btn-danger pull-right" data-toggle="modal"
                                data-target="#land_transfer_model_1">
                                হস্তান্তর
                            </button>
                        @else
                            status
                        @endif --}}

                        <!-- Button trigger modal -->
                        <!--{{ url('land_renew_aplication') }}-->
                        {{-- <a href="{{ route('user.land_details', $land_lease->id) }}" class="btn btn-danger pull-right">
                            নবায়ন
                        </a> --}}
                    </div>
                </div>
                <div class="wid-data">
                    <div class="row">
                        <div class="col-xs-6">
                            <ul class="wid-data-list">
                                <li><i class="fa fa-square" aria-hidden="true"></i> জমির পরিমানঃ <span
                                        class="pull-right">{{ $lease_session->dagList->land_amount }} শতাংশ
                                    </span></li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> উপজেলাঃ <span
                                        class="pull-right">{{ $lease_session->dagList->upazila->bn_name }}</span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> মৌজাঃ <span
                                        class="pull-right">{{ $lease_session->dagList->mouza->bn_name }}
                                    </span></li>
                        </div>
                        <div class="col-xs-6">
                            <ul class="wid-data-list">
                                <li><i class="fa fa-square" aria-hidden="true"></i> জে. এল. নং <span
                                        class="pull-right">{{ $lease_session->dagList->mouza->j_l_no }} </span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> খতিয়ানঃ <span
                                        class="pull-right">{{ $lease_session->dagList->khatianNo->bn_name }} </span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> দাগঃ <span
                                        class="pull-right">{{ $lease_session->dagList->bn_name }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container wid-cont">
        <div class="land-widget">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="min-height: 40vh">
                        <div class="card-body p-4">
                            <table class="table table-borderless">
                                <tr>
                                    <th>#</th>
                                    <th>Session</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($tr_logs as $tr_log)
                                    @php
                                        $total += $tr_log->amount;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tr_log->landLeaseSession->session }}</td>
                                        <td>
                                            {{ number_format($tr_log->amount, 2) }}/- Tk
                                        </td>
                                        <td>
                                            {{ $tr_log->created_at->format('Y-m-d') }}
                                        </td>

                                        <td>{{ $lease_session->status }}</td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total :</td>
                                    <td>{{ number_format($total, 2) }} /- Tk</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cusjs')
    <script>
        $(function() {


        });
    </script>
@endsection
