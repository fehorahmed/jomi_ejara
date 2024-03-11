@extends('admin.layout.master')
@section('title', 'Kendro Report')
@push('styles')
    <style>
        /* table {
                                                                            width: 100%;
                                                                            border-collapse: collapse;
                                                                        }

                                                                        th,
                                                                        td {
                                                                            padding: 8px;
                                                                            text-align: left;
                                                                            border: 1px solid #554f4f;
                                                                        } */

        td,
        th {
            white-space: normal;
        }

        /* thead {
                                                                            background-color: #f2f2f2;
                                                                        } */
    </style>
@endpush
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Kendro Report</h5>
                        <span>Here is the Report of kendros.</span>
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
                                                    <input type="text" name="search" value="{{ request()->search }}"
                                                        placeholder="Search by name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="division" id="division" class="form-control fill">
                                                        <option value="">Select Division</option>
                                                        @foreach ($divisions as $division)
                                                            <option
                                                                {{ request()->division == $division->id ? 'selected' : '' }}
                                                                value="{{ $division->id }}">
                                                                {{ $division->bn_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="district" id="district" class="form-control fill">
                                                        <option value="">Select District</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="upazila" id="upazila" class="form-control fill">
                                                        <option value="">Select upazila</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="union_pourashava" id="union_pourashava"
                                                        class="form-control fill">
                                                        <option value="">Select Union/Pourashava</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="ward" id="ward" class="form-control fill">
                                                        <option value="">Select Ward</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select name="village" id="village" class="form-control fill">
                                                        <option value="">Select Village</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-1">
                                                <div><button class="btn btn-primary"><i class="fa fa-search "></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div><button type="submit" name="submit" value="Download"
                                                        class="btn btn-primary"><i class="fa fa-download"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <table class="table table-bordered border-primary">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="text-align:center; width: 3%">ক্রমিক</th>
                                                <th rowspan="2" style="text-align:center; width: 15%">ভোটকেন্দ্রের
                                                    নাম ও অবস্থান</th>
                                                <th rowspan="2" style="text-align:center; width: 5%">ভোট কক্ষের
                                                    সংখ্যা</th>
                                                <th colspan="3" style="text-align:center; width: 47%">যে এলাকার
                                                    ভোটারগণ এই কেন্দ্রে ভোট দিবেন (ভোটার
                                                    এলাকার নাম)</th>
                                                <th colspan="3" style="text-align:center; width: 25%">প্রতি কেন্দ্রের
                                                    জন্য মোট ভোটার সংখ্যা</th>

                                                <th rowspan="2" style="text-align:center; width: 5%">মন্তব্য</th>

                                            </tr>
                                            <tr>
                                                <th style="text-align:center; width: 16%">পল্লী অঞ্চলের ক্ষেত্রে গ্রামের
                                                    নাম</th>
                                                <th style="text-align:center; width: 16%">শহর অঞ্চলের ক্ষেত্রে ওয়ার্ড
                                                    <br>
                                                    নং/মহল্লা/রাস্তার নাম
                                                </th>
                                                <th style="text-align:center; width: 15%">যে সকল কেন্দ্রে ভোটার এলাকা

                                                    বিভক্ত হইয়াছে সে সকল ক্ষেত্রে
                                                    ভোটারদের ক্রমিক নম্বর
                                                </th>
                                                <th style="text-align:center; width: 8%">পুরুষ</th>
                                                <th style="text-align:center; width: 8%">মহিলা</th>
                                                <th style="text-align:center; width: 9%">মোট</th>


                                            </tr>
                                        </thead>
                                    </table>
                                    @foreach ($datas as $items)
                                        <h4 class="m-0 text-center">উপজেলা : {{ $items->first()[0]->upazila->bn_name }}
                                        </h4>
                                        @foreach ($items as $unions)
                                            <h4 class="p-1 m-0 text-center">
                                                @if ($unions->first()->union_pourashava->is_pourashava == 1)
                                                    পৌরসভা :
                                                @else
                                                    ইউনিয়ন :
                                                @endif
                                                {{ $unions->first()->union_pourashava->bn_name }}
                                            </h4>
                                            <table class="table table-bordered border-primary">

                                                <tbody>
                                                    @foreach ($unions as $data)
                                                        <tr>
                                                            <td style="text-align:center; width: 3%">
                                                                {{ $loop->iteration }}</td>
                                                            <td style="width: 15%">
                                                                <span class="font-13">
                                                                    <strong>কেন্দ্র :
                                                                    </strong>{{ $data->bn_name ?? '' }} <br>
                                                                    <strong>গ্রাম :
                                                                    </strong>{{ $data->village->bn_name ?? '' }}<br>
                                                                </span>
                                                            </td>

                                                            <td style="text-align:center; width: 5%">
                                                                {{ $data->room }}</td>
                                                            <td style="width: 16%">
                                                                @if ($unions->first()->union_pourashava->is_pourashava != 1)
                                                                    @foreach ($data->wards as $ward)
                                                                        {{ $ward->ward->bn_name }} <br>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td style="width: 16%">
                                                                @if ($unions->first()->union_pourashava->is_pourashava == 1)
                                                                    @foreach ($data->wards as $ward)
                                                                        {{ $ward->ward->bn_name }} <br>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td style="text-align:center; width: 15%"></td>
                                                            <td style="text-align:center; width: 8%">
                                                                {{ $data->male }}</td>
                                                            <td style="text-align:center; width: 8%">
                                                                {{ $data->female }}</td>
                                                            <td style="text-align:center; width: 9%">
                                                                {{ $data->male + $data->female }}</td>
                                                            <td style="text-align:center; width: 5%"></td>

                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        @endforeach
                                    @endforeach
                                    {{ $datas->links('pagination::bootstrap-5') }}

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
            var subDistrictSelected = '{{ request()->upazila }}';
            $('#district').on('change', function() {
                var district_id = $(this).val();
                $('#upazila').html('<option value="">Select upazila</option>');
                if (district_id != '' && district_id != null) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('get.sub_district') }}',
                        data: {
                            district_id: district_id
                        }
                    }).done(function(data) {
                        $.each(data, function(index, item) {
                            if (subDistrictSelected == item.id) {
                                $('#upazila').append('<option selected value="' + item
                                    .id +
                                    '" selected>' + item
                                    .bn_name + '</option>');
                            } else {
                                $('#upazila').append('<option value="' + item.id +
                                    '">' + item
                                    .bn_name + '</option>');
                            }
                        });
                        $('#upazila').trigger('change');
                    });
                }
            });
            $('#district').trigger('change');
            var unionSelected = '{{ request()->union_pourashava }}';
            $('#upazila').on('change', function() {
                var upazila_id = $(this).val();
                $('#union_pourashava').html('<option value="">Select Union/Pourashava</option>');
                if (upazila_id != '' && upazila_id != null) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('get.unions') }}',
                        data: {
                            upazila_id: upazila_id
                        }
                    }).done(function(data) {
                        $.each(data, function(index, item) {
                            if (unionSelected == item.id) {
                                $('#union_pourashava').append('<option selected value="' +
                                    item
                                    .id +
                                    '" selected>' + item
                                    .bn_name + '</option>');
                            } else {
                                $('#union_pourashava').append('<option value="' + item.id +
                                    '">' + item
                                    .bn_name + '</option>');
                            }
                        });
                        $('#union_pourashava').trigger('change');
                    });
                }
            });
            $('#upazila').trigger('change');
            var wardSelected = '{{ request()->ward }}';
            $('#union_pourashava').on('change', function() {
                var union_pourashava_id = $(this).val();
                $('#ward').html('<option value="">Select Ward</option>');
                if (union_pourashava_id != '' && union_pourashava_id != null) {
                    $.ajax({
                        method: "GET",
                        url: '{{ route('get.wards') }}',
                        data: {
                            union_pourashava_id: union_pourashava_id
                        }
                    }).done(function(data) {
                        $.each(data, function(index, item) {
                            if (wardSelected == item.id) {
                                $('#ward').append('<option selected value="' +
                                    item
                                    .id +
                                    '" selected>' + item
                                    .bn_name + '</option>');
                            } else {
                                $('#ward').append('<option value="' + item.id +
                                    '">' + item
                                    .bn_name + '</option>');
                            }
                        });
                        $('#ward').trigger('change');
                    });
                }
            });
            $('#union_pourashava').trigger('change');
        });
    </script>
@endpush
