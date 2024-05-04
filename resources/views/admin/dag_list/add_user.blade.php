@extends('admin.layout.master')
@section('title', 'Add Lease')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Add Lease</h5>
                        <span>Here is the Add Lease form.</span>
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
                                    <form id="campaign-form" class="form-horizontal" method="post" action=""
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="union_pourashava" class="col-12 col-md-3 col-form-label">Lease
                                                User</label>
                                            <div class="col-12 col-md-9">
                                                <select name="user" id="user"
                                                    class="form-control form-control-inverse fill">
                                                    <option value="">Select User</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }} -
                                                            {{ $user->phone }}</option>
                                                    @endforeach


                                                </select>
                                                @error('user')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="owner_hisar_part" class="col-12 col-md-3 col-form-label">Dag
                                                No</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="" value="{{ $dag->bn_name }}" readonly
                                                    id="" class="form-control" placeholder="">

                                            </div>
                                        </div>

                                        <table class="table table-bordered">
                                            <tr>

                                                <td>
                                                    <b title="dag no">দাগঃ- {{ $dag->bn_name }}
                                                    </b> <br>
                                                    <b title="জমির পরিমান">জমির পরিমানঃ </b>
                                                    {{ $dag->land_amount }}
                                                    {{ $dag->land_amount_type == 1 ? 'Borgofoot' : 'SATAK' }}<br>
                                                    <b title="জমির অবস্থা">জমির অবস্থাঃ </b>
                                                    {{ $dag->land_condition }}<br>

                                                </td>
                                                <td>
                                                    <b title="উপজেলা">উপজেলাঃ </b>
                                                    {{ $dag->upazila->bn_name }}<br>
                                                    <b title="মৌজা">মৌজাঃ </b>
                                                    {{ $dag->mouza->bn_name }}<br>
                                                    <b title="জে. এল. নং">জে. এল. নং </b>
                                                    {{ $dag->mouza->j_l_no }}<br>
                                                    <b title="খতিয়ান">খতিয়ানঃ </b>
                                                    {{ $dag->khatianNo->bn_name }}<br>

                                                </td>

                                            </tr>
                                        </table>


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
