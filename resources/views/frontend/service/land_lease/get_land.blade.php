
@if (count($my_lands) > 0)

    <div class="panel-body">
        <div class="land-widget">
            @foreach ($my_lands as $my_land)

            @endforeach
            <div class="col-md-6 wid-area">
                <div class="row wid-title-sec">
                    <div class="col-xs-7">
                        <h2 class="wid-titel">LAND-{{$my_land->id}}</h2>
                        <p class="wid-sub-title">(date থেকে date)</p>
                    </div>
                    <div class="col-xs-5">
                        @if (true)
                            <button type="button" class="btn btn-danger pull-right" data-toggle="modal"
                                data-target="#land_transfer_model_1">
                                হস্তান্তর
                            </button>
                        @else
                            status
                        @endif

                        <!-- Button trigger modal -->
                        <!--{{ url('land_renew_aplication') }}-->
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalLong"
                            class="btn btn-danger pull-right">
                            নবায়ন
                        </a>
                    </div>
                </div>
                <div class="wid-data">
                    <div class="row">
                        <div class="col-xs-6">
                            <ul class="wid-data-list">
                                <li><i class="fa fa-square" aria-hidden="true"></i> জমির পরিমানঃ <span
                                        class="pull-right">45 শতাংশ
                                    </span></li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> উপজেলাঃ <span
                                        class="pull-right">upazila</span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> মৌজাঃ <span class="pull-right">mouza
                                    </span></li>
                        </div>
                        <div class="col-xs-6">
                            <ul class="wid-data-list">
                                <li><i class="fa fa-square" aria-hidden="true"></i> জে. এল. নং <span
                                        class="pull-right">jl_no </span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> খতিয়ানঃ <span
                                        class="pull-right">khotian </span>
                                </li>
                                <li><i class="fa fa-square" aria-hidden="true"></i> দাগঃ <span
                                        class="pull-right">dhag</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="sorry_not_font">
        <h3>দুঃখিত, এখন আবেদন করার জন্য কোন জমি নেই।</h3>
    </div>

@endif
