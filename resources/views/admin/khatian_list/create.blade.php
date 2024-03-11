@extends('admin.layout.master')
@section('title', 'Khatian No Create')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Khatian No Create</h5>
                        <span>Here is the Khatian No create form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.khatian-list.index') }}">Khatian No
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
                                    <h5 class="text-white"> Khatian No Create Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.khatian-list.store') }}" enctype="multipart/form-data">
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
                                                            {{ old('khatian_type') == $khatianType->id ? 'selected' : '' }}
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
                                            <label for="mouza" class="col-12 col-md-3 col-form-label">Mouza</label>
                                            <div class="col-12 col-md-9">
                                                <select name="mouza" id="mouza"
                                                    class="form-control form-control-inverse fill">
                                                    <option value="">Select Mouza</option>

                                                </select>
                                                @error('mouza')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="khatian_no" class="col-12 col-md-3 col-form-label">Khatian
                                                No</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="bn_name" value="{{ old('bn_name') }}"
                                                    id="bn_name" class="form-control" placeholder="Khatian No ">
                                                @error('bn_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="owner_name" class="col-12 col-md-3 col-form-label">Owner
                                                Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="owner_name" value="{{ old('owner_name') }}"
                                                    id="owner_name" class="form-control" placeholder="Enter Owner Name ">
                                                @error('owner_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.khatian-list.index') }}"
                                                class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Add Khatian No">
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

            var mouzaSelected = '{{ old('mouza') }}';
            $('#khatian_type').on('change', function() {
                var khatian_type_id = $(this).val();
                var upazila_id = $('#upazila').val();
                var union_pourashava_id = $('#union_pourashava').val();

                // if (khatian_type_id != '' || khatian_type_id != null) {
                //     alert('Please select Khatian type');
                //     return false;
                // }

                if (upazila_id == '' || upazila_id == null) {
                    alert('Please select upazila');
                    $("#khatian_type").val($("#khatian_type option:first").val());

                    return false;
                }
                if (union_pourashava_id == '' || union_pourashava_id == null) {
                    alert('Please select Union/Pourashava');
                    $("#khatian_type").val($("#khatian_type option:first").val());

                    return false;
                }

                $('#mouza').html('<option value="">Select mouza</option>');
                // if (khatian_type_id != '' && khatian_type_id != null && upazila_id != '' && upazila_id !=
                //     null && union_pourashava_id != '' && union_pourashava_id != null) {
                $.ajax({
                    method: "GET",
                    url: '{{ route('get.mouza.by.khatiyan_type') }}',
                    data: {
                        khatian_type_id: khatian_type_id,
                        upazila_id: upazila_id,
                        union_pourashava_id: union_pourashava_id
                    }
                }).done(function(data) {
                    $.each(data, function(index, item) {
                        if (mouzaSelected == item.id) {
                            $('#mouza').append('<option selected value="' + item
                                .id +
                                '" selected>' + item
                                .bn_name + '</option>');
                        } else {
                            $('#mouza').append('<option value="' + item.id +
                                '">' + item
                                .bn_name + '</option>');
                        }
                    });
                    //  $('#upazila').trigger('change');
                });
                // }
            });
            $('#district').trigger('change');
        });
    </script>
@endpush
