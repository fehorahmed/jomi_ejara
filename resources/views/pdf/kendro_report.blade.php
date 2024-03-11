<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
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

        .p-2 {
            padding: 8px;
        }

        .p-1 {
            padding: 5px;
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
    <table>
        <thead>
            <tr>
                <th rowspan="2" style="text-align:center; width: 5%">ক্রমিক</th>
                <th rowspan="2" style="text-align:center; width: 15%">ভোটকেন্দ্রের নাম ও অবস্থান</th>
                <th rowspan="2" style="text-align:center; width: 8%">ভোট কক্ষের সংখ্যা</th>
                <th colspan="3" style="text-align:center; width: 44%">যে এলাকার ভোটারগণ এই কেন্দ্রে ভোট দিবেন (ভোটার
                    এলাকার নাম)</th>
                <th colspan="3" style="text-align:center; width: 23%">প্রতি কেন্দ্রের জন্য মোট ভোটার সংখ্যা</th>

                <th rowspan="2" style="text-align:center; width: 5%">মন্তব্য</th>

            </tr>
            <tr>
                <th style="text-align:center; width: 16%">পল্লী অঞ্চলের ক্ষেত্রে গ্রামের নাম</th>
                <th style="text-align:center; width: 16%">শহর অঞ্চলের ক্ষেত্রে ওয়ার্ড নং/মহল্লা/রাস্তার নাম</th>
                <th style="text-align:center; width: 15%">যে সকল কেন্দ্রে ভোটার এলাকা বিভক্ত হইয়াছে সে সকল ক্ষেত্রে
                    ভোটারদের ক্রমিক নম্বর
                </th>
                <th style="text-align:center; width: 8%">পুরুষ</th>
                <th style="text-align:center; width: 8%">মহিলা</th>
                <th style="text-align:center; width: 9%">মোট</th>


            </tr>
        </thead>
    </table>
    @foreach ($datas as $items)
        <h3 class="m-0 text-center">উপজেলা : {{ $items->first()[0]->upazila->bn_name }}</h3>
        @foreach ($items as $unions)
            <h3 class="p-1 m-0 text-center">
                @if ($unions->first()->union_pourashava->is_pourashava == 1)
                    পৌরসভা :
                @else
                    ইউনিয়ন :
                @endif
                {{ $unions->first()->union_pourashava->bn_name }}
            </h3>
            <table>

                <tbody>
                    @foreach ($unions as $data)
                        <tr>
                            <td style="text-align:center; width: 5%">{{ $loop->iteration }}</td>
                            <td style="width: 15%">
                                <span class="font-13">
                                    <strong>কেন্দ্র : </strong>{{ $data->bn_name ?? '' }} <br>
                                    <strong>গ্রাম : </strong>{{ $data->village->bn_name ?? '' }}<br>
                                </span>
                            </td>

                            <td style="text-align:center; width: 8%">{{ $data->room }}</td>
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
</body>

</html>
