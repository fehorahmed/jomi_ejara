@extends('admin.layout.master')
@section('title', 'Land Lease Order Create')

@push('styles')
    <link rel="stylesheet" href="{{ asset('') }}files/bower_components/select2/css/select2.min.css" />
@endpush

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Land Lease Order Create</h5>
                        <span>Here is the Land Lease Order create form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.land-lease.index') }}">Land Lease Order
                                List</a>
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
                                    <h5 class="text-white"> Land Lease Order Create Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.land-lease.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="dag_no" class="col-12 col-md-3 col-form-label">Select Dag
                                                No</label>
                                            <div class="col-12 col-md-9">

                                                <select name="dag_no" class="js-example-basic-single col-sm-12"
                                                    id="dag_no">
                                                    <option value="">Select one</option>
                                                    @foreach ($dags as $dag)
                                                        <option value="{{ old('dag_no', $dag->id) }}"
                                                            {{ old('dag_no') == $dag->id ? 'selected' : '' }}>
                                                            {{ $dag->bn_name }},
                                                            {{ $dag->upazila->bn_name }},
                                                            {{ $dag->unionPourashava->bn_name }},
                                                            {{ $dag->khatianType->bn_name }},
                                                            {{ $dag->mouza->bn_name }},
                                                            {{ $dag->khatianNo->bn_name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('dag_no')
                                                    <div class="help-block text-danger mt-3">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        {{-- <div class="row mb-3">
                                            <label for="publish_date" class="col-12 col-md-3 col-form-label">Publish Date
                                            </label>
                                            <div class="col-12 col-md-9">
                                                <input type="date" name="publish_date" value="{{ old('publish_date') }}"
                                                    id="publish_date" class="form-control">
                                                @error('publish_date')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div> --}}
                                        <div class="row mb-3">
                                            <label for="application_start_date"
                                                class="col-12 col-md-3 col-form-label">Application Start
                                                Date
                                            </label>
                                            <div class="col-12 col-md-9">
                                                <input type="date" name="application_start_date"
                                                    value="{{ old('application_start_date') }}" id="application_start_date"
                                                    class="form-control">
                                                @error('application_start_date')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="application_end_date"
                                                class="col-12 col-md-3 col-form-label">Application End
                                                Date
                                            </label>
                                            <div class="col-12 col-md-9">
                                                <input type="date" name="application_end_date"
                                                    value="{{ old('application_end_date') }}" id="application_end_date"
                                                    class="form-control">
                                                @error('application_end_date')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="status" class="col-12 col-md-3 col-form-label">Status
                                            </label>
                                            <div class="col-12 col-md-9">
                                                <input type="radio" name="status" id="PUBLISHED"
                                                    {{ old('status') == 'PUBLISHED' ? 'checked' : '' }} value="PUBLISHED"
                                                    class="form-radio"> <label for="PUBLISHED">
                                                    PUBLISHED</label>
                                                {{-- <input type="radio" name="status" id="satak"
                                                    {{ old('status') == 2 ? 'checked' : '' }} value="1"
                                                    class="form-radio"> <label for="satak"> শতাংশ</label> --}}
                                                @error('status')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.land-lease.index') }}" class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Add Lease Order">
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
@push('scripts')
    <script type="text/javascript" src="{{ asset('') }}files/bower_components/select2/js/select2.full.min.js"></script>
    {{--
    <script type="text/javascript" src="../files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js">
    </script>
    <script type="text/javascript" src="../files/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="../files/assets/js/jquery.quicksearch.js"></script> --}}

    <script type="text/javascript" src="{{ asset('') }}files/assets/pages/advance-elements/select2-custom.js"></script>
@endpush
