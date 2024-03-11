@extends('admin.layout.master')
@section('title', 'Khatian No List')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Khatian No List</h5>
                        <span>Here is the list of Khatian No(s).</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        {{-- <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}s"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">Admin</a>
                        </li> --}}
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.khatian-list.create') }}">Khatian No
                                Create</a>
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
                        <div class="col-sm-12">
                            <div class="card">

                                {{-- <div class="card-header">
                                    <h5>Default Ordering</h5>
                                    <span>Lets say you want to sort the fourth column (3) descending
                                        and the first column (0) ascending: your order: would look
                                        like this: order: [[ 3, 'desc' ], [ 0, 'asc' ]]</span>
                                </div> --}}
                                <div class="card-block">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <input type="text" name="search" value="{{ request()->search }}"
                                                        placeholder="Search by name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="search_upazila" id="search_upazila"
                                                        class="form-control fill">
                                                        <option value="">Select Upazila</option>

                                                        @foreach ($upazilas as $upazila)
                                                            <option
                                                                {{ request()->search_upazila == $upazila->id ? 'selected' : '' }}
                                                                value="{{ $upazila->id }}">
                                                                {{ $upazila->bn_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="search_union_pourashava" id="search_union_pourashava"
                                                        class="form-control fill">
                                                        <option value="">Select Union/Pourashava</option>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="search_khatian_type" id="search_khatian_type"
                                                        class="form-control fill">
                                                        <option value="">Select Khatian Type</option>
                                                        @foreach ($khatianTypes as $khatianType)
                                                            <option
                                                                {{ request()->search_khatian_type == $khatianType->id ? 'selected' : '' }}
                                                                value="{{ $khatianType->id }}">
                                                                {{ $khatianType->bn_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="search_mouza" id="search_mouza" class="form-control fill">
                                                        <option value="">Select Mouza</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div><button class="btn btn-primary"><i class="fa fa-search "></i></button>
                                                    <button type="submit" name="submit" value="Download"
                                                        class="btn btn-primary"><i class="fa fa-download "></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="dt-responsive table-responsive">
                                        <table id="order-table" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Owner Name</th>
                                                    <th>Upazila</th>
                                                    <th>Union/Pourashava</th>
                                                    <th>Khatian Type</th>
                                                    <th>Mouza</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->bn_name }}</td>
                                                        <td>{{ $data->owner_name }}</td>
                                                        <td>{{ $data->upazila->bn_name ?? '' }}</td>
                                                        <td>{{ $data->unionPourashava->bn_name ?? '' }}</td>
                                                        <td>{{ $data->khatianType->bn_name ?? '' }}</td>
                                                        <td>{{ $data->mouza->bn_name ?? '' }}</td>
                                                        <td>
                                                            @if ($data->status == 1)
                                                                <span class="label label-md label-success">Active</span>
                                                            @else
                                                                <span class="label label-md label-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td>

                                                            <a href="{{ route('admin.khatian-list.edit', $data->id) }}"
                                                                class="btn btn-primary">Edit</a>

                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            {{-- <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot> --}}

                                        </table>
                                        {{ $datas->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="styleSelector">
        </div>
    </div>

@endsection


@push('scripts')
    <script>
        $(function() {
            var unionPourashavaSelected = '{{ request()->search_union_pourashava }}';
            var union_pourashava_variable = $('#search_union_pourashava');
            $('#search_upazila').on('change', function() {
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
                    $('#search_khatian_type').trigger('change');
                    // $('#district').trigger('change');
                });

            });

            $('#search_upazila').trigger('change');
            // personal address



            $('#search_union_pourashava').on('change', function() {
                // var union_pourashava = $(this).val();

                $("#search_khatian_type").val($("#khatian_type option:first").val());

            });

            var mouzaSelected = '{{ request()->search_mouza }}';
            $('#search_khatian_type').on('change', function() {
                var khatian_type_id = $(this).val();
                var upazila_id = $('#search_upazila').val();
                var union_pourashava_id = union_pourashava_variable.val();

                if (upazila_id == '' || upazila_id == null) {
                    //  alert('Please select upazila');
                    $("#search_khatian_type").val($("#khatian_type option:first").val());

                    return false;
                }
                $('#search_mouza').html('<option value="">Select mouza</option>');

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
                            $('#search_mouza').append('<option selected value="' + item
                                .id + '" >' + item
                                .bn_name + '</option>');
                        } else {
                            $('#search_mouza').append('<option value="' + item.id +
                                '">' + item
                                .bn_name + '</option>');
                        }
                    });
                    $('#search_mouza').trigger('change');
                });

            });



        });
    </script>
@endpush
