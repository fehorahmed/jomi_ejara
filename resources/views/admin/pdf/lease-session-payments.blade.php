<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Specify the font file path */
        /* @font-face {
            font-family: 'BanglaFont';
            src: url('{{ public_path('assets/fonts/NotoSansBengali.ttf') }}') format('truetype');
        }

        body {
            font-family: 'BanglaFont', Arial, sans-serif;
        } */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        thead {
            background-color: #f2f2f2;
        }

        .company-banner {
            background-color: #dfcbcb;
            color: #000000;
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

        .bg-info {
            background-color: #d1ecf1;
        }

        .font-13 {
            font-size: 13px;
        }
    </style>
</head>

<body>
    @if ($setting)
        <div class="company-banner text-center">
            <div class="company-name">{{ $setting->name ?? '' }}</div>
            <div class="company-details">{{ $setting->address ?? '' }}</div>
            <p class="m-0">Mobile:{{ $setting->phone ?? '' }}</p>
            <p class="m-0">Email : {{ $setting->email ?? '' }}</p>
        </div>
    @endif
    <table>
        <tr>
            <td>SL</td>
            <td>Dag No</td>
            <td>Payment Info</td>
            <td>Amount</td>
            <td>Status</td>
        </tr>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($transaction->land_lease_session_id)
                        <p>Lease Session Payment</p>
                        {{ $transaction->landLeaseSession->dagList->bn_name }},{{ $transaction->landLeaseSession->dagList->upazila->bn_name }},
                        <br>
                        {{ $transaction->landLeaseSession->dagList->unionPourashava->bn_name }},
                        {{ $transaction->landLeaseSession->dagList->khatianType->bn_name }},
                        <br>
                        {{ $transaction->landLeaseSession->dagList->mouza->bn_name }},
                        {{ $transaction->landLeaseSession->dagList->khatianNo->bn_name }}
                    @endif
                    @if ($transaction->land_lease_application_id)
                        <p>Lease Application Payment</p>
                        {{ $transaction->landLeaseApplication->dagList->bn_name }},{{ $transaction->landLeaseApplication->dagList->upazila->bn_name }},
                        {{ $transaction->landLeaseApplication->dagList->unionPourashava->bn_name }},
                        {{ $transaction->landLeaseApplication->dagList->khatianType->bn_name }},
                        {{ $transaction->landLeaseApplication->dagList->mouza->bn_name }},
                        {{ $transaction->landLeaseApplication->dagList->khatianNo->bn_name }}
                    @endif

                </td>
                <td>
                    Method : {{ $transaction->payment_method }} <br>
                    @if ($transaction->payment_method == 'CASH')
                        Receipt No : {{ $transaction->receipt_no }} <br>
                    @endif
                    @if ($transaction->payment_method == 'BANK')
                        Bank : {{ $transaction->bank ?? '' }} <br>
                        Branch : {{ $transaction->branch ?? '' }} <br>
                        Account No : {{ $transaction->account_no ?? '' }} <br>
                        Payorder : {{ $transaction->payorder ?? '' }} <br>
                    @endif
                    @if ($transaction->payment_method == 'BKASH' || $transaction->payment_method == 'NAGAD')
                        Transaction Number : {{ $transaction->transaction_number ?? '' }}
                        <br>
                        Transaction ID : {{ $transaction->transaction_id ?? '' }} <br>
                        Reference : {{ $transaction->reference ?? '' }} <br>
                    @endif

                    Date : {{ $transaction->created_at->format('d-m-Y') }}
                </td>
                <td>
                    {{ number_format($transaction->amount, 2) }}
                </td>
                <td>{{ $transaction->status }}</td>
            </tr>
        @endforeach

    </table>
</body>

</html>
