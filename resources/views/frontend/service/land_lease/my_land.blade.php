@extends('frontend.layouts.app')
@section('content')
    <div class="container wid-cont">
        <div class="land-widget">
            <div class="col-md-6 wid-area">
                <div class="row wid-title-sec">
                    <div class="col-xs-7">
                        <h2 class="wid-titel">LAND-{{ $land_lease->id }}</h2>
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
                                        class="pull-right">{{ $land_lease->dagList->land_amount }} শতাংশ
                                    </span></li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> উপজেলাঃ <span
                                        class="pull-right">{{ $land_lease->dagList->upazila->bn_name }}</span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> মৌজাঃ <span
                                        class="pull-right">{{ $land_lease->dagList->mouza->bn_name }}
                                    </span></li>
                        </div>
                        <div class="col-xs-6">
                            <ul class="wid-data-list">
                                <li><i class="fa fa-square" aria-hidden="true"></i> জে. এল. নং <span
                                        class="pull-right">{{ $land_lease->dagList->mouza->j_l_no }} </span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> খতিয়ানঃ <span
                                        class="pull-right">{{ $land_lease->dagList->khatianNo->bn_name }} </span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> দাগঃ <span
                                        class="pull-right">{{ $land_lease->dagList->bn_name }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container wid-cont">
        <div class="land-widget" style="min-height: 30vh">
            <p class="text-center"><a href="" class="btn btn-danger" style="margin-right: 5px;">DUE</a><a
                    href="" class="btn btn-success">PAID</a></p>
            <table class="table table-borderless">
                <tr>
                    <th>#</th>
                    <th>Session</th>
                    <th>Amount</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($lease_sessions as $lease_session)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lease_session->session }}</td>
                        <td>
                            Amount : {{ number_format($lease_session->amount, 2) }}/- Tk <br>
                            Vat : {{ number_format($lease_session->vat, 2) }}/- Tk <br>
                            Tax : {{ number_format($lease_session->tax, 2) }}/- Tk <br>
                            Total Amount : {{ number_format($lease_session->total_amount, 2) }}/- Tk <br>
                        </td>
                        <td>
                            Paid Amount : {{ number_format($lease_session->paid_amount, 2) }}/- Tk <br>
                            Due Amount :
                            {{ number_format($lease_session->total_amount - $lease_session->paid_amount, 2) }}/-
                            Tk <br>
                        </td>
                        <td>{{ $lease_session->status }}</td>
                        <td>
                            @if ($lease_session->total_amount > $lease_session->paid_amount)
                                <a href="{{ route('user.land_session_payment', $lease_session->id) }}"
                                    class="btn btn-primary">Payment</a> <br>
                            @endif
                            <a href="{{ route('user.land_session_payment_details', $lease_session->id) }}"
                                class="btn btn-info" style="margin-top: 6px;">Details</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>


    <div class="container user_panel">


        @if (Route::has('login'))
            <br>

            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs p_nav_tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#my_land" aria-controls="my_land" role="tab" data-toggle="tab">আমার জমি</a>
                    </li>

                    <li role="presentation">
                        <a href="#all_application" aria-controls="all_application" role="tab" data-toggle="tab">সব
                            আবেদন</a>
                    </li>
                    {{-- <li role="presentation"><a href="#shop_transaction" aria-controls="shop_transaction" role="tab" data-toggle="tab">লেনদেন</a></li> --}}
                    <li role="presentation">
                        <a href="#tender_land" aria-controls="tender_land" role="tab" data-toggle="tab">জমির
                            দরপত্র</a>
                    </li>
                    <li role="presentation">
                        <a href="#new_land" aria-controls="new_land" role="tab" data-toggle="tab"> নতুন আবেদন</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="my_land">
                        @include('frontend.service.land_lease.get_land')
                    </div>

                    <div role="tabpanel" class="tab-pane" id="all_application">
                        @include('frontend.service.land_lease.all_application')
                    </div>

                    <div role="tabpanel" class="tab-pane" id="tender_land">
                        @include('frontend.service.land_lease.tender_land')
                    </div>

                    <div role="tabpanel" class="tab-pane" id="new_land">
                        @include('frontend.service.land_lease.new_land')
                    </div>


                </div>

            </div>
        @endif
    </div>
@endsection

@section('cusjs')
    <script>
        $(document).ready(function() {

            // show active tab on reload
            if (location.hash !== '') $('a[href="' + location.hash + '"]').tab('show');

            // remember the hash in the URL without jumping
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                if (history.pushState) {
                    var main = "{{ url('my_shop') }}";
                    var has = '#' + $(e.target).attr('href').substr(1);

                    $('#market_f_searche').attr('action', main + has);
                    history.pushState(null, null, '#' + $(e.target).attr('href').substr(1));
                } else {
                    location.hash = '#' + $(e.target).attr('href').substr(1);
                }
            });


            master_function();
            $(function() {
                $(".date-pick").datepicker({
                    format: 'dd-mm-yyyy'
                }).val();
            });

            $(document).on('keyup', '#searche_user', function(e) {
                let src = $(this).val();
                find_land_transfer_user(src);
            });
            $(document).on('click', '#submit_transfer_user', function(e) {
                let user = $(this).data('user');
                let land = $(this).data('land');
                let url = baseurl + '/land_transfer_user?user=' + user + '&land=' + land;
                window.location.replace(url);

            });

            function find_land_transfer_user(src) {
                let type = $('#searche_type').val();
                let user_id = $('#t_user').val();
                let land_id = $('#t_land').val();
                $.ajax({
                    url: baseurl + '/find_land_transfer_user',
                    method: 'get',
                    data: {
                        search: src,
                        type: type,
                        user_id: user_id,
                        land_id: land_id,
                    },
                    success: function(data) {


                        $('#searche_view').html(data);

                    },
                    error: function() {}
                });
            }


            function master_function() {


            }




            window.payment_option = function(self) {

                var id = $(self).data('id')
                var valu = $(self).val();
                var charge = $(self).data('charge');
                var total = $(self).data('total');
                var g_total = charge + total;
                $('#payment-charge' + id).val(charge);
                $('#payment-total' + id).val(g_total);
                // alert(charge + '--' + total)
                if (valu == 'Bkash' || valu == 'Nagat') {

                    $('#bkash-nogot-' + id).removeClass("hidden");
                    $('#bank-draft-' + id).addClass("hidden");

                } else {
                    $('#bkash-nogot-' + id).addClass("hidden");
                    $('#bank-draft-' + id).removeClass("hidden");
                }

                //alert('bkash-nogot-'+id);

            }

        });
    </script>
@endsection
