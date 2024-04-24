@if (count($leaseOrders) > 0)

    <div class="panel-body">
        <table class="table table-striped table-bordered styled-table_o">
            <tr>
                <th>ক্রঃ নং</th>
                <th>জমির বিবরণ</th>
                <th>জমির ঠিকানা</th>
                <th>ইজারার বিবরণ</th>

                <th>আবেদনের তারিখ</th>
                <th>আবেদন</th>
            </tr>

            <tbody>
                @foreach ($leaseOrders as $leaseOrder)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <b title="মার্কেটের নাম"> Dag no- {{ $leaseOrder->dagList->bn_name }} </b> <br>
                            <b title="জমির পরিমান">জমির পরিমানঃ </b> {{ $leaseOrder->dagList->bn_name }} শতাংশ<br>
                            <b title="জমির অবস্থা">জমির অবস্থাঃ </b> {{ $leaseOrder->dagList->bn_name }}<br>


                        </td>
                        <td>
                            <b title="উপজেলা">উপজেলাঃ </b> {{ $leaseOrder->dagList->bn_name }}<br>
                            <b title="মৌজা">মৌজাঃ </b> {{ $leaseOrder->dagList->bn_name }}<br>
                            <b title="জে. এল. নং">জে. এল. নং </b> {{ $leaseOrder->dagList->bn_name }}<br>
                            <b title="খতিয়ান">খতিয়ানঃ </b> {{ $leaseOrder->dagList->bn_name }}<br>
                            <b title="দাগ">দাগঃ </b> {{ $leaseOrder->dagList->bn_name }}<br>
                        </td>
                        <td>
                            <b title="উপজেলা">ইজারাঃ </b> টাকা<br>
                            {{--                        <b title="ভ্যাট">ভ্যাটঃ </b> {{e_to_b( ($tender->tax * $tender->rent)/100 )}} টাকা --}}
                            {{--                        ({{ e_to_b($tender->tax) }}% হারে)<br> --}}
                            {{--                        <b title="ট্যাক্স">ট্যাক্সঃ </b> {{e_to_b(($tender->vat*$tender->rent)/100 )}}টাকা --}}
                            {{--                        ({{e_to_b($tender->vat) }}% হারে)<br> --}}
                            <b title=" চুক্তি শুরু"> চুক্তি
                                শুরুঃ </b> <br>
                            <b title=" চুক্তি শেষ"> চুক্তি
                                শেষঃ </b> <br>
                        </td>

                        <td>

                            <b title=" আবেদনের শুরু">
                                শুরুঃ </b> <br>
                            <b title=" আবেদনের শেষ">
                                শেষঃ </b> <br>


                        </td>
                        <td>
                            {{-- @if ($lease_req)
                                <button type="button" class="btn btn-default btn-sm" disabled>
                                    আবেদন করেছেন
                                </button>
                            @else --}}
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#tender_land_model_{{ $leaseOrder->id }}">
                                আবেদন
                            </button>

                            <div class="modal fade" id="tender_land_model_{{ $leaseOrder->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        {{-- {{ Form::open(['url' => 'land_tender_aply', 'method' => 'post', 'autocomplete' => 'off']) }} --}}

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">আবেদন পত্র </h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="payment_info[payment_method]"
                                                            id="pm_bankdraft" value="Bank draft"
                                                            onchange="payment_option(this);"
                                                            data-id="{{ $leaseOrder->id }}" checked>
                                                        পে অর্ডার / ব্যাংক ড্রাফট
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="payment_info[payment_method]"
                                                            id="pm_bkash" value="Bkash"
                                                            onchange="payment_option(this);"
                                                            data-id="{{ $leaseOrder->id }}">
                                                        বিকাশ
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="payment_info[payment_method]"
                                                            id="pm_nagot" value="Nagat"
                                                            onchange="payment_option(this);"
                                                            data-id="{{ $leaseOrder->id }}">
                                                        নগদ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group" style="margin-bottom: 5px">
                                                    <div class="input-group-addon" style="min-width: 165px">
                                                        <div class="input-group-text" id="rent_amount_co">টাকার
                                                            পরিমাণ
                                                        </div>
                                                    </div>
                                                    {{-- {{ Form::number('payment_info[amount]', 100, ['required', 'class' => 'form-control', 'placeholder' => 'টাকার পরিমাণ..', 'readonly']) }} --}}

                                                    <div class="input-group-addon">
                                                        <div class="input-group-text">টাকা</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="bank-draft-{{ $leaseOrder->id }}">
                                                <div class="form-group">


                                                    <div class="input-group" style="margin-bottom: 5px">
                                                        <div class="input-group-addon" style="min-width: 165px">
                                                            <div class="input-group-text" id="rent_amount_co">পে
                                                                অর্ডার
                                                                / ব্যাংক ড্রাফট নং
                                                            </div>
                                                        </div>
                                                        {{-- {{ Form::number('payment_info[payorder]', null, ['class' => 'form-control', 'placeholder' => 'পে অর্ডার / ব্যাংক ড্রাফট নং..']) }} --}}


                                                    </div>
                                                    <div class="input-group" style="margin-bottom: 5px">
                                                        <div class="input-group-addon" style="min-width: 165px">
                                                            <div class="input-group-text" id="rent_amount_co">তারিখ
                                                            </div>
                                                        </div>
                                                        {{-- {{ Form::text('payment_info[date]', null, ['class' => 'form-control date-pick', 'placeholder' => 'তারিখ..', 'autocomplete' => 'off']) }} --}}


                                                    </div>
                                                    <div class="input-group" style="margin-bottom: 5px">
                                                        <div class="input-group-addon" style="min-width: 165px">
                                                            <div class="input-group-text" id="rent_amount_co">
                                                                ব্যাংকের
                                                                নাম
                                                            </div>
                                                        </div>
                                                        {{-- {{ Form::text('payment_info[bank]', null, ['class' => 'form-control', 'placeholder' => 'ব্যাংকের নাম..']) }} --}}

                                                    </div>
                                                    <div class="input-group" style="margin-bottom: 5px">
                                                        <div class="input-group-addon" style="min-width: 165px">
                                                            <div class="input-group-text" id="rent_amount_co">শাখা
                                                            </div>
                                                        </div>
                                                        {{-- {{ Form::text('payment_info[branch]', null, ['class' => 'form-control', 'placeholder' => 'শাখা..']) }} --}}

                                                    </div>

                                                </div>
                                            </div>

                                            <div id="bkash-nogot-{{ $leaseOrder->id }}" class="hidden">
                                                <div class="form-group">


                                                    <div class="input-group" style="margin-bottom: 5px">
                                                        <div class="input-group-addon" style="min-width: 165px">
                                                            <div class="input-group-text" id="rent_amount_co">
                                                                লেনদেন
                                                                নম্বর লিখুন
                                                            </div>
                                                        </div>
                                                        {{-- {{ Form::number('payment_info[number]', null, ['class' => 'form-control', 'placeholder' => ' লেনদেন নম্বর লিখুন...']) }} --}}


                                                    </div>
                                                    <div class="input-group" style="margin-bottom: 5px">
                                                        <div class="input-group-addon" style="min-width: 165px">
                                                            <div class="input-group-text" id="rent_amount_co">
                                                                তারিখ
                                                            </div>
                                                        </div>
                                                        {{-- {{ Form::text('payment_info[date]', null, ['class' => 'form-control date-pick', 'placeholder' => 'তারিখ..']) }} --}}


                                                    </div>
                                                    <div class="input-group" style="margin-bottom: 5px">
                                                        <div class="input-group-addon" style="min-width: 165px">
                                                            <div class="input-group-text" id="rent_amount_co">
                                                                ট্রানস্যাকশন আইডি
                                                            </div>
                                                        </div>
                                                        {{-- {{ Form::text('payment_info[tid]', null, ['class' => 'form-control', 'placeholder' => 'ট্রানস্যাকশন আইডি..']) }} --}}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{-- {{ Form::label('is_land_possession', 'জমি দখল আছে কি না?', ['class' => 'is_under_ground']) }} --}}
                                                {{-- {{ Form::select(
                                                    'is_land_possession',
                                                    [
                                                        'Yes' => 'হ্যাঁ',
                                                        'No' => 'না',
                                                    ],
                                                    null,
                                                    ['class' => 'form-control', 'placeholder' => 'একটি বাছাই করুন...'],
                                                ) }} --}}
                                            </div>

                                            <div class="form-group">
                                                {{-- {{ Form::label('notes', 'কি কারণে ইজারা নেয়া প্রয়োজন?', ['class' => 'notes']) }} --}}
                                                {{-- {{ Form::textarea('lease_reason', null, ['id' => null, 'rows' => 2, 'class' => 'form-control', 'placeholder' => 'কি কারণে ইজারা নেয়া প্রয়োজন?...']) }} --}}

                                                {{-- {{ Form::hidden('tender_id', $leaseOrder->id, ['required']) }} --}}
                                                {{-- {{ Form::hidden('land_id', $leaseOrder->land_id, ['required']) }} --}}
                                                {{-- {{ Form::hidden('user_id', $user['user_id'], ['required']) }} --}}


                                            </div>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল
                                            </button>
                                            <button type="submit" class="btn btn-success">জমা দিন</button>
                                        </div>
                                        {{-- {{ Form::close() }} --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            {{-- @endif --}}

                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@else
    <div class="sorry_not_font">
        <h3>দুঃখিত, এখন আবেদন করার জন্য কোন জমি নেই।</h3>
    </div>

@endif
