@if (count($leaseApplications) > 0)

    <div class="panel-body">
        <table class="table table-striped table-bordered styled-table_o">
            <tr>
                <th>ক্রঃ নং</th>
                <th>জমির বিবরণ</th>
                <th>জমির ঠিকানা</th>
                <th>ইজারার বিবরণ</th>
                <th> আবেদনের ধরন</th>
                <th>আবেদনের তারিখ</th>
                <th>আবেদন</th>
            </tr>

            <tbody>
                @foreach ($leaseApplications as $leaseApplication)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <b title="dag no"> Dag no- {{ $leaseApplication->dagList->bn_name }} </b> <br>
                            <b title="জমির পরিমান">জমির পরিমানঃ </b> {{ $leaseApplication->dagList->land_amount }}
                            {{ $leaseApplication->dagList->land_amount_type == 1 ? 'AKOR' : 'SATAK' }}<br>
                            <b title="জমির অবস্থা">জমির অবস্থাঃ </b>
                            {{ $leaseApplication->dagList->land_condition }}<br>

                        </td>
                        <td>
                            <b title="উপজেলা">উপজেলাঃ </b> {{ $leaseApplication->dagList->upazila->bn_name }}<br>
                            <b title="মৌজা">মৌজাঃ </b> {{ $leaseApplication->dagList->mouza->bn_name }}<br>
                            <b title="জে. এল. নং">জে. এল. নং </b> {{ $leaseApplication->dagList->mouza->j_l_no }}<br>
                            <b title="খতিয়ান">খতিয়ানঃ </b> {{ $leaseApplication->dagList->khatianNo->bn_name }}<br>
                            <b title="দাগ">দাগঃ </b> {{ $leaseApplication->dagList->bn_name }}<br>
                        </td>
                        <td>

                            <b title="মোট"> মোটঃ </b> {{ $leaseApplication->amount }}টাকা<br>
                            <b title="মোট"> তারিখঃ </b> {{ $leaseApplication->payment_date }}টাকা<br>


                        </td>
                        <td>
                            {{ $leaseApplication->status }}

                        </td>
                        <td>
                            <b title=" আবেদনের তারিখ">তারিখঃ </b>
                            {{ $leaseApplication->date ?? '' }}<br>
                            <b title=" পেমেন্ট মেথডঃ ">পেমেন্ট মেথডঃ </b>
                            {{ $leaseApplication->payment_method }}<br>
                            <b title=" টাকার পরিমাণঃ ">টাকার পরিমাণঃ </b>
                            {{ $leaseApplication->amount ?? '' }}
                            টাকা<br>
                            @if ($leaseApplication->payment_method == 'BANK')
                                <b title=" পে অর্ডার নং ">পে অর্ডার নং </b>
                                {{ $leaseApplication->payorder ?? '' }}<br>
                                <b title="ব্যাংকঃ ">ব্যাংকঃ </b> {{ $leaseApplication->bank ?? '' }}<br>
                                <b title=" শাখা ">শাখাঃ </b> {{ $leaseApplication->branch ?? '' }}<br>
                            @elseif ($leaseApplication->payment_method == 'CASH')
                                <b title=" receipt nuber ">রশিদ নং </b>
                                {{ $leaseApplication->receipt_no ?? '' }}<br>
                            @else
                                <b title=" মোবাইল নম্বর ">মোঃ নং </b>
                                {{ $leaseApplication->transaction_number ?? '' }}<br>
                                <b title=" ট্যাক্স আইডি">ট্যাক্স আইডিঃ </b>
                                {{ $leaseApplication->transaction_id ?? '' }}<br>
                            @endif
                        </td>
                        <td>


                            <button type="button" class="btn btn-default btn-sm" disabled>
                                {{ $leaseApplication->status }}
                            </button>

                            {{-- <div class="btn-group disabled " role="group" disabled="disabled">

                                <button type="button" class="btn btn-xs btn-danger dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <i class="fa fa-print" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" style="right: 0; left: inherit">
                                    <li><a href="lease_aplication_print/{{ $leaseApplication->id }}"
                                            target="_blank">আবেদন</a>
                                    </li>
                                    <li><a href="lease_request_money_reicept/{{ $leaseApplication->id }}"
                                            target="_blank">মানি
                                            রিসিপ্ট</a></li>
                                </ul>
                            </div> --}}


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
