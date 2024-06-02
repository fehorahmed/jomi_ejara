@extends('frontend.layouts.app')

@section('content')
    <div class="container wid-cont">
        <div class="land-widget">
            <div class="col-md-6 wid-area">
                <div class="row wid-title-sec">
                    <div class="col-xs-7">
                        <h2 class="wid-titel">LAND-{{ $lease_session->dagList->id }}</h2>
                        {{-- <p class="wid-sub-title">(date থেকে date)</p> --}}
                    </div>
                    <div class="col-xs-5">
                        {{-- @if (true)
                            <button type="button" class="btn btn-danger pull-right" data-toggle="modal"
                                data-target="#land_transfer_model_1">
                                হস্তান্তর
                            </button>
                        @else
                            status
                        @endif --}}

                        <!-- Button trigger modal -->
                        <!--{{ url('land_renew_aplication') }}-->
                        {{-- <a href="{{ route('user.land_details', $land_lease->id) }}" class="btn btn-danger pull-right">
                            নবায়ন
                        </a> --}}
                    </div>
                </div>
                <div class="wid-data">
                    <div class="row">
                        <div class="col-xs-6">
                            <ul class="wid-data-list">
                                <li><i class="fa fa-square" aria-hidden="true"></i> জমির পরিমানঃ <span
                                        class="pull-right">{{ $lease_session->dagList->land_amount }} শতাংশ
                                    </span></li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> উপজেলাঃ <span
                                        class="pull-right">{{ $lease_session->dagList->upazila->bn_name }}</span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> মৌজাঃ <span
                                        class="pull-right">{{ $lease_session->dagList->mouza->bn_name }}
                                    </span></li>
                        </div>
                        <div class="col-xs-6">
                            <ul class="wid-data-list">
                                <li><i class="fa fa-square" aria-hidden="true"></i> জে. এল. নং <span
                                        class="pull-right">{{ $lease_session->dagList->mouza->j_l_no }} </span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> খতিয়ানঃ <span
                                        class="pull-right">{{ $lease_session->dagList->khatianNo->bn_name }} </span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> দাগঃ <span
                                        class="pull-right">{{ $lease_session->dagList->bn_name }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container wid-cont">
        <div class="land-widget">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="min-height: 70vh">
                        @if (Session::has('success'))
                            <div class="alert alert-success border-0 bg-success ">
                                <div> {{ Session::get('success') }}</div>
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-success border-0 bg-danger">
                                <div> {{ Session::get('error') }}</div>
                            </div>
                        @endif

                        <div class="card-body p-4">

                            <form method="POST" action="" enctype="multipart/form-data" class="row g-3">
                                @csrf

                                <div class="col-md-6 text-dark col-lg-4">
                                    <div class="form-check form-check-success custom-redio">
                                        <input class="form-check-input radio-btn mt-3" type="radio" value="BANK"
                                            {{ old('payment_option') == 'BANK' ? 'checked' : '' }} name="payment_option"
                                            id="bank_option">
                                        <label class="form-check-label ml-3" for="bank_option">
                                            <img src="{{ asset('assets/images/bank.jpg') }}" class="payment_image"
                                                alt="Bkash" height="50" width="100">
                                            Bank
                                            Payment
                                        </label>
                                    </div>
                                    <div class="form-check form-check-success custom-redio">
                                        <input class="form-check-input radio-btn mt-3" type="radio" value="BKASH"
                                            {{ old('payment_option') == 'BKASH' ? 'checked' : '' }} name="payment_option"
                                            id="bkash_option">
                                        <label class="form-check-label ml-3" for="bkash_option">
                                            <img src="{{ asset('assets/images/bkash.jpeg') }}" alt="Bkash"
                                                class="payment_image" height="50"> bKash
                                            Payment
                                        </label>
                                    </div>
                                    <div class="form-check form-check-success custom-redio">
                                        <input class="form-check-input radio-btn mt-3" type="radio" value="NAGAD"
                                            {{ old('payment_option') == 'BKASH' ? 'checked' : '' }} name="payment_option"
                                            id="nagad_option">
                                        <label class="form-check-label ml-3" for="nagad_option">
                                            <img src="{{ asset('assets/images/nagad.png') }}" alt="Nagad"
                                                class="payment_image" height="50"> Nagad
                                            Payment
                                        </label>
                                    </div>
                                    <div class="form-check form-check-success custom-redio">
                                        <input class="form-check-input radio-btn mt-3" type="radio" value="CASH"
                                            {{ old('payment_option') == 'CASH' ? 'checked' : '' }} name="payment_option"
                                            id="cash_option">
                                        <label class="form-check-label ml-3" for="cash_option">
                                            <img src="{{ asset('assets/images/cash.jpg') }}" alt="Cash"
                                                class="payment_image" height="50">
                                            Cash
                                            Payment
                                        </label>
                                    </div>
                                    @error('payment_option')
                                        <div class="help-block text-danger">{{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg-4">

                                    <table class="table table-border">
                                        <tr>
                                            <th colspan="2" class="py-1"> User Information</th>


                                        </tr>
                                        <tr>
                                            <th class="py-1"> Name</th>
                                            <td class="py-1"> {{ $lease_session->user->name ?? '' }}</td>

                                        </tr>
                                        <tr>
                                            <th class="py-1"> Phone</th>
                                            <td class="py-1"> {{ $lease_session->user->phone ?? '' }}</td>

                                        </tr>
                                        <tr>
                                            <th class="py-1"> Email</th>
                                            <td class="py-1"> {{ $lease_session->user->email ?? '' }}</td>

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
                                                {{ $lease_session->dagList->bn_name }},{{ $lease_session->dagList->upazila->bn_name }},
                                                {{ $lease_session->dagList->unionPourashava->bn_name }}, <br>
                                                {{ $lease_session->dagList->khatianType->bn_name }},
                                                {{ $lease_session->dagList->mouza->bn_name }},
                                                {{ $lease_session->dagList->khatianNo->bn_name }}</th>
                                        </tr>

                                    </table>
                                    <table class="table table-border">
                                        <tr>
                                            <th colspan="2" class="py-1"> Payment Information</th>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Amount</th>
                                            <td class="py-1"> {{ number_format($lease_session->amount, 2) }}
                                                /-Tk</td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Vat</th>
                                            <td class="py-1"> {{ number_format($lease_session->vat, 2) }} /-Tk
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Tax</th>
                                            <td class="py-1"> {{ number_format($lease_session->tax, 2) }}
                                                /-Tk
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Total</th>
                                            <td class="py-1">
                                                {{ number_format($lease_session->total_amount, 2) }} /-Tk</td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Total PAID</th>
                                            <td class="py-1">
                                                {{ number_format($lease_session->paid_amount, 2) }} /-Tk</td>
                                        </tr>
                                        <tr>
                                            <th class="py-1">Total DUE</th>
                                            <td class="py-1">
                                                {{ number_format($lease_session->total_amount - $lease_session->paid_amount, 2) }}
                                                /-Tk</td>
                                        </tr>

                                    </table>

                                </div>
                                <div class="col-md-12">
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-lg-4 col-form-label">Enter Amount <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8 col-lg-8">
                                            {{-- <div class="input-group"> --}}
                                            <input type="number" class="form-control" name="amount"
                                                value="{{ old('amount') }}" required
                                                max="{{ $lease_session->total_amount - $lease_session->paid_amount }}"
                                                placeholder="Enter Amount" step=".01">
                                            {{-- <span class="input-group-append">
                                                        <label class="input-group-text">Taka</label>
                                                    </span> --}}
                                            {{-- </div> --}}
                                            @error('amount')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-1" id="nagad_fee_area">
                                        <label class="col-sm-4 col-lg-4 col-form-label">Nagad Fee</label>
                                        <div class="col-sm-8 col-lg-8">
                                            {{-- <div class="input-group"> --}}
                                            <input type="text" id="nagad_fee" class="form-control" readonly
                                                name="nagad_fee" placeholder="Nagad Fee">
                                            {{-- <span class="input-group-append">
                                                <label class="input-group-text">Taka</label>
                                            </span> --}}
                                            {{-- </div> --}}
                                            @error('nagad_fee')
                                                <div class="help-block text-danger">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="bank_area">
                                        <div class="row mb-1">
                                            <label class="col-sm-4 col-lg-4 col-form-label">ব্যাংকের নাম <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-lg-8">
                                                {{-- <div class="input-group"> --}}
                                                <input type="text" id="nagad_fee" class="form-control"
                                                    value="{{ old('bank_name') }}" name="bank_name"
                                                    placeholder="Bank Name">
                                                {{-- </div> --}}
                                                @error('bank_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-4 col-lg-4 col-form-label">শাখা <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-lg-8">
                                                {{-- <div class="input-group"> --}}
                                                <input type="text" id="branch_name" class="form-control"
                                                    value="{{ old('branch_name') }}" name="branch_name"
                                                    placeholder="Branch Name">
                                                {{-- </div> --}}
                                                @error('branch_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-4 col-lg-4 col-form-label">হিসাব নং <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-lg-8">
                                                {{-- <div class="input-group"> --}}
                                                <input type="text" id="account_no" class="form-control"
                                                    value="{{ old('account_no') }}" name="account_no"
                                                    placeholder="Account Number">
                                                {{-- </div> --}}
                                                @error('account_no')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-4 col-lg-4 col-form-label">জমা রশিদ
                                                নং <span class="text-danger">*</span> </label>
                                            <div class="col-sm-8 col-lg-8">
                                                {{-- <div class="input-group"> --}}
                                                <input type="text" id="pay_order_no" class="form-control"
                                                    value="{{ old('pay_order_no') }}" name="pay_order_no"
                                                    placeholder="Pay Order No">
                                                {{-- </div> --}}
                                                @error('pay_order_no')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="mfs_area">
                                        <div class="row mb-1">
                                            <label class="col-sm-4 col-lg-4 col-form-label">Transaction Mobile
                                                Number <span class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-lg-8">
                                                {{-- <div class="input-group"> --}}
                                                <input type="text" id="transaction_number" class="form-control"
                                                    name="transaction_number" value="{{ old('transaction_number') }}"
                                                    placeholder="Transaction Mobile Number">
                                                {{-- </div> --}}
                                                @error('transaction_number')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-4 col-lg-4 col-form-label">Transaction ID<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-lg-8">
                                                {{-- <div class="input-group"> --}}
                                                <input type="text" id="transaction_id"
                                                    value="{{ old('transaction_id') }}" class="form-control"
                                                    name="transaction_id" placeholder="Transaction ID">
                                                {{-- </div> --}}
                                                @error('transaction_id')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-4 col-lg-4 col-form-label">Reference </label>
                                            <div class="col-sm-8 col-lg-8">
                                                {{-- <div class="input-group"> --}}
                                                <input type="text" id="reference" class="form-control"
                                                    value="{{ old('reference') }}" name="reference"
                                                    placeholder="Reference ">
                                                {{-- </div> --}}
                                                @error('reference')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div id="cash_area">

                                        <div class="row mb-1">
                                            <label class="col-sm-4 col-lg-4 col-form-label">Receipt No <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-sm-8 col-lg-8">
                                                {{-- <div class="input-group"> --}}
                                                <input type="text" id="receipt_no" class="form-control"
                                                    value="{{ old('receipt_no') }}" name="receipt_no"
                                                    placeholder="Receipt no ">
                                                {{-- </div> --}}
                                                @error('receipt_no')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-lg-4 col-form-label">Date <span
                                                class="text-danger">*</span></label>
                                        <div class="col-sm-8 col-lg-8">
                                            {{-- <div class="input-group"> --}}
                                            <input type="date" id="date" class="form-control" required
                                                value="{{ old('date') }}" name="date">
                                            {{-- </div> --}}
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
@endsection

@section('cusjs')
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
@endsection
