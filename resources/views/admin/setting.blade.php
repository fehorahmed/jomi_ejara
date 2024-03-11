@extends('admin.layout.master')
@section('title', 'Setting Page')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Setting Page</h5>
                        <span>Here is the Setting Page form.</span>
                    </div>
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
                                    <h5 class="text-white"> Setting Page Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="name" class="col-12 col-md-3 col-form-label">Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="name" value="{{ old('name',$setting->name??'') }}"
                                                    id="name" class="form-control" placeholder="Enter name">
                                                @error('name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="phone" class="col-12 col-md-3 col-form-label">Phone</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="phone" value="{{ old('phone',$setting->phone??'') }}"
                                                    id="phone" class="form-control" placeholder="Enter phone number">
                                                @error('phone')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="email" class="col-12 col-md-3 col-form-label">Email</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="email" value="{{ old('email',$setting->email??'') }}"
                                                    id="email" class="form-control" placeholder="Enter email address">
                                                @error('email')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="address" class="col-12 col-md-3 col-form-label">Address</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="address" value="{{ old('address',$setting->address??'') }}"
                                                    id="address" class="form-control" placeholder="Enter address here">
                                                @error('address')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="website" class="col-12 col-md-3 col-form-label">Website</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="website" value="{{ old('website',$setting->website??'') }}"
                                                    id="website" class="form-control" placeholder="Enter website here">
                                                @error('website')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="logo" class="col-12 col-md-3 col-form-label">Logo</label>
                                            <div class="col-12 col-md-9">
                                                <input type="file" name="logo"
                                                    id="logo" class="form-control" >
                                                @error('logo')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="text-center mb-3">

                                            <input type="submit" class="btn btn-primary  " value="Update Setting">
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
        $(function() {
            var unionPourashavaSelected = '{{ old('union_pourashava') }}';
            $('#upazila').on('change', function() {
                var upazila_id = $(this).val();
                $('#union_pourashava').html('<option value="">Select union/pourashava</option>');
                $.ajax({
                    method: "GET",
                    url: "{{ route('get.unions') }}",
                    data: {
                        upazila_id: upazila_id
                    }
                }).done(function(data) {
                    $.each(data, function(index, item) {
                        if (unionPourashavaSelected == item.id) {
                            $('#union_pourashava').append('<option selected value="' + item
                                .id +
                                '" selected>' + item.bn_name +
                                '</option>');
                        } else {
                            $('#union_pourashava').append('<option value="' + item.id +
                                '">' + item
                                .bn_name + '</option>');
                        }
                    });

                    // $('#district').trigger('change');
                });

            });
            $('#upazila').trigger('change');
            // personal address

            // var subDistrictSelected = '{{ old('upazila') }}';
            // $('#district').on('change', function() {
            //     var district_id = $(this).val();
            //     $('#upazila').html('<option value="">Select upazila</option>');
            //     if (district_id != '' && district_id != null) {
            //         $.ajax({
            //             method: "GET",
            //             url: '{{ route('get.sub_district') }}',
            //             data: {
            //                 district_id: district_id
            //             }
            //         }).done(function(data) {
            //             $.each(data, function(index, item) {
            //                 if (subDistrictSelected == item.id) {
            //                     $('#upazila').append('<option selected value="' + item
            //                         .id +
            //                         '" selected>' + item
            //                         .bn_name + '</option>');
            //                 } else {
            //                     $('#upazila').append('<option value="' + item.id +
            //                         '">' + item
            //                         .bn_name + '</option>');
            //                 }
            //             });
            //             $('#upazila').trigger('change');
            //         });
            //     }
            // });
            // $('#district').trigger('change');
        });
    </script>
@endpush
