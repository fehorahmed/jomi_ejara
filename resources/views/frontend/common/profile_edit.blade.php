@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        @include('frontend.common.frontend_user_menu')
        <div class="row">
            <div class="col-md-12">
                @include('frontend.common.message_handler')
            </div>
        </div>
        <form action="{{ url('profile_edit_update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> সাধারণ তথ্যাদি </div>
                        <div class="panel-body">
                            <input type="hidden" name="profile_id" value="{{ $user->id }}">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="name cmmone-class">নাম</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Name" value="{{ $user->name ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="bnname cmmone-class">মোবাইল</label>
                                    <input type="text" class="form-control" {{ $user->phone ? 'readonly' : '' }}
                                        name="phone" id="phone" placeholder="মোবাইল" value="{{ $user->phone ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="email" class="name cmmone-class">ইমেইল</label>
                                        <input type="email" {{ $user->email ? 'readonly' : '' }} class="form-control"
                                            name="email" id="email" placeholder="ইমেইল"
                                            value="{{ $user->email ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="father_name" class="father_name cmmone-class">পিতার/ স্বামীর
                                            নাম</label>
                                        <input type="text" class="form-control" name="father_name" id="father_name"
                                            placeholder="পিতার নাম" value="{{ $user->father_name ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_name" class="mother_name cmmone-class">মাতার নাম</label>
                                    <input type="text" class="form-control" name="mother_name" id="mother_name"
                                        placeholder="মাতার নাম" value="{{ $user->mother_name ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nidno" class="nidno cmmone-class">NID</label>
                                    <input type="text" class="form-control" name="nidno" id="nidno"
                                        placeholder="National ID" value="{{ $user->nidno ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="passportno" class="passportno cmmone-class">Passport No </label>
                                    <input type="text" class="form-control" name="passportno" id="passportno"
                                        placeholder="Passport No " value="{{ $user->passportno ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthcertificateno" class="birthcertificateno cmmone-class">Passport No
                                    </label>
                                    <input type="text" class="form-control" name="birthcertificateno"
                                        id="birthcertificateno" placeholder="Birth Certificate No "
                                        value="{{ $user->birthcertificateno ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender" class="gender cmmone-class">Gender
                                    </label>
                                    <select class="form-control" name="gender" id="sel1">
                                        <option value="">Select</option>
                                        <option value="Male" {{ @$user->gender == 'Male' ? 'selected' : '' }}>
                                            Male
                                        </option>
                                        <option value="Female" {{ @$user->gender == 'Female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                        <option value="Others" {{ @$user->gender == 'Others' ? 'selected' : '' }}>
                                            Others
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="religion" class="religion cmmone-class">Religion
                                    </label>
                                    <select class="form-control " name="religion">
                                        <option value="">Select</option>
                                        <option value="1" {{ @$user->religion == '1' ? 'selected' : '' }}>
                                            Islam
                                        </option>
                                        <option value="2" {{ @$user->religion == '2' ? 'selected' : '' }}>
                                            Hindu
                                        </option>
                                        <option value="3" {{ @$user->religion == '3' ? 'selected' : '' }}>
                                            Buddhist
                                        </option>
                                        <option value="4" {{ @$user->religion == '4' ? 'selected' : '' }}>
                                            Christian
                                        </option>
                                        <option value="5" {{ @$user->religion == '5' ? 'selected' : '' }}>
                                            Others
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marital_status" class="marital_status cmmone-class">Marital Status
                                    </label>
                                    <select class="form-control " name="marital_status">
                                        <option value="">Select</option>
                                        <option value="Married"
                                            {{ @$user->marital_status == 'Married' ? 'selected' : '' }}>
                                            Married
                                        </option>
                                        <option value="Unmarried"
                                            {{ @$user->marital_status == 'Unmarried' ? 'selected' : '' }}>
                                            Unmarried
                                        </option>
                                        <option value="Divorced"
                                            {{ @$user->marital_status == 'Divorced' ? 'selected' : '' }}>
                                            Divorced
                                        </option>
                                        <option value="Widowed"
                                            {{ @$user->marital_status == 'Widowed' ? 'selected' : '' }}>
                                            Widowed
                                        </option>
                                        <option value="Others" {{ @$user->marital_status == 'Others' ? 'selected' : '' }}>
                                            Others
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="birthday" class="birthday cmmone-class">Birthday
                                    </label>
                                    <input type="date" class="form-control" name="birthday" id="birthday"
                                        placeholder="Birthday " value="{{ $user->birthday ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="monthly_income" class="monthly_income cmmone-class">মাসিক আয়
                                    </label>
                                    <input type="number" class="form-control" name="monthly_income" id="monthly_income"
                                        placeholder="মাসিক আয় " value="{{ $user->monthly_income ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="yearly_income" class="yearly_income cmmone-class">বার্ষিক আয়
                                    </label>
                                    <input type="number" class="form-control" name="yearly_income" id="yearly_income"
                                        placeholder="বার্ষিক আয় " value="{{ $user->yearly_income ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profession" class="profession cmmone-class">পেশা
                                    </label>
                                    <input type="text" class="form-control" name="profession" id="profession"
                                        placeholder="পেশা " value="{{ $user->profession ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="cmmone-class">আপনি কি মুক্তিযোদ্ধার সন্তান?</label>
                                    <span style="padding:10px;">
                                        <label class="radio-inline"><input type="radio" name="freedomfighters"
                                                value="1"
                                                {{ $user->freedomfighters == 1 ? 'checked' : '' }}>হ্যাঁ</label>
                                        <label class="radio-inline"><input type="radio" name="freedomfighters"
                                                value="0"
                                                {{ $user->freedomfighters == 0 ? 'checked' : '' }}>না</label>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo" class="picture cmmone-class">Photo
                                    </label>
                                    <input type="file" class="form-control" name="photo" id="photo"
                                        placeholder="Photo" {{ $user->photo ? '' : 'required' }}>

                                </div>
                                @if (!empty($user->photo))
                                    <div class="form-group">
                                        <div class="ar-profile" style="max-height:100px;max-width:100px;">
                                            <img src="{{ asset('storage/' . $user->photo) }}" class="img-thumbnail">
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"> বর্তমান ঠিকানা </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="present_division" class="present_division cmmone-class">Divission
                                </label>
                                <select class="form-control" required name="present_division" id="present_division">
                                    <option value="">Select One</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}"
                                            {{ old('present_division', $user->present_division) == $division->id ? 'selected' : '' }}>
                                            {{ $division->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="present_district" class="present_district cmmone-class">District
                                </label>
                                <select class="form-control" required name="present_district" id="present_district">
                                    <option value="">Select One</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="present_upazila" class="present_upazila cmmone-class">Upazila
                                </label>
                                <select class="form-control" required name="present_upazila" id="present_upazila">
                                    <option value="">Select One</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="present_postoffice" class="present_postoffice cmmone-class">Post Office
                                </label>
                                <input type="text" required class="form-control" name="present_postoffice"
                                    id="present_postoffice"
                                    value="{{ old('present_postoffice', $user->present_postoffice) }}"
                                    placeholder="Post Office " value="{{ $user->present_postoffice ?? '' }}">

                            </div>
                            <div class="form-group">
                                <label for="present_village" class="present_village cmmone-class">Village
                                </label>
                                <input type="text" required class="form-control" name="present_village"
                                    value="{{ old('present_village', $user->present_village) }}" id="present_village"
                                    placeholder="Village ">
                            </div>
                            <div class="form-group">
                                <label for="present_address" class="present_address cmmone-class">Address
                                </label>
                                <input type="text" required class="form-control" name="present_address"
                                    id="present_address" placeholder="Address  "
                                    value="{{ old('present_address', $user->present_address) }}">

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div style="display: flex; justify-content:space-between;" class="panel-heading"> স্থায়ী ঠিকানা
                            <div style="">
                                <input type="checkbox" value="1" name="same_as_present" id="address_same">
                                <label style="font-weight: 500;" for="address_same">বর্তমান ঠিকানা হিসাবে একই</label>
                            </div>
                            </h5>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">

                                <label for="permanent_division" class="permanent_division cmmone-class">Divission</label>
                                <select class="form-control" name="permanent_division" id="permanent_division">
                                    <option value="">Select One</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}"
                                            {{ old('permanent_division', $user->permanent_division) == $division->id ? 'selected' : '' }}>
                                            {{ $division->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="permanent_district" class="permanent_district cmmone-class">District
                                </label>
                                <select class="form-control" name="permanent_district" id="permanent_district">
                                    <option value="">Select One</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="permanent_upazila" class="permanent_upazila cmmone-class">Upazila
                                </label>
                                <select class="form-control" name="permanent_upazila" id="permanent_upazila">
                                    <option value="">Select One</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="permanent_postoffice" class="permanent_postoffice cmmone-class">পোষ্ট
                                    অফিস</label>
                                <input type="text" class="form-control" name="permanent_postoffice"
                                    id="permanent_postoffice" placeholder="পোষ্ট অফিস "
                                    value="{{ old('permanent_postoffice', $user->permanent_postoffice) }}">

                            </div>
                            <div class="form-group">
                                <label for="permanent_village" class="permanent_village cmmone-class">গ্রাম/মহল্লা</label>
                                <input type="text" class="form-control" name="permanent_village"
                                    id="permanent_village" placeholder="গ্রাম/মহল্লা "
                                    value="{{ old('permanent_village', $user->permanent_village) }}">

                            </div>
                            <div class="form-group">
                                <label for="permanent_address" class="permanent_address cmmone-class">Address</label>
                                <input type="text" class="form-control" name="permanent_address"
                                    id="permanent_address" placeholder="Address"
                                    value="{{ old('permanent_address', $user->permanent_address) }}">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group text-center">
                        <button class="btn btn-info" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('cusjs')
    {{-- <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
    <script type="text/javascript" src="{{ asset('plugins/dropzone.js') }}"></script> --}}

    <script>
        $("#monthly_income").on("change keyup", function() {
            var sum = $(this).val() * 12;
            $('#yearly_income').val(sum);
            // console.log(sum);
        });

        jQuery(document).ready(function($) {
            $("#enprewardno").on("change", function() {
                var ward = $("#enprewardno").val();
                $("#bnprewardno").val(ward);
            });

            $("#bnprewardno").on("change", function() {
                var ward = $("#bnprewardno").val();
                $("#enprewardno").val(ward);

            })
        });


        $(function() {


            $('#address_same').change(function() {
                if ($(this).prop('checked')) {
                    $('#permanent_division').prop('disabled', true);
                    $('#permanent_division').prop('required', false);
                    $('#permanent_district').prop('disabled', true);
                    $('#permanent_district').prop('required', false);
                    $('#permanent_upazila').prop('disabled', true);
                    $('#permanent_upazila').prop('required', false);

                    $('#permanent_postoffice').prop('disabled', true);
                    $('#permanent_postoffice').prop('required', false);
                    $('#permanent_village').prop('disabled', true);
                    $('#permanent_village').prop('required', false);

                    $('#permanent_address').prop('disabled', true);
                    $('#permanent_address').prop('required', false);


                } else {
                    $('#permanent_division').prop('disabled', false);
                    $('#permanent_division').prop('required', true);
                    $('#permanent_district').prop('disabled', false);
                    $('#permanent_district').prop('required', true);
                    $('#permanent_upazila').prop('disabled', false);
                    $('#permanent_upazila').prop('required', true);

                    $('#permanent_postoffice').prop('disabled', false);
                    $('#permanent_postoffice').prop('required', true);
                    $('#permanent_village').prop('disabled', false);
                    $('#permanent_village').prop('required', true);

                    $('#permanent_address').prop('disabled', false);
                    $('#permanent_address').prop('required', true);
                }
            });
            $('#address_same').trigger('change');

            var districtSelected = '{{ old('permanent_district', $user->permanent_district) }}'
            $('#permanent_division').on('change', function() {
                var division_id = $(this).val();
                $('#permanent_district').html('<option value="">Select district</option>');

                $.ajax({
                    method: "GET",
                    url: '{{ route('get.district') }}',
                    data: {
                        division_id: division_id
                    }
                }).done(function(data) {
                    $.each(data, function(index, item) {
                        if (districtSelected == item.id) {
                            $('#permanent_district').append('<option selected value="' +
                                item.id +
                                '" selected>' + item.name + '</option>');
                        } else {
                            $('#permanent_district').append('<option value="' + item.id +
                                '">' + item
                                .name + '</option>');
                        }
                    });

                    $('#permanent_district').trigger('change');
                });

            });

            // personal address
            $('#permanent_division').trigger('change');
            var subDistrictSelected = '{{ old('permanent_upazila', $user->permanent_upazila) }}';
            $('#permanent_district').on('change', function() {
                var district_id = $(this).val();
                $('#permanent_upazila').html('<option value="">Select sub district</option>');
                if (district_id != '' && district_id != null) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('get.sub_district') }}',
                        data: {
                            district_id: district_id
                        }
                    }).done(function(data) {
                        $.each(data, function(index, item) {
                            if (subDistrictSelected == item.id) {
                                $('#permanent_upazila').append('<option selected value="' +
                                    item
                                    .id +
                                    '" selected>' + item.name + '</option>');
                            } else {
                                $('#permanent_upazila').append('<option value="' + item.id +
                                    '">' +
                                    item.name + '</option>');
                            }
                        });
                        // $('#permanent_upazila').trigger('change');
                    });
                }
            });
            $('#permanent_district').trigger('change');



            //Present /////////////
            var pre_districtSelected = '{{ old('present_district', $user->present_district) }}'
            $('#present_division').on('change', function() {
                var division_id = $(this).val();
                $('#present_district').html('<option value="">Select district</option>');

                $.ajax({
                    method: "GET",
                    url: '{{ route('get.district') }}',
                    data: {
                        division_id: division_id
                    }
                }).done(function(data) {
                    $.each(data, function(index, item) {
                        if (pre_districtSelected == item.id) {
                            $('#present_district').append('<option selected value="' + item
                                .id +
                                '" selected>' + item.name + '</option>');
                        } else {
                            $('#present_district').append('<option value="' + item.id +
                                '">' + item
                                .name + '</option>');
                        }
                    });

                    $('#present_district').trigger('change');
                });

            });

            // personal address
            $('#present_division').trigger('change');
            var pre_subDistrictSelected = '{{ old('present_upazila', $user->present_upazila) }}';
            $('#present_district').on('change', function() {
                var district_id = $(this).val();
                $('#present_upazila').html('<option value="">Select sub district</option>');
                if (district_id != '' && district_id != null) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('get.sub_district') }}',
                        data: {
                            district_id: district_id
                        }
                    }).done(function(data) {
                        $.each(data, function(index, item) {
                            if (pre_subDistrictSelected == item.id) {
                                $('#present_upazila').append('<option selected value="' +
                                    item
                                    .id +
                                    '" selected>' + item.name + '</option>');
                            } else {
                                $('#present_upazila').append('<option value="' + item.id +
                                    '">' +
                                    item.name + '</option>');
                            }
                        });
                        $('#present_upazila').trigger('change');
                    });
                }
            });
            $('#present_district').trigger('change');

        });
    </script>
@endsection
