@extends('admin.layout.master')
@section('title', 'Dag No Details')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Dag No Details</h5>
                        <span>Here is the Dag No Details .</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a class="btn btn-primary" href="{{ route('admin.dag-list.index') }}">Dag No
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
                                    <h5 class="text-white"> Dag No Details</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <table class="table table-borderless">
                                            <div class="col-md-6">
                                                <tr class="pb-0">
                                                    <th class="py-2">Dag No</th>
                                                    <td class="py-2">: {{ $dag->bn_name }}</td>
                                                </tr>
                                                <tr class="pb-0">
                                                    <th class="py-2">Khatian No</th>
                                                    <td class="py-2">: {{ $dag->khatianNo->bn_name }}</td>
                                                </tr>
                                                <tr class="pb-0">
                                                    <th class="py-2">Mouza No</th>
                                                    <td class="py-2">: {{ $dag->mouza->bn_name }}</td>
                                                </tr>
                                                <tr class="pb-0">
                                                    <th class="py-2">Khatian Type</th>
                                                    <td class="py-2">: {{ $dag->khatianType->bn_name }}</td>
                                                </tr>
                                                <tr class="pb-0">
                                                    <th class="py-2">Union/Pourashava</th>
                                                    <td class="py-2">: {{ $dag->unionPourashava->bn_name }}</td>
                                                </tr>
                                                <tr class="pb-0">
                                                    <th class="py-2">Upazila</th>
                                                    <td class="py-2">: {{ $dag->upazila->bn_name }}</td>
                                                </tr>
                                                <tr class="pb-0">
                                                    <th class="py-2">Total Land</th>
                                                    <td class="py-2">: {{ $dag->land_amount }}
                                                        {{ $dag->land_amount_type == 1 ? 'Akor' : 'Satak' }}</td>
                                                </tr>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
