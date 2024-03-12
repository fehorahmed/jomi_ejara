@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        @include('frontend.common.frontend_user_menu')
        <div class="row">
            <div class="col-md-12">
                @include('frontend.common.message_handler')
            </div>    
        </div>
        {{ Form::open(array('url' => 'profile_edit_update', 'method' => 'post', 'value' => 'PATCH', 'enctype' => 'multipart/form-data')) }}

@php
   // dump($user);
@endphp
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> সাধারণ তথ্যাদি </div>
                    <div class="panel-body">
                        {{ Form::hidden('profile_id', $user->id) }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('bnname', ' নাম ', array('class' => 'bnname cmmone-class')) }}
                                    {{ Form::text('bnname', !empty($user) ? $user->bnname : NULL, ['class' => 'form-control', 'placeholder' => ' নাম ']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('name', ' Name  ', array('class' => 'name cmmone-class')) }}
                                    {{ Form::text('name', !empty($user) ? @$user->name : NULL, ['class' => 'form-control', 'placeholder' => ' Name  ']) }}
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('phone', '  মোবাইল ', array('class' => 'bnname cmmone-class')) }}
                                {{ Form::text('phone', !empty($user) ? $user->phone : NULL, ['class' => 'form-control', 'placeholder' => ' মোবাইল ']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('email', '  ইমেইল  ', array('class' => 'name cmmone-class')) }}
                                {{ Form::text('email', !empty($user) ? @$user->email : NULL, ['class' => 'form-control', 'placeholder' => ' Name  ']) }}
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('bnfathername', ' পিতার/ স্বামীর নাম ', array('class' => 'bnfathername cmmone-class')) }}
                                    {{ Form::text('bnfathername', !empty($user) ? $user->bnfathername : NULL, ['class' => 'form-control', 'placeholder' => ' পিতার নাম ']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('enfathername', ' Father\'s name  ', array('class' => 'enfathername cmmone-class')) }}
                                    {{ Form::text('enfathername', !empty($user) ? @$user->enfathername : NULL, ['class' => 'form-control', 'placeholder' => ' Father\'s name  ']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('bnmothername', ' মাতার নাম ', array('class' => 'bnmothername cmmone-class')) }}
                                    {{ Form::text('bnmothername', !empty($user) ? $user->bnmothername : NULL, ['class' => 'form-control', 'placeholder' => ' মাতার নাম ']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('enmothername', ' Mother\'s name  ', array('class' => 'enmothername cmmone-class')) }}
                                    {{ Form::text('enmothername', !empty($user) ? @$user->enmothername : NULL, ['class' => 'form-control', 'placeholder' => ' Mother\'s name']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('nidno', ' National ID ', array('class' => 'nidno cmmone-class')) }}
                                    {{ Form::text('nidno', !empty($user) ? @$user->nidno : NULL, ['class' => 'form-control', 'placeholder' => ' National ID ']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('passportno', ' Passport No ', array('class' => 'passportno cmmone-class')) }}
                                    {{ Form::text('passportno', !empty($user) ? @$user->passportno : NULL, ['class' => 'form-control', 'placeholder' => ' Passport No ']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('birthcertificateno', ' Birth Certificate No ', array('class' => 'birthcertificateno cmmone-class')) }}
                                    {{ Form::text('birthcertificateno', !empty($user) ? @$user->birthcertificateno : NULL, ['class' => 'form-control', 'placeholder' => '  Birth Certificate No ']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('gender', 'Gender ', array('class' => 'gender cmmone-class')) }}
                                    <select class="form-control" name="gender" id="sel1">
                                        <option value="">Select</option>
                                        <option value="Male" {{(@$user->gender == 'Male') ? 'selected' : ''}}>
                                            Male
                                        </option>
                                        <option value="Female" {{(@$user->gender == 'Female') ? 'selected' : ''}}>
                                            Female
                                        </option>
                                        <option value="Others" {{(@$user->gender == 'Others') ? 'selected' : ''}}>
                                            Others
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('religion', ' Religion ', array('class' => 'religion cmmone-class')) }}
                                    <select class="form-control " name="religion">
                                        <option value="">Select</option>
                                        <option value="Islam" {{(@$user->religion == 'Islam') ? 'selected' : ''}}>
                                            Islam
                                        </option>
                                        <option value="Hindu" {{(@$user->religion == 'Hindu') ? 'selected' : ''}}>
                                            Hindu
                                        </option>
                                        <option value="Buddhist" {{(@$user->religion == 'Buddhist') ? 'selected' : ''}}>
                                            Buddhist
                                        </option>
                                        <option value="Christian" {{(@$user->religion == 'Christian') ? 'selected' : ''}}>
                                            Christian
                                        </option>
                                        <option value="Others" {{(@$user->religion == 'Others') ? 'selected' : ''}}>
                                            Others
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('marital_status', ' Marital Status ', array('class' => 'marital_status cmmone-class')) }}
                                    <select class="form-control " name="marital_status">
                                        <option value="">Select</option>
                                        <option value="Married" {{(@$user->marital_status == 'Married') ? 'selected' : ''}}>
                                            Married
                                        </option>
                                        <option value="Unmarried" {{(@$user->marital_status == 'Unmarried') ? 'selected' : ''}}>
                                            Unmarried
                                        </option>
                                        <option value="Divorced" {{(@$user->marital_status == 'Divorced') ? 'selected' : ''}}>
                                            Divorced
                                        </option>
                                        <option value="Widowed" {{(@$user->marital_status == 'Widowed') ? 'selected' : ''}}>
                                            Widowed
                                        </option>
                                        <option value="Others" {{(@$user->marital_status == 'Others') ? 'selected' : ''}}>
                                            Others
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('birthday', ' Birthday ', array('class' => 'birthday cmmone-class')) }}
                                    {{ Form::date('birthday', !empty($user) ? @$user->birthday : NULL, ['id' => 'date', 'class' => 'form-control', 'placeholder' => '  Birthday ']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('monthly_income', ' মাসিক আয়  ', array('class' => 'monthly_income cmmone-class')) }}
                                    {{ Form::text('monthly_income', !empty($user) ? $user->monthly_income : NULL, ['class' => 'form-control', 'placeholder' => ' মাসিক আয় ', 'id' => 'monthly_income']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('yearly_income', ' বার্ষিক আয় ', array('class' => 'yearly_income cmmone-class')) }}
                                    {{ Form::text('yearly_income', !empty($user) ? $user->yearly_income : NULL, ['class' => 'form-control', 'placeholder' => ' বার্ষিক আয় ', 'id' => 'yearly_income', 'disabled' => 'disabled']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('Profession', ' পেশা ', array('class' => 'profession cmmone-class')) }}
                                    {{ Form::text('bnprofession', !empty($user) ? $user->bnprofession : NULL, ['class' => 'form-control', 'placeholder' => ' পেশা ']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="cmmone-class">আপনি কি ভূমিহীন?</label>
                                    <span style="padding:10px;">
                                        <label class="radio-inline"><input type="radio" name="landless" value="1" {{ $user->landless == 1 ? 'checked' : '' }}>হ্যাঁ</label>
                                        <label class="radio-inline"><input type="radio" name="landless" value="0" {{ $user->landless == 0 ? 'checked' : '' }}>না</label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="cmmone-class">আপনি কি নদী ভাঙ্গনের আওতায় পড়েছেন?</label>
                                    <span style="padding:10px;">
                                        <label class="radio-inline"><input type="radio" name="rivercorrosion" value="1" {{ $user->rivercorrosion == 1 ? 'checked' : '' }}>হ্যাঁ</label>
                                        <label class="radio-inline"><input type="radio" name="rivercorrosion" value="0" {{ $user->rivercorrosion == 0 ? 'checked' : '' }}>না</label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="cmmone-class">আপনি কি মুক্তিযোদ্ধার সন্তান?</label>
                                    <span style="padding:10px;">
                                        <label class="radio-inline"><input type="radio" name="freedomfighters" value="1" {{ $user->freedomfighters == 1 ? 'checked' : '' }}>হ্যাঁ</label>
                                        <label class="radio-inline"><input type="radio" name="freedomfighters" value="0" {{ $user->freedomfighters == 0 ? 'checked' : '' }}>না</label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('picture', ' Photo ', array('class' => 'picture cmmone-class')) }} {{ Form::hidden('picture', !empty($user)
                                    ? @$user->photo : NULL, ['required', 'class' => 'form-control', 'placeholder' => ' Photo ']) }}
                                </div>
                                @if (!empty($user->photo))
                                <div class="form-group">
                                    <div class="ar-profile" style="max-height:100px;max-width:100px;">
                                        <img src="{{ url(!empty($user->photo) ? @$user->photo : NULL) }}" class="img-thumbnail">
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" id="upload_police" name="profile_photo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"> বর্তমান ঠিকানা (ইংরেজিতে)</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('enpreholdingno', ' Holding Number ', array('class' => 'enpreholdingno cmmone-class')) }}
                                {{ Form::text('enpreholdingno',
                                !empty($user) ? $user->enpreholdingno : NULL, ['class' => 'form-control', 'placeholder' => 'Holding Number ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enprevillage', ' Village ', array('class' => 'enprevillage cmmone-class')) }} {{ Form::text('enprevillage', !empty($user)
                                ? $user->enprevillage : NULL, ['class' => 'form-control', 'placeholder' => 'Village ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enpreroad', 'Union ', array('class' => 'enpreroad cmmone-class')) }} {{ Form::text('enpreroad', !empty($user)
                                ? $user->enpreroad : NULL, ['class' => 'form-control', 'placeholder' => ' Union ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enprewardno', ' Ward No ', array('class' => 'enprewardno cmmone-class')) }}


                                <select class="form-control " name="enprewardno" id="enprewardno">

                                    <option value="">Select</option>
                                    @foreach(reg_ward_list() as $list)

                                    <option value="{{$list}}" {{(@$user->enprewardno == $list) ? 'selected' : ''}}>
                                        {{$list}}
                                    </option>
                                   @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {{ Form::label('enprepostoffice', 'Post Office ', array('class' => 'enprepostoffice cmmone-class')) }} {{ Form::text('enprepostoffice',
                                !empty($user) ? $user->enprepostoffice : NULL, ['class' => 'form-control', 'placeholder' => 'Post Office']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enpredistrict', 'Upazila / Thana', array('class' => 'enpredistrict cmmone-class')) }}
                                {{ Form::text('enpredistrict', !empty($user) ? $user->enpredistrict : NULL, ['class' => 'form-control', 'placeholder' => 'Upazila / Thana']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enpreupazilla', ' District ', array('class' => 'enpreupazilla cmmone-class')) }}
                                {{ Form::text('enpreupazilla', !empty($user) ? $user->enpreupazilla : NULL, ['class' => 'form-control', 'placeholder' => 'District']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"> বর্তমান ঠিকানা (বাংলাতে)</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('bnpreholdingno', ' হোল্ডিং নম্বর ', array('class' => 'bnpreholdingno cmmone-class')) }}
                                {{ Form::text('bnpreholdingno', !empty($user) ? $user->bnpreholdingno : NULL, ['class' => 'form-control', 'placeholder' => 'হোল্ডিং নম্বর']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnprevillage', ' গ্রাম/মহল্লা  ', array('class' => 'bnprevillage cmmone-class')) }}
                                {{ Form::text('bnprevillage', !empty($user) ? $user->bnprevillage : NULL, ['class' => 'form-control', 'placeholder' => ' গ্রাম/মহল্লা  ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnpreroad', ' ইউনিয়ন  ', array('class' => 'bnpreroad cmmone-class')) }}
                                {{ Form::text('bnpreroad', !empty($user) ? $user->bnpreroad : NULL, ['class' => 'form-control', 'placeholder' => ' ইউনিয়ন ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnprewardno', ' ওয়ার্ড নং  ', array('class' => 'bnprewardno cmmone-class')) }}

                                <select class="form-control " name="bnprewardno" id="bnprewardno">

                                    <option value="">Select</option>
                                    @foreach(reg_ward_list() as $list)

                                        <option value="{{$list}}" {{(@$user->bnprewardno == $list) ? 'selected' : ''}}>
                                            {{$list}}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                {{ Form::label('bnprepostoffice', ' পোষ্ট অফিস ', array('class' => 'bnprepostoffice cmmone-class')) }} {{ Form::text('bnprepostoffice',
                                !empty($user) ? $user->bnprepostoffice : NULL, ['class' => 'form-control', 'placeholder' => ' পোষ্ট অফিস ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnpreupazilla', ' উপজেলা / থানা ', array('class' => 'bnpreupazilla cmmone-class')) }} {{ Form::text('bnpreupazilla',
                                !empty($user) ? $user->bnpreupazilla : NULL, ['class' => 'form-control', 'placeholder' => 'উপজেলা / থানা ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnpredistrict', ' জেলা ', array('class' => 'bnpredistrict cmmone-class')) }}
                                {{ Form::text('bnpredistrict', !empty($user)
                                ? $user->bnpredistrict : NULL, ['class' => 'form-control', 'placeholder' => 'জেলা ']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"> স্থায়ী ঠিকানা (ইংরেজিতে)</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('enparholdingno', ' Holding Number ', array('class' => 'enparholdingno cmmone-class')) }} {{ Form::text('enparholdingno',
                                !empty($user) ? $user->enparholdingno : NULL, ['class' => 'form-control', 'placeholder' => 'Holding Number ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enparvillage', ' Village ', array('class' => 'enparvillage cmmone-class')) }} {{ Form::text('enparvillage', !empty($user)
                                ? $user->enparvillage : NULL, ['class' => 'form-control', 'placeholder' => 'Village ']) }}
                            </div>
                            {{-- <div class="form-group">
                                {{ Form::label('enparroad', 'Union ', array('class' => 'enparroad cmmone-class')) }} {{ Form::text('enparroad', !empty($user)
                                ? $user->enparroad : NULL, ['class' => 'form-control', 'placeholder' => ' Union ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enparwardno', ' Ward No ', array('class' => 'enparwardno cmmone-class')) }} {{ Form::text('enparwardno', !empty($user)
                                ? $user->enparwardno : NULL, ['class' => 'form-control', 'placeholder' => ' Ward No']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enparpostoffice', 'Post Office ', array('class' => 'enparpostoffice cmmone-class')) }} {{ Form::text('enparpostoffice',
                                !empty($user) ? $user->enparpostoffice : NULL, ['class' => 'form-control', 'placeholder' => 'Post Office']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enpardistrict', 'Upazila / Thana', array('class' => 'enpardistrict cmmone-class')) }}
                                {{ Form::text('enpardistrict', !empty($user) ? $user->enpardistrict : NULL, ['class' => 'form-control', 'placeholder' => 'Upazila / Thana']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('enparupazilla', ' District ', array('class' => 'enparupazilla cmmone-class')) }}
                                {{ Form::text('enparupazilla', !empty($user) ? $user->enparupazilla : NULL, ['class' => 'form-control', 'placeholder' => 'District']) }}
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"> স্থায়ী ঠিকানা (বাংলাতে)</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('bnparholdingno', ' হোল্ডিং নম্বর ', array('class' => 'bnparholdingno cmmone-class')) }}
                                {{ Form::text('bnparholdingno', !empty($user) ? $user->bnparholdingno : NULL, ['class' => 'form-control', 'placeholder' => 'হোল্ডিং নম্বর']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnparvillage', ' গ্রাম/মহল্লা  ', array('class' => 'bnparvillage cmmone-class')) }}
                                {{ Form::text('bnparvillage', !empty($user) ? $user->bnparvillage : NULL, ['class' => 'form-control', 'placeholder' => ' গ্রাম/মহল্লা  ']) }}
                            </div>
                            {{-- <div class="form-group">
                                {{ Form::label('bnparroad', ' ইউনিয়ন  ', array('class' => 'bnparroad cmmone-class')) }}
                                {{ Form::text('bnparroad', !empty($user) ? $user->bnparroad : NULL, ['class' => 'form-control', 'placeholder' => ' ইউনিয়ন ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnparwardno', ' ওয়ার্ড নং  ', array('class' => 'bnparwardno cmmone-class')) }}
                                {{ Form::text('bnparwardno', !empty($user) ? $user->bnparwardno : NULL, ['class' => 'form-control', 'placeholder' => ' ওয়ার্ড নং ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnparpostoffice', ' পোষ্ট অফিস ', array('class' => 'bnparpostoffice cmmone-class')) }} {{ Form::text('bnparpostoffice',
                                !empty($user) ? $user->bnparpostoffice : NULL, ['class' => 'form-control', 'placeholder' => ' পোষ্ট অফিস ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnparupazilla', ' উপজেলা / থানা ', array('class' => 'bnparupazilla cmmone-class')) }} {{ Form::text('bnparupazilla',
                                !empty($user) ? $user->bnparupazilla : NULL, ['class' => 'form-control', 'placeholder' => 'উপজেলা / থানা ']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('bnpardistrict', ' জেলা ', array('class' => 'bnpardistrict cmmone-class')) }}
                                {{ Form::text('bnpardistrict', !empty($user)
                                ? $user->bnpardistrict : NULL, ['class' => 'form-control', 'placeholder' => 'জেলা ']) }}
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <button class="btn btn-info" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>

@endsection

@section('cusjs')
    <link rel="stylesheet" href="{{ URL::asset('public/css/dropzone.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('public/plugins/dropzone.js') }}"></script>

    <script>
    $("#monthly_income").on("change keyup", function() {
        var sum = $(this).val() * 12;
        $('#yearly_income').val(sum);
        // console.log(sum);
    });

    jQuery(document).ready(function ($){
        $("#enprewardno").on("change", function () {
            var ward = $("#enprewardno").val();
            $("#bnprewardno").val(ward);
        });

        $("#bnprewardno").on("change", function () {
            var ward = $("#bnprewardno").val();
            $("#enprewardno").val(ward);

        })
    });

</script>
@endsection
