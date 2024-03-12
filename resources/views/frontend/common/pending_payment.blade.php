@extends('frontend.layouts.app')

@section('content')
    <div class="container user_panel">
        @include('frontend.common.frontend_user_menu')
        @if (Route::has('login'))
            <?php $user_own = Auth::user(); ?>


            <div class="row">

                <div class="col-md-12">

                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr style="background: #9E5BBA !important; color: #FFF;">
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Digi User</th>
                            <th>Service</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Transaction ID</th>
                            <th>Action</th>
                        </tr>

                        @foreach($mine_income_statement as $income)


                            <tr>

                                <td>{{ $income->id }}</td>
                                {{--<td>--}}
                                {{--@php--}}
                                {{--$user = \App\User::where(['id' => $income->user_id])->first();--}}
                                {{--@endphp--}}

                                {{--{{ $user->name }}--}}
                                {{--</td>--}}
                                <td>{{ $income->user->name }}</td>
                                {{--<td>--}}
                                {{--@php--}}
                                {{--$digi_user = \App\User::where(['id' => $income->digi_center_user_id])->first();--}}
                                {{--@endphp--}}

                                {{--{{ $digi_user->name }}--}}

                                {{--</td>--}}
                                <td>{{ (isset($income->digi_user->name))?$income->digi_user->name :'N/A' }}</td>
                                {{--<td>--}}
                                {{--@php--}}
                                {{--$service = \App\Service::where(['id' => $income->service_id])->first();--}}
                                {{--@endphp--}}

                                {{--{{ $service->name }}--}}
                                {{--</td>--}}
                                <td>{{ $income->service->name }}</td>
                                <td>{{ $income->payment_method }}</td>
                                <td>{{ $income->amount }}</td>
                                <td>{{ $income->transaction_no }}</td>
                                <td>
                                    <a href="{{ url('/payment_aprove/'.$income->id) }}" class="btn btn-success btn-sm">Aprove</a>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        {{-- {{ $mine_income_statement->links('component.paginator', ['object' => $mine_income_statement]) }} --}}
                        {{ $mine_income_statement->appends(request()->query())->links('component.paginator', ['object' => $mine_income_statement]) }}
                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection
@section('cusjs')
    <style type="text/css">
        .custom_icons img {
            width: 40px !important;
            height: 40px !important;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #FFFFFF;
            min-width: 1000px;
            box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 1);
            z-index: 99999;
            right: 0;
            padding: 10px;
            border: 1px solid #DDDDDD;
        }
    </style>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $.noConflict();
        });

        function flip(id) {
            jQuery(".panel_" + id).toggle();
        }

        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$value},
                success:function(data){
                    $('tbody').html(data);
                }
            });
        })
    </script>
@endsection
