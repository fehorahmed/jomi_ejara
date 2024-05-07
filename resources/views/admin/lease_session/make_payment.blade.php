@extends('admin.layout.master')
@section('title', 'Land Lease Application')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Make Payment Page</h5>
                        <span>Here is the make payment page.</span>
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
                            <button class="btn btn-primary" id="create_lease_session">Create Lease Session</button>
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
                            <div class="card" style="min-height: 70vh">
                                @if (Session::has('success'))
                                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                                        <div class="text-white"> {{ Session::get('success') }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-success border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white"> {{ Session::get('error') }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="card-body p-4">

                                    <form method="POST" action="" enctype="multipart/form-data" class="row g-3">
                                        @csrf

                                        <div class="col-md-6 text-dark col-lg-4">
                                            <div class="form-check form-check-success custom-redio">
                                                <input class="form-check-input radio-btn mt-3" type="radio" value="BANK"
                                                    {{ old('payment_option') == 'BANK' ? 'checked' : '' }}
                                                    name="payment_option" id="bank_option">
                                                <label class="form-check-label ml-3" for="bank_option">
                                                    <img src="{{ asset('assets/images/bank.jpg') }}" alt="Bkash"
                                                        height="50"> Bank
                                                    Payment
                                                </label>
                                            </div>
                                            <div class="form-check form-check-success custom-redio">
                                                <input class="form-check-input radio-btn mt-3" type="radio" value="BKASH"
                                                    {{ old('payment_option') == 'BKASH' ? 'checked' : '' }}
                                                    name="payment_option" id="bkash_option">
                                                <label class="form-check-label ml-3" for="bkash_option">
                                                    <img src="{{ asset('assets/images/bkash.jpeg') }}" alt="Bkash"
                                                        height="50"> bKash
                                                    Payment
                                                </label>
                                            </div>
                                            <div class="form-check form-check-success custom-redio">
                                                <input class="form-check-input radio-btn mt-3" type="radio" value="NAGAD"
                                                    {{ old('payment_option') == 'BKASH' ? 'checked' : '' }}
                                                    name="payment_option" id="nagad_option">
                                                <label class="form-check-label ml-3" for="nagad_option">
                                                    <img src="{{ asset('assets/images/nagad.png') }}" alt="Nagad"
                                                        height="50"> Nagad
                                                    Payment
                                                </label>
                                            </div>
                                            <div class="form-check form-check-success custom-redio">
                                                <input class="form-check-input radio-btn mt-3" type="radio" value="CASH"
                                                    {{ old('payment_option') == 'CASH' ? 'checked' : '' }}
                                                    name="payment_option" id="cash_option">
                                                <label class="form-check-label ml-3" for="cash_option">
                                                    <img src="{{ asset('assets/images/cash.jpg') }}" alt="Cash"
                                                        height="50"> Cash
                                                    Payment
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">

                                            <table class="table table-border">
                                                <tr>
                                                    <th colspan="2" class="py-1"> User Information</th>


                                                </tr>
                                                <tr>
                                                    <th class="py-1"> Name</th>
                                                    <td class="py-1"> {{ $landLeaseSession->user->name ?? '' }}</td>

                                                </tr>
                                                <tr>
                                                    <th class="py-1"> Phone</th>
                                                    <td class="py-1"> {{ $landLeaseSession->user->phone ?? '' }}</td>

                                                </tr>
                                                <tr>
                                                    <th class="py-1"> Email</th>
                                                    <td class="py-1"> {{ $landLeaseSession->user->email ?? '' }}</td>

                                                </tr>
                                            </table>

                                        </div>
                                        <div class="col-md-6 col-lg-4">

                                            <table class="table table-border">
                                                <tr>
                                                    <th class="py-1"> Land Information</th>


                                                </tr>
                                                <tr>
                                                    <th class="py-1">
                                                        {{ $landLeaseSession->dagList->bn_name }},{{ $landLeaseSession->dagList->upazila->bn_name }},
                                                        {{ $landLeaseSession->dagList->unionPourashava->bn_name }}, <br>
                                                        {{ $landLeaseSession->dagList->khatianType->bn_name }},
                                                        {{ $landLeaseSession->dagList->mouza->bn_name }},
                                                        {{ $landLeaseSession->dagList->khatianNo->bn_name }}</th>
                                                </tr>

                                            </table>
                                            <table class="table table-border">
                                                <tr>
                                                    <th colspan="2" class="py-1"> Payment Information</th>
                                                </tr>
                                                <tr>
                                                    <th class="py-1">Amount</th>
                                                    <td class="py-1"> {{ number_format($landLeaseSession->amount, 2) }}
                                                        /-Tk</td>
                                                </tr>
                                                <tr>
                                                    <th class="py-1">Vat</th>
                                                    <td class="py-1"> {{ number_format($landLeaseSession->vat, 2) }} /-Tk
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="py-1">Tax</th>
                                                    <td class="py-1"> {{ number_format($landLeaseSession->tax, 2) }}
                                                        /-Tk
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="py-1">Total</th>
                                                    <td class="py-1">
                                                        {{ number_format($landLeaseSession->total_amount, 2) }} /-Tk</td>
                                                </tr>
                                                <tr>
                                                    <th class="py-1">Total PAID</th>
                                                    <td class="py-1">
                                                        {{ number_format($landLeaseSession->paid_amount, 2) }} /-Tk</td>
                                                </tr>
                                                <tr>
                                                    <th class="py-1">Total DUE</th>
                                                    <td class="py-1">
                                                        {{ number_format($landLeaseSession->total_amount - $landLeaseSession->paid_amount, 2) }}
                                                        /-Tk</td>
                                                </tr>

                                            </table>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <label class="col-sm-4 col-lg-2 col-form-label">Enter Amount <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="amount"
                                                            value="{{ old('amount') }}" required
                                                            max="{{ $landLeaseSession->total_amount - $landLeaseSession->paid_amount }}"
                                                            placeholder="Enter Amount" step=".01">
                                                        <span class="input-group-append">
                                                            <label class="input-group-text">Taka</label>
                                                        </span>
                                                    </div>
                                                    @error('amount')
                                                        <div class="help-block text-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row" id="nagad_fee_area">
                                                <label class="col-sm-4 col-lg-2 col-form-label">Nagad Fee</label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <input type="text" id="nagad_fee" class="form-control"
                                                            readonly name="nagad_fee" placeholder="Nagad Fee">
                                                        <span class="input-group-append">
                                                            <label class="input-group-text">Taka</label>
                                                        </span>
                                                    </div>
                                                    @error('nagad_fee')
                                                        <div class="help-block text-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="bank_area">
                                                <div class="row">
                                                    <label class="col-sm-4 col-lg-2 col-form-label">ব্যাংকের নাম <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-8 col-lg-10">
                                                        <div class="input-group">
                                                            <input type="text" id="nagad_fee" class="form-control"
                                                                value="{{ old('bank_name') }}" name="bank_name"
                                                                placeholder="Bank Name">
                                                        </div>
                                                        @error('bank_name')
                                                            <div class="help-block text-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4 col-lg-2 col-form-label">শাখা <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-8 col-lg-10">
                                                        <div class="input-group">
                                                            <input type="text" id="branch_name" class="form-control"
                                                                value="{{ old('branch_name') }}" name="branch_name"
                                                                placeholder="Branch Name">
                                                        </div>
                                                        @error('branch_name')
                                                            <div class="help-block text-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4 col-lg-2 col-form-label">হিসাব নং <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-8 col-lg-10">
                                                        <div class="input-group">
                                                            <input type="text" id="account_no" class="form-control"
                                                                value="{{ old('account_no') }}" name="account_no"
                                                                placeholder="Account Number">
                                                        </div>
                                                        @error('account_no')
                                                            <div class="help-block text-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4 col-lg-2 col-form-label">জমা রশিদ
                                                        নং <span class="text-danger">*</span> </label>
                                                    <div class="col-sm-8 col-lg-10">
                                                        <div class="input-group">
                                                            <input type="text" id="pay_order_no" class="form-control"
                                                                value="{{ old('pay_order_no') }}" name="pay_order_no"
                                                                placeholder="Pay Order No">
                                                        </div>
                                                        @error('pay_order_no')
                                                            <div class="help-block text-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="mfs_area">
                                                <div class="row">
                                                    <label class="col-sm-4 col-lg-2 col-form-label">Transaction Mobile
                                                        Number <span class="text-danger">*</span></label>
                                                    <div class="col-sm-8 col-lg-10">
                                                        <div class="input-group">
                                                            <input type="text" id="transaction_number"
                                                                class="form-control" name="transaction_number"
                                                                value="{{ old('transaction_number') }}"
                                                                placeholder="Transaction Mobile Number">
                                                        </div>
                                                        @error('transaction_number')
                                                            <div class="help-block text-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4 col-lg-2 col-form-label">Transaction ID<span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-8 col-lg-10">
                                                        <div class="input-group">
                                                            <input type="text" id="transaction_id"
                                                                value="{{ old('transaction_id') }}" class="form-control"
                                                                name="transaction_id" placeholder="Transaction ID">
                                                        </div>
                                                        @error('transaction_id')
                                                            <div class="help-block text-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-4 col-lg-2 col-form-label">Reference </label>
                                                    <div class="col-sm-8 col-lg-10">
                                                        <div class="input-group">
                                                            <input type="text" id="reference" class="form-control"
                                                                value="{{ old('reference') }}" name="reference"
                                                                placeholder="Reference ">
                                                        </div>
                                                        @error('reference')
                                                            <div class="help-block text-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div id="cash_area">

                                                <div class="row">
                                                    <label class="col-sm-4 col-lg-2 col-form-label">Receipt No <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-8 col-lg-10">
                                                        <div class="input-group">
                                                            <input type="text" id="receipt_no" class="form-control"
                                                                value="{{ old('receipt_no') }}" name="receipt_no"
                                                                placeholder="Receipt no ">
                                                        </div>
                                                        @error('receipt_no')
                                                            <div class="help-block text-danger">{{ $message }} </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-4 col-lg-2 col-form-label">Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="col-sm-8 col-lg-10">
                                                    <div class="input-group">
                                                        <input type="date" id="date" class="form-control"
                                                            required value="{{ old('date') }}" name="date">
                                                    </div>
                                                    @error('date')
                                                        <div class="help-block text-danger">{{ $message }} </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class=" gap-3 text-right">
                                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                                {{--                                <button type="button" class="btn btn-light px-4">Reset</button> --}}
                                            </div>
                                        </div>
                                    </form>
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
                $(function() {
                    $('.radio-btn').change(function() {
                        var value = $(this).val();
                        if (value == "BANK") {
                            $('#mfs_area').hide();
                            $('#cash_area').hide();
                            $('#bank_area').show();
                            $('#nagad_fee_area').hide();
                        } else if (value == "BKASH") {
                            $('#mfs_area').show();
                            $('#bank_area').hide();
                            $('#cash_area').hide();
                            $('#nagad_fee_area').hide();
                        } else if (value == "NAGAD") {
                            $('#mfs_area').show();
                            $('#bank_area').hide();
                            $('#cash_area').hide();
                            $('#nagad_fee_area').show();
                        } else if (value == "CASH") {
                            $('#cash_area').show();
                            $('#mfs_area').hide();
                            $('#bank_area').hide();
                            $('#nagad_fee_area').hide();
                        } else {
                            $('#mfs_area').hide();
                            $('#bank_area').hide();
                            $('#cash_area').hide();
                            $('#nagad_fee_area').hide();
                        }
                    });

                    $('#mfs_area').hide();
                    $('#bank_area').hide();
                    $('#cash_area').hide();
                    $('#nagad_fee_area').hide();
                    //$('.radio-btn').trigger('change')
                });

            });
        </script>
    @endpush
@endpush
