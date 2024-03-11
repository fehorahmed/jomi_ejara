@extends('admin.layout.master')
@section('title', 'Union/Pourashava List')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Union/Pourashava List</h5>
                        <span>Here is the list of Union/Pourashava(s).</span>
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
                            <a class="btn btn-primary" href="{{ route('admin.union-pourashava.create') }}">Union/Pourashava
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
                                                    <select name="upazila" id="upazila" class="form-control fill">
                                                        <option value="">Select Upazila</option>

                                                        @foreach ($upazilas as $upazila)
                                                            <option
                                                                {{ request()->upazila == $upazila->id ? 'selected' : '' }}
                                                                value="{{ $upazila->id }}">
                                                                {{ $upazila->bn_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div><button class="btn btn-primary"><i class="fa fa-search "></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="dt-responsive table-responsive">
                                        <table id="order-table" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th> Name</th>
                                                    <th>Type</th>
                                                    <th>Upazila Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->bn_name }}</td>
                                                        <td>{{ $data->is_pourashava == 1 ? 'Pourashava' : 'Union' }}</td>
                                                        <td>{{ $data->upazila->bn_name ?? '' }}</td>
                                                        <td>
                                                            @if ($data->status == 1)
                                                                <span class="label label-md label-success">Active</span>
                                                            @else
                                                                <span class="label label-md label-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td>

                                                            <a href="{{ route('admin.union-pourashava.edit', $data->id) }}"
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
    <!-- Datatables js -->
    {{-- <script src="{{ asset('/') }}assets/js/vendor/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.flash.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.print.min.js"></script>
 --}}

    @push('scripts')
        <script>
            $(function() {
                var districtSelected = '{{ request()->district }}';
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
                var subDistrictSelected = '{{ request()->upazila }}';
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
@endpush
