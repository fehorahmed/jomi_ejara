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
@endsection
