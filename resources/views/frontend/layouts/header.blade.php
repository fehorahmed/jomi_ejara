<header class="top-area">
    <div class="container">
        <div class="row">
            @php
                $setting = \App\Models\Setting::first();
                $app_name = null;
                if ($setting) {
                    $app_name = $setting->name;
                    $website = $setting->website;
                }
            @endphp
            <div class="headertop">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="topLogoName">
                        <div class="textwidget">
                            @if (isset($website))
                                <a target="_blank" href="{{ $website }}">
                                    <!--উপ পরিচালকের কার্যালয়-->
                                    @if (isset($app_name))
                                        {{ $app_name }}
                                    @else
                                        জেলা পরিষদ, ফরিদপুর ।
                                    @endif
                                </a>
                            @else
                                <a target="_blank" href="http://www.facebook.com">
                                    <!--উপ পরিচালকের কার্যালয়-->
                                    @if (isset($app_name))
                                        {{ $app_name }}
                                    @else
                                        জেলা পরিষদ, ফরিদপুর ।
                                    @endif
                                </a>
                            @endif


                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <!--<div class="mlt-form mlt-form2">-->
                    <!--    <select class="form-control" id="upazilla">-->
                    <!--        <option value="">উপজেলা</option>-->
                    <!--        <option value="1">-->
                    <!--            শরীয়তপুর সদর-->
                    <!--        </option>-->
                    <!--        <option value="2">-->
                    <!--            জাজিরা-->
                    <!--        </option>-->
                    <!--        <option value="3">-->
                    <!--            ভেদরগঞ্জ-->
                    <!--        </option>-->
                    <!--        <option value="4">-->
                    <!--            ডামুড্যা-->
                    <!--        </option>-->
                    <!--        <option value="5">-->
                    <!--            নড়িয়-->
                    <!--        </option>-->
                    <!--        <option value="6">-->
                    <!--            গোসাইরহা-->
                    <!--        </option>-->
                    <!--    </select>-->
                    <!--</div>-->
                </div>
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <!--<div class="mlt-form mlt-form2">-->
                    <!--    <select class="form-control" id="union">-->
                    <!--        <option>ইউনিয়ন</option>-->
                    <!--    </select>-->
                    <!--</div>-->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 headerDate">
                    <div class="row">
                        <div class="multilangual">

                            <ul class="list-unstyled">
                                <li>

                                    <?php
                                    
                                    $d = date('D F j, Y');
                                    // $d = en2bnSomeCommonString($d);
                                    // $d = bn2enNumber($d);
                                    
                                    echo $d;
                                    
                                    ?>

                                </li>
                                @if (url()->current() != 'http://freelanceritbd.com/shariatpur')
                                    @if (Auth::check())
                                        <li>
                                            <a href="{{ url('my_account') }}">
                                                আমার ড্যাশবোর্ড
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.logout') }}">
                                                সাইন আউট
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('user.login') }}">
                                                লগইন
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.registration') }}">
                                                রেজিস্টার
                                            </a>
                                        </li>
                                        {{--
                                        <li>
                                            <a href="{{ url('login-register') }}">
                                সাইন ইন / সাইন আপ
                                </a>
                                </li> --}}
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
