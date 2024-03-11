@extends('admin.layout.master')
@section('title', 'Upazila Create')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Upazila Create</h5>
                        <span>Here is the upazila create form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.upazila.index') }}">Upazila List</a>
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
                                    <h5 class="text-white"> Upazila Create Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.upazila.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="email" class="col-12 col-md-3 col-form-label">Upazila
                                                Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="bn_name" value="{{ old('bn_name') }}"
                                                    id="bn_name" class="form-control" placeholder="Upazila bangla name">
                                                @error('bn_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.upazila.index') }}" class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Add Upazila">
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
            //     // personal address

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
        });
    </script>
@endpush
