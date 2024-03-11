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
                <th style="text-align:center; width: 6%">ক্রমিক</th>
                <th style="text-align:center; width: 34%">Details</th>
                <th style="text-align:center; width: 20%">Political Background</th>
                <th style="text-align:center; width: 20%">Social Link</th>
                <th style="text-align:center; width: 20%">Location</th>
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
                            <td style="text-align:center; width: 6%">{{ $loop->iteration }}</td>
                            <td style="width: 34%">
                                <span class="font-13">
                                    <strong>Name : </strong>{{ $data->name ?? '' }} <br>
                                    <strong>Father Name : </strong>{{ $data->father_name ?? '' }} <br>
                                    <strong>Phone : </strong>{{ $data->phone ?? '' }}<br>
                                    <strong>profession : </strong>{{ $data->profession ?? '' }}<br>
                                </span>
                            </td>

                            <td style="text-align:center; width: 20%">{{ $data->politicalParty->name }}</td>
                            <td style="text-align:center; width: 20%">{{ $data->social_link }}</td>
                            <td style=" width: 20%">
                                <strong>Ward : </strong>{{ $data->ward->bn_name ?? '' }} <br>
                                <strong>Village : </strong>{{ $data->village->bn_name ?? '' }}
                            </td>


                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endforeach
    @endforeach
</body>

</html>
