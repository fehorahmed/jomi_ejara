@extends('frontend.layouts.app')

@section('content')

@include('frontend.common.slider')
@include('frontend.common.marquee')

<div class="container user_panel">
    @include('frontend.pages.message-section')
    @include('frontend.pages.home-seba-section')
    <div class="home-contact-box">
        <div class="col-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="google-map-title section-title">
                        <h2>
                            মানচিত্র
                        </h2>
                    </div>
                    <div class="map">
                        {!! $widgets[10]->description !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="google-map-title section-title">
                        <h2>
                            মন্তব্য / জিজ্ঞাসা
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @include('frontend.pages.feedback_form')
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="google-map-title section-title">
                        <h2>
                            যোগাযোগ
                        </h2>
                    </div>
                    {!! $widgets[11]->description !!}
                </div>
            </div>
        </div>
    </div>
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

    .service_lock {
        cursor: not-allowed;
        position: relative;
    }

    .service_lock:after {
        content: "LOCK";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        background: #ffffffdb;
        text-align: center;
        line-height: 130px;
        font-size: 35px;
        color: rgba(70, 76, 119, 0.5);
    }
</style>
@endsection