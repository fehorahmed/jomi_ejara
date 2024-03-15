@extends('admin.layout.master')
@section('title', 'Ejara Rate Edit')
@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Ejara Rate Update</h5>
                        <span>Here is Ejara Rate update form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.ejara-rate.index') }}">Ejara Rate List</a>
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
                        <div class="col-md-8 m-auto">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h5 class="text-white"> Ejara Rate Update Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.ejara-rate.update', $ejara_rate->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="bn_name" class="col-12 col-md-3 col-form-label">Ejara Rate
                                                Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="bn_name" name="bn_name"
                                                    value="{{ old('bn_name', $ejara_rate->bn_name) }}" id="bn_name"
                                                    class="form-control" placeholder="Upazila bangla name">
                                                @error('bn_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="amount" class="col-12 col-md-3 col-form-label">Amount </label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="amount" value="{{ old('amount', $ejara_rate->amount) }}"
                                                    id="amount" class="form-control" placeholder="Enter Amount">
                                                @error('amount')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.ejara-rate.index') }}" class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Update Ejara Rate">
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
