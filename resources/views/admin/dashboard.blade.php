@extends('admin.layout.master')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Dashboard</h5>
                        <span>This is the dashboard</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
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

                        <div class="col-xl-12">
                            <div class="card proj-progress-card">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Total Admin</h6>
                                            <h5 class="m-b-30 f-w-700">{{ $total_admin }}
                                            </h5>

                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <h6>Total User</h6>
                                            <h5 class="m-b-30 f-w-700">{{ $total_user }}
                                            </h5>

                                        </div>
                                        {{--   <div class="col-xl-3 col-md-6">
                                            <h6>Total Kendro</h6>
                                            <h5 class="m-b-30 f-w-700">111
                                            </h5>

                                        </div> --}}
                                        {{-- <div class="col-xl-3 col-md-6">
                                            <h6>Ongoing Project</h6>
                                            <h5 class="m-b-30 f-w-700">365<span class="text-c-green m-l-10">+0.35%</span>
                                            </h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-c-yellow" style="width:45%"></div>
                                            </div>
                                        </div> --}}
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
