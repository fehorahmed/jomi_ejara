@extends('admin.layout.master')
@section('title', 'Land Lease Payments')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Land Lease Payment Details</h5>
                        <span>Here is the list of Land Lease Payment Details.</span>
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
                        {{-- <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.land-lease.create') }}">Land Lease
                                Application</a>
                        </li> --}}
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
                                                    <th> Payment Status</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data->payments as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->dagList->bn_name }},{{ $data->dagList->upazila->bn_name }},
                                                            {{ $data->dagList->unionPourashava->bn_name }},
                                                            <br>
                                                            {{ $data->dagList->khatianType->bn_name }},
                                                            {{ $data->dagList->mouza->bn_name }},
                                                            {{ $data->dagList->khatianNo->bn_name }}
                                                        </td>
                                                        <td>
                                                            <b>Name : </b> {{ $data->user->name }}
                                                            <br>
                                                            <b>Phone : </b> {{ $data->user->phone }}
                                                            <br>
                                                            <b>Email : </b> {{ $data->user->email }}
                                                            <br>
                                                        </td>
                                                        <td>
                                                            <b>Date : </b> {{ $item->created_at->format('Y-m-d') }} <br>
                                                            <b>Method : </b> {{ $item->payment_method }} <br>
                                                            @if ($item->payment_method == 'BANK')
                                                                <b>Bank : </b> {{ $item->bank }} <br>
                                                                <b>Branch : </b> {{ $item->branch }} <br>
                                                                <b>Pay-Order : </b> {{ $item->payorder }} <br>
                                                            @elseif ($item->payment_method == 'CASH')
                                                                <b>Money Receipt : </b> {{ $item->receipt_no }} <br>
                                                            @else
                                                                <b>Account No : </b> {{ $item->transaction_number }} <br>
                                                                <b>Transaction No : </b> {{ $item->transaction_id }} <br>
                                                            @endif
                                                            <b>Amount : </b> {{ number_format($item->amount, 2) }} /-Tk
                                                            <br>

                                                        </td>
                                                        <td>
                                                            @if ($item->status == 'CONFIRM')
                                                                <span
                                                                    class="label label-md label-success">{{ $item->status }}</span>
                                                            @else
                                                                <span
                                                                    class="label label-md label-info">{{ $item->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{-- @if ($item->status == 'PENDING')
                                                                <button data-id="{{ $item->id }}"
                                                                    class="btn btn-primary change-status">Change
                                                                    status</button>
                                                            @endif --}}
                                                            <a href="{{route('admin.lease_payment_detail_print',$item->id)}}"
                                                                class="btn btn-primary">Print</a>

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
                                        {{-- {{ $datas->links('pagination::bootstrap-5') }} --}}
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
                $('.change-status').click(function() {
                    var id = $(this).attr('data-id');

                    Swal.fire({
                        title: "Are you sure to Confirm?",
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
                                url: "{{ route('admin.payments.lease-application.accept') }}",
                                data: {
                                    id: id
                                }
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
