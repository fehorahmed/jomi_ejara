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
                        <h5>Person List Page</h5>
                        <span>Here is Person List.</span>
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
                            <a class="btn btn-primary" href="{{ route('admin.home-setting.person.create') }}">Person
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
                                    <div class="dt-responsive table-responsive">
                                        <table id="order-table" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Designation</th>
                                                    <th>Address</th>
                                                    <th>Text</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td> <img src="{{ asset('storage/' . $data->image) }}"
                                                                alt="Image" width="100" height="70">
                                                        </td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->designation }}</td>
                                                        <td>{{ $data->address }}</td>
                                                        <td>{{ $data->text }}</td>
                                                        <td>
                                                            @if ($data->status == 1)
                                                                <p class="badge badge-success">Active</p>
                                                            @else
                                                                <p class="badge badge-danger">Inactive</p>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary"
                                                                href="{{ route('admin.home-setting.person.edit', $data->id) }}">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>

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
