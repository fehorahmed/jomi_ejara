@extends('admin.layout.master')
@section('title', 'Land Lease Application')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Lease Session List</h5>
                        <span>Here is the list of Lease Session.</span>
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
                            <button class="btn btn-primary" id="create_lease_session">Create Lease Session</button>
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
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                    <input type="text" name="search" value="{{ request()->search }}"
                                                        placeholder="Search by name" class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-md-3">
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
                                                    <th> Dag No</th>
                                                    <th> User Details</th>
                                                    <th> Payment Details</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->dagList->bn_name }},{{ $data->dagList->upazila->bn_name }},
                                                            {{ $data->dagList->unionPourashava->bn_name }}, <br>
                                                            {{ $data->dagList->khatianType->bn_name }},
                                                            {{ $data->dagList->mouza->bn_name }},
                                                            {{ $data->dagList->khatianNo->bn_name }}</td>
                                                        <td>
                                                            <b>Name : </b> {{ $data->user->name }} <br>
                                                            <b>Phone : </b> {{ $data->user->phone }} <br>
                                                            <b>Email : </b> {{ $data->user->email }} <br>
                                                        </td>
                                                        <td>
                                                            <b>Amount : </b> {{ $data->amount }} <br>
                                                            <b>Vat : </b> {{ $data->vat }} <br>
                                                            <b>Tax : </b> {{ $data->tax }} <br>
                                                            <b>Total Amount : </b> {{ $data->total_amount }} <br>
                                                            <b>Paid Amount : </b> {{ $data->paid_amount }} <br>

                                                        </td>
                                                        <td>
                                                            @if ($data->total_amount > $data->paid_amount)
                                                                <span class="label label-md label-danger">DUE</span>
                                                            @else
                                                                <span class="label label-md label-success">PAID</span>
                                                            @endif


                                                        </td>
                                                        <td>
                                                            @if ($data->total_amount > $data->paid_amount)
                                                                <a href="{{ route('admin.lease_session_payment', $data->id) }}"
                                                                    class="btn btn-primary">Make Payment</a>
                                                            @else
                                                                <span class="label label-md label-success">PAID</span>
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
    {{-- <script src="{{ asset('/') }}assets/js/vendor/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.flash.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/buttons.print.min.js"></script>
 --}}

    @push('scripts')
        <script>
            $(function() {
                $('#create_lease_session').click(function() {


                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, do it!"
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                method: "GET",
                                url: "{{ route('admin.lease_session_create') }}",

                            }).done(function(data) {

                                if (data.status) {
                                    Swal.fire({
                                        title: "Success",
                                        text: data.message,
                                        icon: "success"
                                    });

                                    location.reload()
                                } else {
                                    Swal.fire({
                                        title: "Oops...",
                                        text: "Something went wrong!",
                                        icon: "error"
                                    });

                                }

                            });

                        }
                    });



                })

            });
        </script>
    @endpush
@endpush
