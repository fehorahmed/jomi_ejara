@extends('admin.layout.master')
@section('title', 'Land Lease Order')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Land Lease Payment List</h5>
                        <span>Here is the list of Lease Payments.</span>
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
                                                    <input type="date" name="start_date"
                                                        value="{{ request()->start_date }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <input type="date" name="end_date" value="{{ request()->end_date }}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <select name="status" class="form-control" id="">
                                                        <option value="">Select Status</option>
                                                        <option {{ request()->status == 'PENDING' ? 'selected' : '' }}
                                                            value="PENDING">Pending</option>
                                                        <option {{ request()->status == 'CONFIRM' ? 'selected' : '' }}
                                                            value="CONFIRM">Confirm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <select name="upazila" class="form-control" id="">
                                                        <option value="">Select Upazila</option>
                                                        @foreach ($upazilas as $upazila)
                                                            <option
                                                                {{ $upazila->id == request()->upazila ? 'selected' : '' }}
                                                                value="{{ $upazila->id }}">{{ $upazila->bn_name }}
                                                            </option>
                                                        @endforeach


                                                    </select>
                                                </div>
                                            </div>



                                            <div class="col-md-3">
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
                                                    <th> Dag No</th>
                                                    <th>Payment Info</th>
                                                    <th>Amount</th>

                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total_amount = 0;
                                                @endphp
                                                @foreach ($transactions as $data)
                                                    @php
                                                        $total_amount += $data->amount;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if ($data->land_lease_session_id)
                                                                <p>Lease Session Payment</p>
                                                                {{ $data->landLeaseSession->dagList->bn_name }},{{ $data->landLeaseSession->dagList->upazila->bn_name }},
                                                                <br>
                                                                {{ $data->landLeaseSession->dagList->unionPourashava->bn_name }},
                                                                {{ $data->landLeaseSession->dagList->khatianType->bn_name }},
                                                                <br>
                                                                {{ $data->landLeaseSession->dagList->mouza->bn_name }},
                                                                {{ $data->landLeaseSession->dagList->khatianNo->bn_name }}
                                                            @endif
                                                            @if ($data->land_lease_application_id)
                                                                <p>Lease Application Payment</p>
                                                                {{ $data->landLeaseApplication->dagList->bn_name }},{{ $data->landLeaseApplication->dagList->upazila->bn_name }},
                                                                {{ $data->landLeaseApplication->dagList->unionPourashava->bn_name }},
                                                                {{ $data->landLeaseApplication->dagList->khatianType->bn_name }},
                                                                {{ $data->landLeaseApplication->dagList->mouza->bn_name }},
                                                                {{ $data->landLeaseApplication->dagList->khatianNo->bn_name }}
                                                            @endif

                                                        </td>
                                                        <td>
                                                            Method : {{ $data->payment_method }} <br>
                                                            @if ($data->payment_method == 'CASH')
                                                                Receipt No : {{ $data->receipt_no }} <br>
                                                            @endif
                                                            @if ($data->payment_method == 'BANK')
                                                                Bank : {{ $data->bank ?? '' }} <br>
                                                                Branch : {{ $data->branch ?? '' }} <br>
                                                                Account No : {{ $data->account_no ?? '' }} <br>
                                                                Payorder : {{ $data->payorder ?? '' }} <br>
                                                            @endif
                                                            @if ($data->payment_method == 'BKASH' || $data->payment_method == 'NAGAD')
                                                                Transaction Number : {{ $data->transaction_number ?? '' }}
                                                                <br>
                                                                Transaction ID : {{ $data->transaction_id ?? '' }} <br>
                                                                Reference : {{ $data->reference ?? '' }} <br>
                                                            @endif

                                                            Date : {{ $data->created_at->format('d-m-Y') }}
                                                        </td>
                                                        <td>
                                                            {{ number_format($data->amount, 2) }}
                                                        </td>
                                                        <td>

                                                            {{ $data->status }}
                                                        </td>


                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td>{{ number_format($total_amount, 2) }}/- TK</td>
                                                    <td></td>
                                                </tr>

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
                //     // personal address

                //     var subDistrictSelected = '{{ old('sub_district') }}';
                //     $('#district').on('change', function() {
                //         var district_id = $(this).val();
                //         $('#sub_district').html('<option value="">Select sub district</option>');
                //         if (district_id != '' && district_id != null) {
                //             $.ajax({
                //                 method: "GET",
                //                 url: ' route('get.sub_district') ',
                //                 data: {
                //                     district_id: district_id
                //                 }
                //             }).done(function(data) {
                //                 $.each(data, function(index, item) {
                //                     if (subDistrictSelected == item.id) {
                //                         $('#sub_district').append('<option selected value="' + item
                //                             .id +
                //                             '" selected>' + item.name + '</option>');
                //                     } else {
                //                         $('#sub_district').append('<option value="' + item.id +
                //                             '">' +
                //                             item.name + '</option>');
                //                     }
                //                 });
                //                 $('#sub_district').trigger('change');
                //             });
                //         }
                //     });
                //     $('#district').trigger('change');
            });
        </script>
    @endpush
@endpush
