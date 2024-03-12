@extends('frontend.layouts.app')

@section('content')

    <!--slider-area-start-->
    @include('frontend.common.slider')
    <!--slider-area-end-->
    <!-- marquee-area-start-->
    @include('frontend.common.marquee')
    <!-- marquee-area-end-->


    {{-- @php
        $find_shop = \App\AllotmentSession::Where(['is_active' => 1,'status' => 'Yes'])->orderBy('create_date', 'DESC' )->get();
        $find_shop_count =$find_shop->count();
        $sl = 0;


    @endphp --}}


    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9">
                <!-- notice area section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="notice-title section-title">
                            <h2>মার্কেট</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        @if(isset($find_shop_count) &&$find_shop_count > 0)



                            <div class="panel-body">
                                <table class="table table-striped table-bordered styled-table_o">
                                    <tr>
                                        <th>ক্রঃ নং</th>
                                        <th>মার্কেটের বিবরণ</th>
                                        <th>দোকানের বিবরণ</th>
                                        <th>বরাদ্দের বিবরণ</th>
                                        <th>আবেদনের তারিখ</th>
                                        <th>আবেদন</th>

                                    </tr>

                                    <tbody>
                                    @foreach($find_shop as $fshop)

                                        @php
                                            $data = \App\MarketShop::Where(['id' => $fshop->shop_id])->get()->first();
                                            $market = \App\Market::Where(['id' => $data->market_id])->get()->first();
                                            $sl++;



                                            $get_existing = \App\ShopAllocateRequest::where(function($get_existing){
                                                    $get_existing->Where('request_status', 'Applied')
                                                        ->orWhere('request_status', 'Applied')
                                                        ->orWhere('request_status', 'On Review')
                                                        ->orWhere('request_status', 'Correction');
                                                })->get();

                                               //dump();




                                        @endphp
                                        <tr>
                                            <td>{{ $sl }}</td>
                                            <td>
                                                <b title="মার্কেটের নাম">নামঃ </b>{{$market->market_name}} <br>
                                                <b title="মার্কেটের ঠিকানা">ঠিকানাঃ </b>{{$market->market_name}} <br>


                                            </td>
                                            <td>
                                                <b title="দোকান নং">দোকান
                                                    নং </b>{{ e_to_b($data->shop_number) }} {{ ($data->shop_floor)? ' ('.e_to_b($data->shop_floor). ' তলায়)' : ''}}
                                                <br>
                                                <b title="দোকানের আয়তন">আয়তনঃ </b>{{ e_to_b($data->total_volume) }} বর্গফুট<br>
                                                <b title="দোকানের দৈর্ঘ্য">দৈর্ঘ্যঃ </b>{{ e_to_b($data->shop_length) }} ফুট<br>
                                                <b title="দোকানের প্রস্থ">প্রস্থঃ </b>{{ e_to_b($data->shop_width) }} ফুট<br>
                                            </td>
                                            <td>
                                                <b title="দোকানের ভাড়াঃ">ভাড়াঃ </b>{{ e_to_b($data->next_rent) }}
                                                টাকা {{ ' ('.e_to_b($data->rent_type).')'}}<br>
                                                <b title="দোকানের সেলামীঃ">সেলামীঃ </b>{{ e_to_b($data->shop_next_salami) }} টাকা<br>
                                                <b title="দোকানের ভ্যাটঃ">ভ্যাটঃ </b>{{ e_to_b($data->shop_next_vat) }} % <br>
                                                <b title="দোকানের আয়করঃ">আয়করঃ </b>{{ e_to_b($data->shop_next_tax) }} %


                                            </td>
                                            <td>
                                                <b title="আবেদন শুরু">শুরুঃ </b>{{ e_to_b(date("d-F-Y", strtotime($data->allotment_apply_start))) }}
                                                <br>
                                                <b title="আবেদন শেষ">শেষঃ </b>{{ e_to_b(date("d-F-Y", strtotime($data->allotment_apply_end))) }}
                                                <br>

                                            </td>
                                            <td>
                                                @if($get_existing->count() > 0)
                                                    <button type="button" class="btn btn-default btn-sm" disabled>
                                                        আবেদন করেছেন
                                                    </button>
                                                @else
                                                <!-- Button trigger modal -->
                                                    <a  class="btn btn-success btn-sm"
                                                            href="{{'login-register'}}">
                                                        আবেদন
                                                    </a>

                                                @endif


                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        @else

                            <div class="sorry_not_font">
                                <h3>দুঃখিত, এখন আবেদন করার জন্য কোন দোকান নেই।</h3>
                            </div>

                        @endif
                    </div>
                </div>
                <!-- notice area section end -->

            </div>
            <!-- sidebar-ara section start -->
            <div class="col-md-3 col-sm-3">
                @include('frontend.common.right_sidebar')
            </div>
        </div>
    </div>

    <!-- google-map section start -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="google-map">
                    <div class="google-map-title  section-title">
                        <h2>মানচিত্র</h2>
                    </div>
                    <div class="textwidget">
                        @php
                            // $w13 = dynamic_widget($widgets, ['id' => 12, 'heading' => null]);
                            $w13 ='dsfds';
                        @endphp
                        {!! $w13 !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="google-map-title section-title">
                    <h2>যোগাযোগ </h2>
                </div>
                <div class="contact-info">
                    @php
                        // $w12 = dynamic_widget($widgets, ['id' => 11, 'heading' => null]);
                        $w12 = 'aaaaaa';
                    @endphp
                    {!! $w12 !!}
                </div>
            </div>
        </div>
    </div>


    {{-- @php
        $side_bar_menu = dynamic_widget($widgets, array(
            'id' => 1,
            'heading' => NULL
        ));
    @endphp --}}
    {{--{!!  $side_bar_menu !!}--}}

    {{-- @php
        $widget_info = widget_info($widgets, ['id' => 2, 'heading' => NULL, 'key' => 'name']);
        //echo $widget_info;
    @endphp --}}


    {{-- @foreach($posts as $post)
        @if($post->categories == env('REVIEWS'))

            <div class="col-md-12">
                <div class="testimonial-item">
                    <div class="testi-img ">
                        @php
                            $img = App\Image::find($post->images);
                        @endphp
                        <img src="{{ url($img->full_size_directory) }}" alt="{!! $post->title !!}">
                    </div>
                    <div class="client-rating">
                        <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                    </div>
                    <div class="testi-text">
                        <p>{!! $post->description !!}</p>
                        <h4>{!! $post->title  !!}</h4>
                        <span class="guest-rev">
                            <a href="#">{!! $post->sub_title !!}</a>
                        </span>
                    </div>
                </div>
            </div>

        @endif
    @endforeach --}}

@endsection

@section('cusjs')
@endsection
