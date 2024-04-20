@extends('admin.layout.master')
@section('title', 'Global Config')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Global Config</h5>
                        <span>Here is the Global Config update form.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h5 class="text-white"> Ejara Rate Create Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.global-config.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="lease_duration" class="col-12 col-md-3 col-form-label">Lease
                                                Duration</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="lease_duration"
                                                    value="{{ Helper::get_config('lease_duration') }}" id="lease_duration"
                                                    class="form-control" placeholder="Lease Duration">
                                                @error('lease_duration')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="due_fine" class="col-12 col-md-3 col-form-label">Due Fine </label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="due_fine"
                                                    value="{{ Helper::get_config('due_fine') }}" id="due_fine"
                                                    class="form-control" placeholder="Due Fine">
                                                @error('due_fine')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="new_form_fee" class="col-12 col-md-3 col-form-label">New Form
                                                Fee</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="new_form_fee"
                                                    value="{{ Helper::get_config('new_form_fee') }}" id="new_form_fee"
                                                    class="form-control" placeholder="New Form Fee">
                                                @error('new_form_fee')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="renew_form_fee" class="col-12 col-md-3 col-form-label">Renew Form
                                                Fee</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="renew_form_fee"
                                                    value="{{ Helper::get_config('renew_form_fee') }}" id="renew_form_fee"
                                                    class="form-control" placeholder="Renew Form Fee">
                                                @error('renew_form_fee')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="vat" class="col-12 col-md-3 col-form-label">Vat (%)</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="vat" value="{{ Helper::get_config('vat') }}"
                                                    id="vat" class="form-control" placeholder="Vat">
                                                @error('vat')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="tax" class="col-12 col-md-3 col-form-label">Tax (%)</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="tax"
                                                    value="{{ Helper::get_config('tax') }}" id="tax"
                                                    class="form-control" placeholder="Tax">
                                                @error('tax')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bank_charge" class="col-12 col-md-3 col-form-label">Bank Charge
                                                (%)</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="bank_charge"
                                                    value="{{ Helper::get_config('bank_charge') }}" id="bank_charge"
                                                    class="form-control" placeholder="Bank Charge">
                                                @error('bank_charge')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="bkash_charge" class="col-12 col-md-3 col-form-label">Bkash Charge
                                                (%)</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="bkash_charge"
                                                    value="{{ Helper::get_config('bkash_charge') }}" id="bkash_charge"
                                                    class="form-control" placeholder="Bkash Charge">
                                                @error('bkash_charge')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="nagad_charge" class="col-12 col-md-3 col-form-label">Nagad Charge
                                                (%)</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="nagad_charge"
                                                    value="{{ Helper::get_config('nagad_charge') }}" id="nagad_charge"
                                                    class="form-control" placeholder="Nagad Charge">
                                                @error('nagad_charge')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center mb-3">

                                            <input type="submit" class="btn btn-primary  " value="Update Global Config">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
