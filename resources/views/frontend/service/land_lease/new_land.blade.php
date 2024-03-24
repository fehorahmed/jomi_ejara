@php
    $new_lands = [];
    $count = 0;
    $sl = 0;
@endphp

@if ($count > 0)
    <div class="panel-body">
        <table class="table table-striped table-bordered styled-table_o">
            <tr>
                <th>ক্রঃ নং</th>
                <th>জমির বিবরণ</th>
                <th>জমির ঠিকানা</th>
                <th>ইজারা</th>
                <th>আবেদন</th>
            </tr>
            <tbody>
                @foreach ($new_lands as $land)
                    <tr>
                        <td>{{ e_to_b(++$sl) }}</td>
                        <td>
                            <b title="মার্কেটের নাম"> আই ডিঃ LAND-{{ $land->id }} </b> <br>
                            <b title="জমির পরিমান">জমির পরিমানঃ </b> {{ e_to_b($land->area_of_land) }} শতাংশ<br>
                            <b title="জমির অবস্থা">জমির অবস্থাঃ </b> {{ $land->current_status_of_land }}<br>
                        </td>
                        <td>
                            <b title="উপজেলা">উপজেলাঃ </b> {{ e_to_b($land->upazila) }}<br>
                            <b title="মৌজা">মৌজাঃ </b> {{ $land->mouza }}<br>
                            <b title="জে. এল. নং">জে. এল. নং </b> {{ e_to_b($land->jl_no) }}<br>
                            <b title="খতিয়ান">খতিয়ানঃ </b> {{ e_to_b($land->khotian) }}<br>
                            <b title="দাগ">দাগঃ </b> {{ e_to_b($land->dhag) }}<br>
                        </td>
                        <td>
                            <b title=" শুরু">
                                শুরুঃ </b> {{ e_to_b(date('d-F-Y', strtotime(@$land->lease_start))) }}<br>
                            <b title=" শেষ">
                                শেষঃ </b> {{ e_to_b(date('d-F-Y', strtotime(@$land->lease_end))) }} <br>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#tender_land_model_{{ @$land->id }}">
                                আবেদন
                            </button>
                            <div class="modal fade" id="tender_land_model_{{ @$land->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLongTitle"> জমি ইজারা বন্দোবস্তের
                                                আবেদন ফর্ম </h3>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form class="modal-body" action="{{ route('user_lease_application') }}"
                                            method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="ownner_id">
                                            <input type="hidden" value="{{ $land->id }}" name="id">
                                            <input type="hidden" value="{{ $land->lease_amount }}"
                                                name="lease_amount">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> উপজেলা </label>
                                                            <input type="text" name="upazila"
                                                                value="{{ $land->upazila }}" class="form-control"
                                                                id="exampleInputEmail1" placeholder="উপজেলা ">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> মৌজাঃ </label>
                                                            <input type="text" name="mouza"
                                                                value="{{ $land->mouza }}" class="form-control"
                                                                id="exampleInputEmail1" placeholder="মৌজাঃ ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> জে.এল.নংঃ </label>
                                                            <input type="text" name="jl_no"
                                                                value="{{ $land->jl_no }}" class="form-control"
                                                                id="exampleInputEmail1" placeholder="জে.এল.নংঃ ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> খতিয়ানঃ </label>
                                                            <input type="text" name="ledger"
                                                                value="{{ $land->khotian }}" class="form-control"
                                                                id="exampleInputEmail1" placeholder="খতিয়ানঃ ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> দাগঃ </label>
                                                            <input type="text" name="dhag"
                                                                value="{{ $land->dhag }}" class="form-control"
                                                                id="exampleInputEmail1" placeholder="দাগঃ ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> জমির পরিমাণঃ </label>
                                                            <input type="text" name="land_amount"
                                                                value="{{ $land->area_of_land }}" class="form-control"
                                                                id="exampleInputEmail1" placeholder="জমির পরিমাণঃ ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> শ্রেণী </label>
                                                            <input type="text" name="type"
                                                                value="{{ $land->land_class }}" class="form-control"
                                                                id="exampleInputEmail1" placeholder="শ্রেণী ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1"> বর্তমান অবস্থা </label>
                                                            <input type="text"
                                                                value="{{ $land->current_status_of_land }}"
                                                                name="present_situation" class="form-control"
                                                                id="exampleInputEmail1" placeholder="বর্তমান অবস্থা ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">start </label>
                                                            <input type="text" value="{{ $land->lease_start }}"
                                                                name="lease_start" class="form-control"
                                                                id="exampleInputEmail1" placeholder="বর্তমান অবস্থা ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">end </label>
                                                            <input type="text" value="{{ $land->lease_end }}"
                                                                name="lease_end" class="form-control"
                                                                id="exampleInputEmail1" placeholder="বর্তমান অবস্থা ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">বাতিল
                                                </button>
                                                <button type="submit" class="btn btn-success">জমা দিন</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
    </div>
    <!-- Modal -->
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
