@extends('admin.layout.master')
@section('title', 'User List')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>User List</h5>
                        <span>Here is the list of User.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}s"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">User List </a>
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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->email }}</td>
                                                        <td>{{ $data->phone }}</td>
                                                        <td>
                                                            @if ($data->status == 1)
                                                                <span class="btn btn-success">Active</span>
                                                            @else
                                                                <span class="btn btn-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (\Illuminate\Support\Facades\Auth::id() == $data->id)
                                                                <span class="btn btn-warning">Self</span>
                                                            @else
                                                                <a href="{{ route('admin.user.edit', $data->id) }}"
                                                                    class="btn btn-primary">Edit</a>
                                                                {{-- <button data-id="{{ $data->id }}"
                                                                    class="btn btn-primary btn-status-change">
                                                                    Change Status
                                                                </button> --}}
                                                            @endif
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
    <script src="{{ asset('/') }}assets/js/vendor/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.flash.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.print.min.js"></script>


    <script !src="">
        // $(function() {
        //     $('.btn-status-change').on('click', function() {
        //         var id = $(this).data('id');
        //         var result = confirm('Are you sure to change status??');
        //         if (result) {
        //             if (id != '' && id != null) {
        //                 $.ajax({
        //                     method: "GET",
        //                     url: " route('admin.admin.change-status') ",
        //                     data: {
        //                         id: id
        //                     }
        //                 }).done(function(response) {
        //                     if (response.success) {
        //                         alert(response.message)
        //                         location.reload();
        //                     } else {
        //                         alert(response.message);

        //                     }

        //                 });
        //             } else {
        //                 alert('Something went wrong. Please reload.')
        //             }
        //         }
        //     })
        // })
    </script>
@endpush
