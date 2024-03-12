<div class="footer-top-one">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
<!-- footer-top area end -->
<div class="footer-btn">
    <div class="container">
        <div class="footer-btn-warp">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-down-left">
                        <div class="ftr-menu">
                            <ul class="list-unstyled">
                                {{-- @php
                                $parent_items = get_parent_menus(6);
                                @endphp
                                @foreach($parent_items as $item)
                                <li><a href="{{$item->link}}">{{$item->label}}</a></li>
                                @endforeach --}}
                            </ul>
                        </div>
                        <div class="copy-right">
                            <p>ডিজাইন & ডেভেলপড বাইঃ এফএলআইটি ০১৯৪৮২৬৩৩৫৮ / ০১৭২৯৭২৪২৩২</p>
                        </div>
                        <p style="display:none" >
                            সাইটটি শেষ হাল-নাগাদ করা হয়েছে:
                            <span>
                                <?php
                                // $post = \App\Post::orderBy('id', 'desc')->limit(1)->get()->first();

                                // echo bn2enNumber(date('d-m-Y h:i:s', strtotime($post->updated_at)));

                                ?>
                            </span>
                        </p>
                    </div>
                    <div class="footer-down-right">
                        <p>পরিকল্পনা ও বাস্তবায়নেঃ
                            {{-- {{$s_setting->com_name}} --}}
                        </p>
                        <ul class="list-unstyled">
                            <li>সামাজিক যোগাযোগ</li>
                            <li><a href="#"><img src="{{ URL::asset('public/frontend/img/socile/1.png') }}" alt=""></a>
                            </li>
                            <li><a href="#"><img src="{{ URL::asset('public/frontend/img/socile/2.png') }}" alt=""></a>
                            </li>
                            <li><a href="#"><img src="{{ URL::asset('public/frontend/img/socile/3.png') }}" alt=""></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="outer-socile">
    <div class="souter-socile-list">
        <ul class="list-unstyled">
            <li><a href="#"><img src="{{ URL::asset('public/frontend/img/socile/facebook.jpg') }}" alt=""></a></li>
            <li><a href="#"><img src="{{ URL::asset('public/frontend/img/socile/twitter.jpg') }}" alt=""></a></li>
            <li><a href="#"><img src="{{ URL::asset('public/frontend/img/socile/youtube.jpg') }}" alt=""></a></li>
            <li><a href="#"><img src="{{ URL::asset('public/frontend/img/socile/gmail.jpg') }}" alt=""></a></li>
        </ul>
    </div>
</div>
