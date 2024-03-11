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
                <th rowspan="2" style="text-align:center; width: 3%">নং</th>
                <th rowspan="2" style="text-align:center; width: 7%">জমির পরিচিতি</th>
                <th rowspan="2" style="text-align:center; width: 5%">মৌজা</th>
                <th rowspan="2" style="text-align:center; width: 5%">জেএল নং</th>

                <th colspan="4" style="text-align:center; width: 20%">জমির তফসিল (সিএস)</th>
                <th colspan="4" style="text-align:center; width: 20%">জমির তফসিল (এসএ)</th>
                <th colspan="4" style="text-align:center; width: 20%">জমির তফসিল (আরএস)</th>

                <th rowspan="2" style="text-align:center; width: 5%">দখল</th>
                <th rowspan="2" style="text-align:center; width: 5%">মামলা আছে কিনা</th>
                <th rowspan="2" style="text-align:center; width: 5%">মামলার বর্তমান অবস্থা</th>
                <th rowspan="2" style="text-align:center; width: 5%">মন্তব্য</th>

            </tr>
            <tr>
                <th style="text-align:center;">খতিয়ান</th>
                <th style="text-align:center; ">দাগ</th>
                <th style="text-align:center;">পরিমান</th>
                <th style="text-align:center;">শ্রেণী</th>
                <th style="text-align:center;">খতিয়ান</th>
                <th style="text-align:center; ">দাগ</th>
                <th style="text-align:center;">পরিমান</th>
                <th style="text-align:center;">শ্রেণী</th>
                <th style="text-align:center;">খতিয়ান</th>
                <th style="text-align:center; ">দাগ</th>
                <th style="text-align:center;">পরিমান</th>
                <th style="text-align:center;">শ্রেণী</th>

            </tr>
            <tr>
                <th style="text-align:center;">১</th>
                <th style="text-align:center; ">২</th>
                <th style="text-align:center;">৩</th>
                <th style="text-align:center;">৪</th>
                <th style="text-align:center;">৫.১</th>
                <th style="text-align:center;">৫.২</th>
                <th style="text-align:center;">৫.৩</th>
                <th style="text-align:center;">৫.৪</th>
                <th style="text-align:center;">৬.১</th>
                <th style="text-align:center;">৬.২</th>
                <th style="text-align:center;">৬.৩</th>
                <th style="text-align:center;">৬.৪</th>
                <th style="text-align:center; ">৭.১</th>
                <th style="text-align:center; ">৭.২</th>
                <th style="text-align:center; ">৭.৩</th>
                <th style="text-align:center; ">৭.৪</th>
                <th style="text-align:center;">৮</th>
                <th style="text-align:center;">৯</th>
                <th style="text-align:center;">১০</th>
                <th style="text-align:center;">১১</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($datas as $items)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $items[0]->mouza->bn_name }}</td>
                    <td>{{ $items[0]->mouza->j_l_no }}</td>
                    <td>
                        @foreach ($items as $data)
                            {{ $data->khatianNo->bn_name }}
                            <hr>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($items as $data)
                            {{ $data->bn_name }}
                            <hr>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($items as $data)
                            {{ $data->land_amount }}
                            <hr>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($items as $data)
                            {{ $data->land_condition }}
                            <hr>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
