@extends('frontend.layouts.app')

@section('content')
<!--slider-area-start-->
{{-- @include('frontend.common.slider') --}}
<!--slider-area-end-->
<!-- marquee-area-start-->
{{-- @include('frontend.common.marquee') --}}
<!-- marquee-area-end-->

<div class="about-area">
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    @if(Session::has('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                    @endif
                    {{--@endif--}}
                    @if($errors->any())
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            {{-- <h4>Warning!</h4> --}}
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel gap-panel">
                            <div class="panel-heading">
                                <h4>
                                    <a href="javascript:void(0)" style="color: #FFFFFF;">
                                        রেজিস্টার
                                    </a>
                                </h4>
                            </div>
                            <div class="panel-body panel-login">
                                @include('frontend.common.signup_form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-3 col-sm-9">
                @include('frontend.common.right_sidebar')
            </div> --}}
        </div>
    </div>
</div>
@endsection