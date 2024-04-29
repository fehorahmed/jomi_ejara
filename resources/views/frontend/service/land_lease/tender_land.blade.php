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
                            <b title="dag no"> Dag no- {{ $leaseOrder->dagList->bn_name }} </b> <br>
                            <b title="জমির পরিমান">জমির পরিমানঃ </b> {{ $leaseOrder->dagList->land_amount }}
                            {{ $leaseOrder->dagList->land_amount_type == 1 ? 'AKOR' : 'SATAK' }}<br>
                            <b title="জমির অবস্থা">জমির অবস্থাঃ </b> {{ $leaseOrder->dagList->land_condition }}<br>


                        </td>
                        <td>
                            <b title="উপজেলা">উপজেলাঃ </b> {{ $leaseOrder->dagList->upazila->bn_name }}<br>
                            <b title="মৌজা">মৌজাঃ </b> {{ $leaseOrder->dagList->mouza->bn_name }}<br>
                            <b title="জে. এল. নং">জে. এল. নং </b> {{ $leaseOrder->dagList->mouza->j_l_no }}<br>
                            <b title="খতিয়ান">খতিয়ানঃ </b> {{ $leaseOrder->dagList->khatianNo->bn_name }}<br>
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
                                শুরুঃ {{ $leaseOrder->application_start_date ?? '' }}</b> <br>
                            <b title=" আবেদনের শেষ">
                                শেষঃ {{ $leaseOrder->application_end_date ?? '' }}</b> <br>


                        </td>
                        <td>
                            {{-- @if ($lease_req)
                                <button type="button" class="btn btn-default btn-sm" disabled>
                                    আবেদন করেছেন
                                </button>
                            @else --}}
                            <!-- Button trigger modal -->
                            @if (App\Models\LandLeaseApplication::LandLeaseApplicationUser($leaseOrder->id))
                                <button type="button" class="btn btn-info btn-sm">
                                    আবেদন করা হয়েছে
                                </button>
                            @else
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#tender_land_model_{{ $leaseOrder->id }}">
                                    আবেদন
                                </button>
                            @endif


                            <div class="modal fade" id="tender_land_model_{{ $leaseOrder->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        {{-- {{ Form::open(['url' => 'land_tender_aply', 'method' => 'post', 'autocomplete' => 'off']) }} --}}
                                        <form
                                            action="{{ route('user.land_lease_order_application', $leaseOrder->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
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
                                                            <input type="radio" name="payment_method"
                                                                id="pm_bankdraft" value="Bank draft"
                                                                onchange="payment_option(this);"
                                                                data-id="{{ $leaseOrder->id }}" checked>
                                                            পে অর্ডার / ব্যাংক ড্রাফট
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="payment_method" id="pm_bkash"
                                                                value="Bkash" onchange="payment_option(this);"
                                                                data-id="{{ $leaseOrder->id }}">
                                                            বিকাশ
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="payment_method" id="pm_nagot"
                                                                value="Nagad" onchange="payment_option(this);"
                                                                data-id="{{ $leaseOrder->id }}">
                                                            নগদ
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="payment_method" id="pm_cash"
                                                                value="Cash" onchange="payment_option(this);"
                                                                data-id="{{ $leaseOrder->id }}">
                                                            ক্যাশ
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
                                                        <input type="text" class="form-control" name="amount"
                                                            value="{{ Helper::get_config('new_form_fee') }}" readonly
                                                            id="amount">
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
                                                            <input type="text" class="form-control" name="payorder"
                                                                id="payorder">
                                                            {{-- {{ Form::number('payment_info[payorder]', null, ['class' => 'form-control', 'placeholder' => 'পে অর্ডার / ব্যাংক ড্রাফট নং..']) }} --}}


                                                        </div>

                                                        <div class="input-group" style="margin-bottom: 5px">
                                                            <div class="input-group-addon" style="min-width: 165px">
                                                                <div class="input-group-text" id="rent_amount_co">
                                                                    ব্যাংকের
                                                                    নাম
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="bank"
                                                                id="bank">
                                                        </div>
                                                        <div class="input-group" style="margin-bottom: 5px">
                                                            <div class="input-group-addon" style="min-width: 165px">
                                                                <div class="input-group-text" id="rent_amount_co">শাখা
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="branch"
                                                                id="branch">
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
                                                            <input type="text" class="form-control" name="number"
                                                                id="number">
                                                            {{-- {{ Form::number('payment_info[number]', null, ['class' => 'form-control', 'placeholder' => ' লেনদেন নম্বর লিখুন...']) }} --}}


                                                        </div>

                                                        <div class="input-group" style="margin-bottom: 5px">
                                                            <div class="input-group-addon" style="min-width: 165px">
                                                                <div class="input-group-text" id="rent_amount_co">
                                                                    ট্রানস্যাকশন আইডি
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                name="transaction_id" id="transaction_id">
                                                            {{-- {{ Form::text('payment_info[tid]', null, ['class' => 'form-control', 'placeholder' => 'ট্রানস্যাকশন আইডি..']) }} --}}

                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="cash-area-{{ $leaseOrder->id }}" class="hidden">
                                                    <div class="form-group">
                                                        <div class="input-group" style="margin-bottom: 5px">
                                                            <div class="input-group-addon" style="min-width: 165px">
                                                                <div class="input-group-text" id="receipt">
                                                                    রিসিট
                                                                    নম্বর লিখুন
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control"
                                                                name="receipt_no" id="receipt_no">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group" style="margin-bottom: 5px">
                                                        <div class="input-group-addon" style="min-width: 165px">
                                                            <div class="input-group-text" id="rent_amount_co">তারিখ
                                                            </div>
                                                        </div>
                                                        <input type="date" class="form-control" name="date"
                                                            id="date">
                                                        {{-- {{ Form::text('payment_info[date]', null, ['class' => 'form-control date-pick', 'placeholder' => 'তারিখ..', 'autocomplete' => 'off']) }} --}}


                                                    </div>
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
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">বাতিল
                                                </button>
                                                <button type="submit" class="btn btn-success">জমা দিন</button>
                                            </div>
                                            {{-- {{ Form::close() }} --}}
                                        </form>
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
