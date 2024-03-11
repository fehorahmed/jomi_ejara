<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* body {
            font-size: 12px;
        } */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #554f4f;
        }



        thead {
            background-color: #f2f2f2;
        }

        .company-banner {
            background-color: #333;
            color: #fff;
            padding: 20px;

        }

        .text-center {
            text-align: center;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
        }

        .company-details {
            font-size: 14px;
        }

        .m-0 {
            margin: 0px;
        }

        .p-0 {
            padding: 0px;
        }

        .p-2 {
            padding: 8px;
        }

        .p-1 {
            padding: 5px;
        }

        .px-1 {
            padding-right: 2px;
            padding-left: 2px;
        }

        .bg-info {
            background-color: #d1ecf1;
        }

        .pb-1 {
            padding-bottom: 10px;
        }

        .pb-0 {
            padding-bottom: 0px;
        }

        .mb-0 {
            margin-bottom: 0px;
        }


        .font-13 {
            font-size: 13px;
        }

        .inside-table td {
            padding: 8px;
            text-align: left;
            border: 0px solid #554f4f;
        }
    </style>
</head>



<body>
    @if ($setting)
        <div class="company-banner text-center">
            <div class="company-name">{{ $setting->name ?? '' }}</div>
            <div class="company-details">{{ $setting->address ?? '' }}</div>
            <p class="m-0">Mobile:{{ $setting->phone ?? '' }},Tel: +8802-57160767,
                01991 100116</p>
            <p class="m-0">Email : {{ $setting->email ?? '' }}</p>
        </div>
    @endif

    {{-- @if (isset($start_date) || isset($end_date))
        <div class="text-center">
            <h4>Report from {{ isset($start_date) ? $start_date : '' }} to {{ isset($end_date) ? $end_date : '' }}</h4>
        </div>
    @endif --}}

    {{-- <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kendro Name and Location</th>
                <th>Total rooms</th>

            </tr>
        </thead>

    </table> --}}
    @foreach ($datas as $upazila_key => $upazila)
        @php
            $upazila_name = App\Models\Upazila::find($upazila_key);
        @endphp
        <h3 style="text-align: center;"> {{ $upazila_name->bn_name }}</h3>
        @foreach ($upazila as $mouza_key => $mouza)
            @php
                $mouza_name = App\Models\Mouza::find($mouza_key);
            @endphp
            <h4>Mouza : {{ $mouza_name->bn_name }}</h4>
            <table>
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align:center; width: 4%">নং</th>
                        <th colspan="4" style="text-align:center; width: 29%">জমির তফসিল (সিএস)</th>
                        <th colspan="4" style="text-align:center; width: 29%">জমির তফসিল (এসএ)</th>
                        {{-- <th colspan="4" style="text-align:center; width: 22%">জমির তফসিল (আরএস)</th> --}}
                        <th colspan="4" style="text-align:center; width: 29%">জমির তফসিল (বি আর এস)</th>

                        <th rowspan="2" style="text-align:center; width: 9%">মন্তব্য</th>
                    </tr>
                    <tr>
                        <th class="px-1" style="text-align:center;width: 5%">খতিয়ান</th>
                        <th class="px-1" style="text-align:center; width: 5%">দাগ</th>
                        <th class="px-1" style="text-align:center;width: 9%">পরিমান</th>
                        <th class="px-1" style="text-align:center;width: 10%">শ্রেণী</th>
                        <th class="px-1" style="text-align:center;width: 5%">খতিয়ান</th>
                        <th class="px-1" style="text-align:center; width: 5%">দাগ</th>
                        <th class="px-1" style="text-align:center;width: 9%">পরিমান</th>
                        <th class="px-1" style="text-align:center;width: 10%">শ্রেণী</th>
                        {{-- <th class="px-1" style="text-align:center;width: 5%">খতিয়ান</th>
                        <th class="px-1" style="text-align:center; width: 5%">দাগ</th>
                        <th class="px-1" style="text-align:center;width: 6%">পরিমান</th>
                        <th class="px-1" style="text-align:center;width: 6%">শ্রেণী</th> --}}
                        <th class="px-1" style="text-align:center;width: 5%">খতিয়ান</th>
                        <th class="px-1" style="text-align:center; width: 5%">দাগ</th>
                        <th class="px-1" style="text-align:center;width: 9%">পরিমান</th>
                        <th class="px-1" style="text-align:center;width: 10%">শ্রেণী</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($mouza as $dag)
                        <tr>
                            <td class="px-1">{{ $loop->iteration }}</td>
                            <td class="px-1">{{ $dag['cs_khotian_no'] }}</td>
                            <td class="px-1">{{ $dag['cs_dag_no'] }}</td>
                            <td class="px-1">{{ $dag['cs_land_amount'] }} @if ($dag['cs_land_amount_type'] == 1)
                                    Akor
                                @elseif ($dag['cs_land_amount_type'] == 2)
                                    Satak
                                @else
                                @endif
                            </td>
                            <td class="px-1">{{ $dag['cs_land_condition'] }}</td>
                            <td class="px-1">{{ $dag['sa_khotian_no'] }}</td>
                            <td class="px-1">{{ $dag['sa_dag_no'] }}</td>
                            <td class="px-1">{{ $dag['sa_land_amount'] }} @if ($dag['sa_land_amount_type'] == 1)
                                    Akor
                                @elseif ($dag['sa_land_amount_type'] == 2)
                                    Satak
                                @else
                                @endif
                            </td>
                            <td class="px-1">{{ $dag['sa_land_condition'] }}</td>
                            {{-- <td class="px-1">{{ $dag['rs_khotian_no'] }}</td>
                            <td class="px-1">{{ $dag['rs_dag_no'] }}</td>
                            <td class="px-1">{{ $dag['rs_land_amount'] }} @if ($dag['rs_land_amount_type'] == 1)
                                    Akor
                                @elseif ($dag['rs_land_amount_type'] == 2)
                                    Satak
                                @else
                                @endif
                            </td>
                            <td class="px-1">{{ $dag['rs_land_condition'] }}</td> --}}
                            <td class="px-1">{{ $dag['brs_khotian_no'] }}</td>
                            <td class="px-1">{{ $dag['brs_dag_no'] }}</td>
                            <td class="px-1">{{ $dag['brs_land_amount'] }} @if ($dag['brs_land_amount_type'] == 1)
                                    Akor
                                @elseif ($dag['brs_land_amount_type'] == 2)
                                    Satak
                                @else
                                @endif
                            </td>
                            <td class="px-1">{{ $dag['brs_land_condition'] }}</td>
                            <td class="px-1"></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <br>
        @endforeach
    @endforeach


</body>

</html>
