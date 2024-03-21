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
                    <div class=""> <img src="{{ asset($auth->photo) }}" class="imag"> </div>
                    <h5 class="mt-2 mb-0">{{ $auth->name }}</h5>
                    <h5 class="mt-2 mb-0">{{ $auth->phone }}</h5>
                    <h5 class="mt-2 mb-0">{{ $auth->email }}</h5>
                    <h5 class="mt-2 mb-0">{{ $auth->nid }}</h5>
                </div>
                <div class="jumbotron">
                    <?php
                    // if ($auth->landless == 1) {
                    //     $services = \App\Service::where('is_active', 1)->orderBy('position', 'asc')->get();
                    // } else {
                    //     $services = \App\Service::where('is_active', 1)->orderBy('position', 'asc')->get();
                    // }
                    
                    // $payment_by_user = \App\Payment::where('user_id', $user->id)->orderBy('id', 'desc')->get()->first();
                    //dd($payment_by_user);
                    if (!empty($payment_by_user) && $payment_by_user->which_time) {
                        $which_time = $payment_by_user->which_time;
                    } else {
                        $which_time = null;
                    }
                    //dump(csrf_token());
                    //http://103.218.26.178:2145/shariatpur/citizen_certificate_pdf?uid=13&token=m6uS5bY1URzLjnqp1Sd9uADK97vR62GrmrIrw6Fc
                    ?>
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <div class="man-service_one">
                                <div class="lang_enbn">
                                    <a class="btn btn-xs Bn_lang" target="_blank"
                                        href="{{ url('profile_pdf?uid=' . $user->id . '&token=' . csrf_token()) }}"
                                        target="_blank">
                                        বাংলা
                                    </a>

                                    <a class="btn btn-xs En_lang"
                                        href="{{ url('profile_pdf?uid=' . $user->id . '&token=' . csrf_token()) }}">
                                        EN
                                    </a>
                                </div>
                                <a target="_blank"
                                    href="{{ url('profile_pdf?uid=' . $user->id . '&token=' . csrf_token()) }}"
                                    target="_blank">
                                    <img src="{{ url('public/icons/profile.png') }}">
                                </a>
                                <a target="_blank"
                                    href="{{ url('profile_pdf?uid=' . $user->id . '&token=' . csrf_token()) }}">
                                    <h1>
                                        প্রোফাইল
                                    </h1>
                                </a>
                            </div>
                        </div>




                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <div class="man-service_one">
                                <div class="lang_enbn">
                                    <a target="_blank" class="Bn_lang" href="{{ url('my_shop') }}" target="_blank">
                                        বাংলা
                                    </a>




                                    <a target="_blank" class="En_lang" href="{{ url('my_shop') }}">
                                        EN
                                    </a>
                                </div>
                                <a target="_blank" href="" target="_blank">

                                    <img
                                        src="http://192.168.0.101/pourashava/storage/uploads/fullsize/2019-07/marketshop.png">
                                </a>
                                <a target="_blank" href="" target="_blank">
                                    <h1>
                                        আমার দোকান
                                    </h1>
                                </a>
                            </div>
                        </div>



                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <div class="man-service_one">
                                <div class="lang_enbn">
                                    <a target="_blank" class="Bn_lang" href="{{ url('my_land') }}" target="_blank">
                                        বাংলা
                                    </a>




                                    <a target="_blank" class="En_lang" href="{{ url('my_land') }}">
                                        EN
                                    </a>
                                </div>
                                <a target="_blank" href="" target="_blank">

                                    <img src="{{ asset('/public/frontend/img/lease_land_icon.png') }}">
                                </a>
                                <a target="_blank" href="" target="_blank">
                                    <h1>
                                        জমি ইজারা
                                    </h1>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <div class="man-service_one">
                                <div class="lang_enbn">
                                    <a target="_blank" class="Bn_lang" href="{{ url('contractor') }}" target="_blank">
                                        বাংলা
                                    </a>

                                    <a target="_blank" class="En_lang" href="{{ url('contractor') }}">
                                        EN
                                    </a>
                                </div>
                                <a target="_blank" href="{{ url('contractor') }}" target="_blank">

                                    <img src="{{ asset('/public/frontend/img/contactor.png') }}">
                                </a>
                                <a target="_blank" href="{{ url('contractor') }}" target="_blank">
                                    <h1>
                                        কন্টাক্টর
                                    </h1>
                                </a>
                            </div>
                        </div>
                    </div>
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
