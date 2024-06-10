@extends('admin.layout.master')
@section('title', 'Land Lease Application')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Land Lease Application List</h5>
                        <span>Here is the list of Land Lease Application.</span>
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
                                                            <b>Method : </b> {{ $data->payment_method }} <br>
                                                            @if ($data->payment_method == 'BANK')
                                                                <b>Bank : </b> {{ $data->bank }} <br>
                                                                <b>Branch : </b> {{ $data->branch }} <br>
                                                                <b>Pay-Order : </b> {{ $data->payorder }} <br>
                                                            @elseif ($data->payment_method == 'CASH')
                                                                <b>Money Receipt : </b> {{ $data->receipt_no }} <br>
                                                            @else
                                                                <b>Account No : </b> {{ $data->transaction_number }} <br>
                                                                <b>Transaction No : </b> {{ $data->transaction_id }} <br>
                                                            @endif
                                                            <b>Amount : </b> {{ $data->amount }} <br>

                                                        </td>
                                                        <td>
                                                            @if (isset($data->transactionLog->status) && $data->transactionLog->status == 'CONFIRM')
                                                                <span
                                                                    class="label label-md label-success">{{ $data->transactionLog->status }}</span>
                                                            @else
                                                                @if (isset($data->transactionLog->status))
                                                                    <span
                                                                        class="label label-md label-info">{{ $data->transactionLog->status }}</span>
                                                                @endif
                                                            @endif


                                                        </td>
                                                        <td>
                                                            @if ($data->status == 'ACCEPT')
                                                                <span
                                                                    class="label label-md label-success">{{ $data->status }}</span>
                                                            @else
                                                                <span
                                                                    class="label label-md label-info">{{ $data->status }}</span>
                                                            @endif


                                                        </td>
                                                        <td>
                                                            @if ($data->status == 'APPLIED' && $data->landLeaseOrder->status == 'PUBLISHED')
                                                                <div class="btn-group dropdown-split-primary">
                                                                    <button type="button" class="btn btn-primary"><i
                                                                            class="icofont icofont-user-alt-3"></i>Actions</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <span class="sr-only">Toggle primary</span>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <button data-id="{{ $data->id }}"
                                                                            class="dropdown-item waves-effect waves-light btn-accept">Accept</button>

                                                                    </div>
                                                                </div>
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
                $('.btn-accept').click(function() {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        method: "GET",
                        url: "{{ route('admin.lease_application_accept') }}",
                        data: {
                            lease_application_id: id
                        }
                    }).done(function(data) {

                        if (data.status) {
                            alert(data.message)
                            location.reload()
                        } else {
                            alert(data.message)
                        }

                    });
                })
            });
        </script>
    @endpush
@endpush
