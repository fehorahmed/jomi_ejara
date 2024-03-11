@extends('admin.layout.master')
@section('title', 'Mouza Edit')
@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Mouza Update</h5>
                        <span>Here is the mouza update form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.mouza.index') }}">Mouza
                                List</a>
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
                                    <h5 class="text-white"> Mouza Update Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.mouza.update', $mouza->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf


                                        <div class="row mb-3">
                                            <label for="upazila" class="col-12 col-md-3 col-form-label">Upazila</label>
                                            <div class="col-12 col-md-9">
                                                <select name="upazila" id="upazila"
                                                    class="form-control form-control-inverse fill">
                                                    <option value="">Select khatian Type</option>
                                                    @foreach ($upazilas as $upazila)
                                                        <option
                                                            {{ old('upazila', $mouza->upazila_id) == $upazila->id ? 'selected' : '' }}
                                                            value="{{ $upazila->id }}">
                                                            {{ $upazila->bn_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('upazila')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="union_pourashava"
                                                class="col-12 col-md-3 col-form-label">Union/Pourashava</label>
                                            <div class="col-12 col-md-9">
                                                <select name="union_pourashava" id="union_pourashava"
                                                    class="form-control form-control-inverse fill">
                                                    <option value="">Select Union/Pourashava</option>

                                                </select>
                                                @error('union_pourashava')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="upazila" class="col-12 col-md-3 col-form-label">Khatian
                                                Type</label>
                                            <div class="col-12 col-md-9">
                                                <select name="khatian_type" id="khatian_type"
                                                    class="form-control form-control-inverse fill">
                                                    <option value="">Select khatian Type</option>
                                                    @foreach ($khatianTypes as $khatianType)
                                                        <option
                                                            {{ old('khatian_type', $mouza->khatian_type_id) == $khatianType->id ? 'selected' : '' }}
                                                            value="{{ $khatianType->id }}">
                                                            {{ $khatianType->bn_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('khatian_type')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-12 col-md-3 col-form-label">Mouza
                                                Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="bn_name"
                                                    value="{{ old('bn_name', $mouza->bn_name) }}" id="bn_name"
                                                    class="form-control" placeholder="Mouza bangla name">
                                                @error('bn_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="email" class="col-12 col-md-3 col-form-label">J L No</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="j_l_no"
                                                    value="{{ old('j_l_no', $mouza->j_l_no) }}" id="j_l_no"
                                                    class="form-control" placeholder="Enter J L No">
                                                @error('j_l_no')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="status" class="col-12 col-md-3 col-form-label">Status</label>
                                            <div class="col-12 col-md-9">
                                                <input type="radio" name="status" value="1"
                                                    {{ old('status', $mouza->status) == '1' ? 'checked' : '' }}
                                                    id="status1"> <label for="status1" class="col-form-label">
                                                    Active</label>
                                                <input type="radio" name="status" value="0"
                                                    {{ old('status', $mouza->status) == '0' ? 'checked' : '' }}
                                                    id="status2"> <label for="status2" class="col-form-label">
                                                    Inactive</label>
                                                @error('status')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.mouza.index') }}" class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Update Mouza">
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
            var unionPourashavaSelected = '{{ old('union_pourashava', $mouza->union_pourashava_id) }}';
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
