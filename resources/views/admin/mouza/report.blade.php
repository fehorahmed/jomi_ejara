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
                <th>SL</th>
                <th>Name</th>
                <th>JL No</th>
                <th>Upazila</th>
                <th>Union/Pourashava</th>
                <th>Khatian Type</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->bn_name }}</td>
                    <td>{{ $data->j_l_no }}</td>
                    <td>{{ $data->upazila->bn_name }}</td>
                    <td>{{ $data->unionPourashava->bn_name }}</td>
                    <td>{{ $data->khatianType->bn_name }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <br>



</body>

</html>
