@extends('admin.layout.master')
@section('title', 'Admin Create')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Admin Create</h5>
                        <span>Here is the admin create form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}s"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin.index') }}">Admin</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.admin.index') }}">Admin Create</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h5 class="text-white"> Admin Create Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.admin.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="name" class="col-12 col-md-3 col-form-label">Admin Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="name" id="name"
                                                    value="{{ old('name') }}" class="form-control"
                                                    placeholder="Admin name">
                                                @error('name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-12 col-md-3 col-form-label">Email</label>
                                            <div class="col-12 col-md-9">
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    id="email" class="form-control" placeholder="Admin email">
                                                @error('email')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-select"
                                                class="col-12 col-md-3 col-form-label">Password</label>
                                            <div class="col-12 col-md-9">
                                                <input type="password" name="password" value="" id="password"
                                                    class="form-control" placeholder="Admin password">
                                                @error('password')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="password_confirmation"
                                                class="col-12 col-md-3 col-form-label">Confirm
                                                Password</label>
                                            <div class="col-12 col-md-9">
                                                <input type="password" name="password_confirmation" value=""
                                                    id="password_confirmation" class="form-control"
                                                    placeholder="Confirm password">
                                                @error('password_confirmation')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-select" class="col-12 col-md-3 col-form-label">Admin
                                                Phone</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="phone" id="phone"
                                                    value="{{ old('phone') }}" class="form-control"
                                                    placeholder="Admin phone number">
                                                @error('phone')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-12 col-md-3 col-form-label">Status</label>
                                            <div class="col-12 col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            {{ old('status') == '1' ? 'checked' : '' }} id="gender-1"
                                                            value="1"> Active
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            {{ old('status') == '0' ? 'checked' : '' }} id="gender-2"
                                                            value="0"> Inactive
                                                    </label>
                                                </div>
                                                @error('status')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror

                                            </div>
                                        </div>
                                        {{-- <div class="row mb-3">
                                            <label for="example-select"
                                                class="col-12 col-md-3 col-form-label">Division</label>
                                            <div class="col-12 col-md-9">
                                                <select name="division" id="division" class="form-select">
                                                    <option value="">Select Division</option>
                                                    @foreach ($divisions as $division)
                                                        <option {{ old('division') == $division->id ? 'selected' : '' }}
                                                            value="{{ $division->id }}">{{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('division')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div> --}}
                                        {{-- <div class="row mb-3">
                                            <label for="district" class="col-12 col-md-3 col-form-label">District</label>
                                            <div class="col-12 col-md-9">
                                                <select name="district" id="district" class="form-select">
                                                    <option value="">Select District</option>
                                                </select>
                                                @error('district')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="district" class="col-12 col-md-3 col-form-label">Upazila</label>
                                            <div class="col-12 col-md-9">
                                                <select name="sub_district" id="sub_district" class="form-select">
                                                    <option value="">Select Upazila</option>
                                                </select>
                                                @error('sub_district')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="role" class="col-12 col-md-3 col-form-label">User Role</label>
                                            <div class="col-12 col-md-9">
                                                <select name="role" id="role" class="form-select">
                                                    <option value="">Select One</option>
                                                    <option {{ old('role') == 1 ? 'selected' : '' }} value="1">User
                                                    </option>
                                                    <option {{ old('role') == 2 ? 'selected' : '' }} value="2">Admin
                                                    </option>
                                                    <option {{ old('role') == 3 ? 'selected' : '' }} value="3">Super
                                                        Admin</option>
                                                </select>
                                                @error('role')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div> --}}


                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.admin.index') }}" class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Add Admin">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        // $(function() {
        //     var districtSelected = '{{ old('district') }}'
        //     $('#division').on('change', function() {
        //         var division_id = $(this).val();
        //         $('#district').html('<option value="">Select district</option>');

        //         $.ajax({
        //             method: "GET",
        //             url: ' route('get.district') ',
        //             data: {
        //                 division_id: division_id
        //             }
        //         }).done(function(data) {
        //             $.each(data, function(index, item) {
        //                 if (districtSelected == item.id) {
        //                     $('#district').append('<option selected value="' + item.id +
        //                         '" selected>' + item.name + '</option>');
        //                 } else {
        //                     $('#district').append('<option value="' + item.id + '">' + item
        //                         .name + '</option>');
        //                 }
        //             });

        //             $('#district').trigger('change');
        //         });

        //     });

        //     // personal address
        //     $('#division').trigger('change');
        //     var subDistrictSelected = '{{ old('sub_district') }}';
        //     $('#district').on('change', function() {
        //         var district_id = $(this).val();
        //         $('#sub_district').html('<option value="">Select sub district</option>');
        //         if (district_id != '' && district_id != null) {
        //             $.ajax({
        //                 method: "GET",
        //                 url: ' route('get.sub_district') ',
        //                 data: {
        //                     district_id: district_id
        //                 }
        //             }).done(function(data) {
        //                 $.each(data, function(index, item) {
        //                     if (subDistrictSelected == item.id) {
        //                         $('#sub_district').append('<option selected value="' + item
        //                             .id +
        //                             '" selected>' + item.name + '</option>');
        //                     } else {
        //                         $('#sub_district').append('<option value="' + item.id +
        //                             '">' +
        //                             item.name + '</option>');
        //                     }
        //                 });
        //                 $('#sub_district').trigger('change');
        //             });
        //         }
        //     });
        //     $('#district').trigger('change');
        // });
    </script>
@endpush
