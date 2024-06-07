<!DOCTYPE html>
<html lang="ban">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- links of CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/money_deposit/css/style.css') }}"> --}}

    <style>
        #printPageButton {
            border: none;
            margin: 15px;
            cursor: pointer;
            padding: 12px 35px;
            border-radius: 5px;
            color: var(--blackColor);
            background-color: #eeeeee;
            transition: 0.5s ease-in-out;
            box-shadow: 0px 0px 5px #eeeeee;
            font-size: 14px;
            font-weight: 500;
        }

        #printPageButton:hover {
            background-color: #252525;
            color: #ffffff;
        }
        table tr td{
            text-decoration: none;
        }

        @media print {
            #printPageButton {
                display: none;
            }
        }
    </style>
    <title>Invoice receipt</title>
</head>

<body>

    <button id="printPageButton" onClick="window.print();">Print</button>

    <div class="container">
        {{--    <h4 class="">বাংলাদেশ ফরম নং ২৭০</h4> --}}
    </div>

    <!-- Form Heading Area Start -->
    <div class="form-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/download.png') }}" alt="logo" height="90" width="90">
                </div>
                <div class="col-md-4">
                    <h3 class="text-center">{{ $setting->name ?? '' }}</h3>
                    <h5 class="text-center">Money Receipt</h5>
                </div>
                <div class="col-md-4"></div>
            </div>

        </div>
    </div>
    <!-- Form Heading Area End -->

    <!-- Form Details Area Start -->
    <div class="form-details">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <h5><u>Created Date : </u></h5>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    Dag No
                                </td>
                                <td>User Details</td>
                                <td>Payment Detsils</td>
                                <td>Amount</td>
                                <td>Status</td>
                            </tr>
                            <tr>
                                <td>
                                    Dag No : {{$data->landLeaseSession->dagList->bn_name}} <br>
                                </td>

                                <td>
                                    Name : {{$data->landLeaseSession->user->name}} <br>
                                    Phone : {{$data->landLeaseSession->user->phone}}
                                </td>
                                <td>
                                   Method : {{$data->payment_method}} <br>
                                    @if ($data->payment_method == 'BKASH')
                                    Transaction Number : {{$data->transaction_number}}<br>
                                    Transaction ID : {{$data->transaction_id}}<br>
                                    Reference : {{$data->reference??''}}<br>
                                    @endif
                                </td>
                                <td>
                                    {{$data->amount}}

                                </td>

                                <td>
                                    {{$data->status}}
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-6 col-sm-6"></div>
                <div class="col-md-6 col-sm-6">

                    <p class="text-right">

                    </p>
                </div>
            </div>


        </div>
    </div>
    <!-- Form Details Area End -->



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
