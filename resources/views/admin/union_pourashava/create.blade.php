@extends('admin.layout.master')
@section('title', 'Union/Pourashava Create')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Union/Pourashava Create</h5>
                        <span>Here is the union/pourashava create form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.union-pourashava.index') }}">Union/Pourashava
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
                                    <h5 class="text-white"> Union/Pourashava Create Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.union-pourashava.store') }}" enctype="multipart/form-data">
                                        @csrf


                                        <div class="row mb-3">
                                            <label for="upazila" class="col-12 col-md-3 col-form-label">Upazila</label>
                                            <div class="col-12 col-md-9">
                                                <select name="upazila" id="upazila"
                                                    class="form-control form-control-inverse fill">
                                                    <option value="">Select Upazila</option>
                                                    @foreach ($upazilas as $upazila)
                                                        <option {{ old('upazila') == $upazila->id ? 'selected' : '' }}
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
                                            <label for="type" class="col-12 col-md-3 col-form-label">Type</label>
                                            <div class="col-12 col-md-9">
                                                <select name="type" id="type"
                                                    class="form-control form-control-inverse fill">
                                                    <option value="">Select type</option>
                                                    <option value="0" {{ old('type') == '0' ? 'selected' : '' }}>Union
                                                    </option>
                                                    <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>
                                                        Pourashava
                                                    </option>
                                                </select>
                                                @error('type')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-12 col-md-3 col-form-label">Union/Pourashava
                                                Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="bn_name" value="{{ old('bn_name') }}"
                                                    id="bn_name" class="form-control"
                                                    placeholder="Union/Pourashava bangla name">
                                                @error('bn_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.union-pourashava.index') }}"
                                                class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Add Union/Pourashava">
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
            var districtSelected = '{{ old('district') }}';
            $('#division').on('change', function() {
                var division_id = $(this).val();
                $('#district').html('<option value="">Select district</option>');
                $.ajax({
                    method: "GET",
                    url: "{{ route('get.district') }}",
                    data: {
                        division_id: division_id
                    }
                }).done(function(data) {
                    $.each(data, function(index, item) {
                        if (districtSelected == item.id) {
                            $('#district').append('<option selected value="' + item.id +
                                '" selected>' + item.bn_name +
                                '</option>');
                        } else {
                            $('#district').append('<option value="' + item.id + '">' + item
                                .bn_name + '</option>');
                        }
                    });

                    $('#district').trigger('change');
                });

            });
            $('#division').trigger('change');
            // personal address

            var subDistrictSelected = '{{ old('upazila') }}';
            $('#district').on('change', function() {
                var district_id = $(this).val();
                $('#upazila').html('<option value="">Select upazila</option>');
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
                                $('#upazila').append('<option selected value="' + item
                                    .id +
                                    '" selected>' + item
                                    .bn_name + '</option>');
                            } else {
                                $('#upazila').append('<option value="' + item.id +
                                    '">' + item
                                    .bn_name + '</option>');
                            }
                        });
                        $('#upazila').trigger('change');
                    });
                }
            });
            $('#district').trigger('change');
        });
    </script>
@endpush
