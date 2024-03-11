@extends('admin.layout.master')
@section('title', 'Khatian Type Edit')
@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Khatian Type Update</h5>
                        <span>Here is the Khatian Type update form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.khatian-type.index') }}">Khatian Type List</a>
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
                                    <h5 class="text-white"> Khatian Type Update Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.khatian-type.update', $khatianType->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="bn_name" class="col-12 col-md-3 col-form-label">Khatian Type
                                                Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="bn_name" name="bn_name"
                                                    value="{{ old('bn_name', $khatianType->bn_name) }}" id="bn_name"
                                                    class="form-control" placeholder="Khatian Type bangla name">
                                                @error('bn_name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.khatian-type.index') }}"
                                                class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Update Khatian Type">
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
    <script></script>
@endpush
