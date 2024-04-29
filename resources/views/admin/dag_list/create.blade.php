@extends('admin.layout.master')
@section('title', 'Dag No Create')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Dag No Create</h5>
                        <span>Here is the Dag No create form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.dag-list.index') }}">Dag No
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
                                    <h5 class="text-white"> Dag No Create Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.dag-list.store') }}" enctype="multipart/form-data">
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
                                            <label for="khatian_type" class="col-12 col-md-3 col-form-label">Khatian
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
                                                <select name="khatian_no" id="khatian_no"
                                                    class="form-control form-control-inverse fill">
                                                    <option value="">Select khatian no</option>

                                                </select>
                                                @error('khatian_no')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ejara_rate" class="col-12 col-md-3 col-form-label">Ejara
                                                Rate</label>
                                            <div class="col-12 col-md-9">
                                                <select name="ejara_rate" id="ejara_rate"
                                                    class="form-control form-control-inverse fill">
                                                    <option value="">Select Ejara Rate</option>
                                                    @foreach ($ejara_rates as $ejara_rate)
                                                        <option value="{{ $ejara_rate->id }}"
                                                            {{ old('ejara_rate') == $ejara_rate->id ? 'selected' : '' }}>
                                                            {{ $ejara_rate->bn_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('ejara_rate')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="bn_name" class="col-12 col-md-3 col-form-label">Dag
                                                No</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="bn_name" value="{{ old('bn_name') }}"
                                                    id="bn_name" class="form-control" placeholder="Enter Dag No ">
                                                @error('bn_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="land_amount" class="col-12 col-md-3 col-form-label">Total Land
                                            </label>
                                            <div class="col-8 col-md-4">
                                                <input type="number" name="land_amount" value="{{ old('land_amount') }}"
                                                    id="land_amount" class="form-control"
                                                    placeholder="Enter Land Amount ">
                                                @error('land_amount')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                            <label for="land_amount_type" class="col-12 col-md-2 col-form-label">Land Type
                                            </label>
                                            <div class="col-8 col-md-3 mt-2">
                                                <input type="radio" name="land_amount_type"
                                                    {{ old('land_amount_type') == 1 ? 'checked' : '' }} value="1"
                                                    id="Borgofoot"> <label for="Borgofoot"> Borgofoot</label>
                                                <input type="radio" name="land_amount_type"
                                                    {{ old('land_amount_type') == 2 ? 'checked' : '' }} value="2"
                                                    id="Sotok"> <label for="Sotok"> Sotok</label>
                                                @error('land_amount_type')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="owner_hisar_part" class="col-12 col-md-3 col-form-label">Owner
                                                hisar
                                                amount</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="owner_hisar_part"
                                                    value="{{ old('owner_hisar_part') }}" id="owner_hisar_part"
                                                    class="form-control" placeholder="Enter Owner Hisar Part ">
                                                @error('owner_hisar_part')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="occupied_land" class="col-12 col-md-3 col-form-label">Occupied
                                                Land</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="occupied_land"
                                                    value="{{ old('occupied_land') }}" id="occupied_land"
                                                    class="form-control" placeholder="Enter Occupied Land ">
                                                @error('occupied_land')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="unoccupied_land" class="col-12 col-md-3 col-form-label">Unoccupied
                                                Land</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="unoccupied_land"
                                                    value="{{ old('unoccupied_land') }}" id="unoccupied_land"
                                                    class="form-control" placeholder="Enter Unoccupied Land ">
                                                @error('unoccupied_land')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="land_condition" class="col-12 col-md-3 col-form-label">Present
                                                Land
                                                Condition</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="land_condition"
                                                    value="{{ old('land_condition') }}" id="land_condition"
                                                    class="form-control" placeholder="Enter Land Condition">
                                                @error('land_condition')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="remarks" class="col-12 col-md-3 col-form-label">Remarks
                                            </label>
                                            <div class="col-12 col-md-9">
                                                <textarea name="remarks" class="form-control" id="remarks" cols="30" rows="3">{{ old('remarks') }}</textarea>
                                                @error('remarks')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.dag-list.index') }}" class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Add Dag No">
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
            var union_pourashava_variable = $('#union_pourashava');
            $('#upazila').on('change', function() {
                var upazila_id = $(this).val();
                union_pourashava_variable.html('<option value="">Select union/pourashava</option>');
                $.ajax({
                    method: "GET",
                    url: "{{ route('get.unions') }}",
                    data: {
                        upazila_id: upazila_id
                    }
                }).done(function(data) {
                    $.each(data, function(index, item) {
                        if (unionPourashavaSelected == item.id) {
                            union_pourashava_variable.append('<option selected value="' +
                                item
                                .id +
                                '" selected>' + item.bn_name +
                                '</option>');
                        } else {
                            union_pourashava_variable.append('<option value="' + item.id +
                                '">' + item
                                .bn_name + '</option>');
                        }
                    });
                    $('#khatian_type').trigger('change');
                    // $('#district').trigger('change');
                });

            });

            $('#upazila').trigger('change');
            // personal address



            $('#union_pourashava').on('change', function() {
                var union_pourashava = $(this).val();
                // if (union_pourashava == '' || union_pourashava == null) {
                $("#khatian_type").val($("#khatian_type option:first").val());
                //    return false;
                //}
            });

            var mouzaSelected = '{{ old('mouza') }}';
            $('#khatian_type').on('change', function() {
                var khatian_type_id = $(this).val();
                var upazila_id = $('#upazila').val();
                var union_pourashava_id = union_pourashava_variable.val();

                if (upazila_id == '' || upazila_id == null) {
                    //  alert('Please select upazila');
                    $("#khatian_type").val($("#khatian_type option:first").val());

                    return false;
                }
                $('#mouza').html('<option value="">Select mouza</option>');

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
                                .id + '" >' + item
                                .bn_name + '</option>');
                        } else {
                            $('#mouza').append('<option value="' + item.id +
                                '">' + item
                                .bn_name + '</option>');
                        }
                    });
                    $('#mouza').trigger('change');
                });

            });

            //  $('#khatian_type').trigger('change');
            var khatianNoSelected = '{{ old('khatian_no') }}';

            $('#mouza').on('change', function() {
                var mouza_id = $(this).val();
                var khatian_type_id = $('#khatian_type').val();
                var upazila_id = $('#upazila').val();
                var union_pourashava_id = union_pourashava_variable.val();

                // if (khatian_type_id == '' || khatian_type_id == null) {
                //     // alert('Please select khatian type');
                //     // $("#khatian_type").val($("#khatian_type option:first").val());

                //     return false;
                // }
                // if (upazila_id == '' || upazila_id == null) {
                //     alert('Please select upazila');
                //     $("#khatian_type").val($("#khatian_type option:first").val());

                //     return false;
                // }
                // if (union_pourashava_id == '' || union_pourashava_id == null) {
                //     alert('Please select Union/Pourashava');
                //     $("#khatian_type").val($("#khatian_type option:first").val());

                //     return false;
                // }

                $('#khatian_no').html('<option value="">Select Khatian No</option>');

                $.ajax({
                    method: "GET",
                    url: '{{ route('get.khatian_no.by.mouza') }}',
                    data: {
                        khatian_type_id: khatian_type_id,
                        upazila_id: upazila_id,
                        union_pourashava_id: union_pourashava_id,
                        mouza_id: mouza_id
                    }
                }).done(function(data) {
                    $.each(data, function(index, item) {
                        if (khatianNoSelected == item.id) {
                            $('#khatian_no').append('<option selected value="' + item
                                .id +
                                '" selected>' + item
                                .bn_name + '</option>');
                        } else {
                            $('#khatian_no').append('<option value="' + item.id +
                                '">' + item
                                .bn_name + '</option>');
                        }
                    });
                });
            });
        });
    </script>
@endpush
