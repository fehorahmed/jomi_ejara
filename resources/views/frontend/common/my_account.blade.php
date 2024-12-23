@extends('frontend.layouts.app')

@section('content')
    <div class="container user_panel">
        @include('frontend.common.frontend_user_menu')
        @if (Route::has('login'))
            <?php $user = Auth::user(); ?>

            @if (Auth::user()->isMember())
                <style>
                    body {
                        background: #eee
                    }

                    .card {
                        border: none;
                        position: relative;
                        overflow: hidden;
                        border-radius: 8px;
                        cursor: pointer;
                        padding-left: 15px;
                    }

                    .card:before {
                        content: "";
                        position: absolute;
                        left: 0;
                        top: 0;
                        width: 4px;
                        height: 100%;
                        background-color: #E1BEE7;
                        transform: scaleY(1);
                        transition: all 0.5s;
                        transform-origin: bottom
                    }

                    .card:after {
                        content: "";
                        position: absolute;
                        left: 0;
                        top: 0;
                        width: 4px;
                        height: 100%;
                        background-color: #8E24AA;
                        transform: scaleY(0);
                        transition: all 0.5s;
                        transform-origin: bottom
                    }

                    .card:hover::after {
                        transform: scaleY(1)
                    }

                    .fonts {
                        font-size: 11px
                    }

                    .imag {
                        height: 150px;
                        width: auto;
                    }
                </style>
                @php
                    $auth = auth()->user();
                @endphp

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ session('error') }}</li>
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session('success') }}</li>
                        </ul>
                    </div>
                @endif
                <div class="card ">
                    <div class="">
                        @if ($auth->photo)
                            <img src="{{ asset('storage/' . $auth->photo) }}" class="imag" alt="Photo">
                        @else
                            <img src="{{ asset('frontend/img/avatar.jpg') }}" class="imag" alt="Photo">
                        @endif

                    </div>
                    <h5 class="mt-2 mb-0">{{ $auth->name }}</h5>
                    <h5 class="mt-2 mb-0">{{ $auth->phone }}</h5>
                    <h5 class="mt-2 mb-0">{{ $auth->email }}</h5>
                    <h5 class="mt-2 mb-0">{{ $auth->nid }}</h5>
                </div>
                {{-- <div class="jumbotron"> --}}
                <div class="container user_panel">


                    @if (Route::has('login'))
                        <br>

                        <div>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs p_nav_tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#my_land" aria-controls="my_land" role="tab" data-toggle="tab">আমার
                                        জমি</a>
                                </li>

                                <li role="presentation">
                                    <a href="#all_application" aria-controls="all_application" role="tab"
                                        data-toggle="tab">সব
                                        আবেদন</a>
                                </li>
                                {{-- <li role="presentation"><a href="#shop_transaction" aria-controls="shop_transaction" role="tab" data-toggle="tab">লেনদেন</a></li> --}}
                                <li role="presentation">
                                    <a href="#tender_land" aria-controls="tender_land" role="tab" data-toggle="tab">জমির
                                        দরপত্র</a>
                                </li>
                                <li role="presentation">
                                    <a href="#new_land" aria-controls="new_land" role="tab" data-toggle="tab"> নতুন
                                        আবেদন</a>
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
                    {{-- </div> --}}
                </div>

                {{-- @elseif(Auth::user()->isDigitalCenter())
    <div class="jumbotron">
        <div class="row w-100">
            <div class="col-md-4">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="text-info text-center mt-3">
                        <h4>
                            আজকের মোট নতুন রেজিস্ট্রেশন
                        </h4>
                    </div>
                    <div class="text-info text-center mt-2">
                        <h1>
                            <?php $today_new_regi = \App\Models\User::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')
                                ->where('created_by', Auth::user()->id)
                                ->get()
                                ->count(); ?>
                            {{ $today_new_regi }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="text-warning text-center mt-3">
                        <h4>
                            এ যাবত মোট রেজিস্ট্রেশন
                        </h4>
                    </div>
                    <div class="text-warning text-center mt-2">
                        <h1>
                            <?php $total_regi = \App\Models\User::where('created_by', Auth::user()->id)
                                ->get()
                                ->count(); ?>
                            {{ $total_regi }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-danger mx-sm-1 p-3">
                    <div class="text-danger text-center mt-3">
                        <h4>
                            আজকের মোট আয়
                        </h4>
                    </div>
                    <div class="text-danger text-center mt-2">
                        <h1>
                            <?php $total_today = \App\Payment::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')
                                ->where('digi_center_user_id', Auth::user()->id)
                                ->get()
                                ->sum('amount'); ?>
                            {{ $total_today }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row w-100">
            <div class="col-md-4">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="text-success text-center mt-3">
                        <h4>
                            এ যাবত মোট আয়
                        </h4>
                    </div>
                    <div class="text-success text-center mt-2">
                        <h1>
                            <?php $total_all = \App\Rent::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')
                                ->where('rent_status', 'yes')
                                ->get()
                                ->sum('rent_amount'); ?>
                            {{ $total_all }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="text-danger text-center mt-3">
                        <h4>
                            আপনার দ্বারা ইউনিয়ন পরিষদের আজকের আয়
                        </h4>
                    </div>
                    <div class="text-danger text-center mt-2">
                        <h1>
                            <?php $total_all = \App\Payment::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')
                                ->where('digi_center_user_id', Auth::user()->id)
                                ->whereRaw('to_uni IS NOT NULL')
                                ->get()
                                ->sum('to_uni'); ?>
                            {{ $total_all }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-danger mx-sm-1 p-3">
                    <div class="text-danger text-center mt-3">
                        <h4>
                            আপনার দ্বারা ইউনিয়ন পরিষদের মোট আয়
                        </h4>
                    </div>
                    <div class="text-danger text-center mt-2">
                        <h1>
                            <?php $total_all = \App\Payment::where('digi_center_user_id', Auth::user()->id)
                                ->whereRaw('to_uni IS NOT NULL')
                                ->get()
                                ->sum('to_uni'); ?>
                            {{ $total_all }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
            @elseif(Auth::user()->isAdmin())
                <div class="jumbotron">
                    <div class="row w-100">
                        <div class="col-md-4">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="text-info text-center mt-3">
                                    <h4>
                                        আজকের মোট নতুন রেজিস্ট্রেশন
                                    </h4>
                                </div>
                                <div class="text-info text-center mt-2">
                                    <h1>
                                        <?php $today_new_regi = \App\Models\User::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')->count(); ?>
                                        {{ $today_new_regi }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-success mx-sm-1 p-3">
                                <div class="text-warning text-center mt-3">
                                    <h4>
                                        এ যাবত মোট রেজিস্ট্রেশন
                                    </h4>
                                </div>
                                <div class="text-warning text-center mt-2">
                                    <h1>
                                        <?php $total_regi = \App\Models\User::get()->count(); ?>
                                        {{ $total_regi }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-danger mx-sm-1 p-3">
                                <div class="text-danger text-center mt-3">
                                    <h4>
                                        আজকের মোট আয় (দোকান ভাড়া)
                                    </h4>
                                </div>
                                <div class="text-danger text-center mt-2">
                                    <h1>
                                        {{-- <?php $total_today = \App\Rent::where('updated_at', '>=', date('Y-m-d') . ' 00:00:00')
                                            ->get()
                                            ->sum('total'); ?>
                            {{ $total_today }} --}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row w-100">
                        <div class="col-md-4">
                            <div class="card border-info mx-sm-1 p-3">
                                <div class="text-success text-center mt-3">
                                    <h4>
                                        এ যাবত মোট আয় (দোকান ভাড়া)
                                    </h4>
                                </div>
                                <div class="text-success text-center mt-2">
                                    <h1>
                                        {{-- <?php $total_all = \App\Rent::where('rent_status', 'yes')->get()->sum('total'); ?>
                            {{ $total_all }} --}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-success mx-sm-1 p-3">
                                <div class="text-danger text-center mt-3">
                                    <h4>
                                        ডিজিটাল সেন্টার এর আজকের আয়
                                    </h4>
                                </div>
                                <div class="text-danger text-center mt-2">
                                    <h1>
                                        {{-- <?php $total_all = \App\Payment::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')
                                            ->whereRaw('to_uni IS NOT NULL')
                                            ->get()
                                            ->sum('to_digi'); ?>
                            {{ $total_all }} --}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-danger mx-sm-1 p-3">
                                <div class="text-danger text-center mt-3">
                                    <h4>
                                        ডিজিটাল সেন্টার এর মোট আয়
                                    </h4>
                                </div>
                                <div class="text-danger text-center mt-2">
                                    <h1>
                                        {{-- <?php $total_all = \App\Payment::whereRaw('to_uni IS NOT NULL')->get()->sum('to_digi'); ?>
                            {{ $total_all }} --}}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            @endif
        @endif
    </div>
@endsection
@section('cusjs')
    <style type="text/css">
        .my-card {
            position: absolute;
            left: 40%;
            top: -20px;
            border-radius: 50%;
        }
    </style>
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
                if (valu == 'Bkash' || valu == 'Nagad') {

                    $('#bkash-nogot-' + id).removeClass("hidden");
                    $('#bank-draft-' + id).addClass("hidden");
                    $('#cash-area-' + id).addClass("hidden");

                } else if (valu == 'Cash') {
                    $('#bkash-nogot-' + id).addClass("hidden");
                    $('#bank-draft-' + id).addClass("hidden");
                    $('#cash-area-' + id).removeClass("hidden");
                } else {
                    $('#bkash-nogot-' + id).addClass("hidden");
                    $('#bank-draft-' + id).removeClass("hidden");
                    $('#cash-area-' + id).addClass("hidden");
                }

                //alert('bkash-nogot-'+id);

            }

        });
    </script>
@endsection
