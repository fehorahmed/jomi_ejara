<div class="row up_top" style="margin-top: 20px;">
    <div class="col-md-12" style="margin-bottom: 20px;">
        @if (Auth::check())

            <ul class="nav navbar-nav">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-user"></i> স্বাগতম , {{ Auth::user()->name }}
                    </a>
                </li>
                @if (Auth::user())
                    <li>
                        <a href="{{ url('my_account') }}">
                            আমার ড্যাশবোর্ড
                        </a>
                    </li>
                @endif
                @if (Auth::user()->isDigitalCenter())
                    <li>
                        <a href="{{ url('/pending_payment') }}">
                            @php
                                $pending_payment = App\Payment::Where(['is_active' => 0])
                                    ->get()
                                    ->count();
                                if ($pending_payment > 0 && $pending_payment < 10) {
                                    $pending_payment = $pending_payment;
                                } elseif ($pending_payment > 9) {
                                    $pending_payment = '9+';
                                } else {
                                    $pending_payment = '';
                                }
                            @endphp
                            অপেক্ষারত পেমেন্ট <span class="text-danger notice_icon">{{ $pending_payment }}</span>
                        </a>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="true">
                        প্রোফাইল সম্পাদনা <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" style="text-align: left;">
                        @if (Auth::user()->isAdmin())
                            <li>
                                <a href="{{ url('dashboard') }}">
                                    ড্যাশবোর্ড
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('income_statement') }}">
                                    আয়ের হিসাব
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->isDigitalCenter())
                            <li>
                                <a href="{{ url('add_profile') }}">
                                    নতুন প্রোফাইল সংযোজন করুন
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('profile_list') }}">
                                    সকল প্রোফাইল
                                </a>
                            </li>
                            <li class="separator"></li>
                            <li>
                                <a href="{{ url('income_statement') }}">
                                    আয়ের হিসাব
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->isMember())
                            {{-- <li>
                                <a href="{{ url('general_info_en') }}">
                                    General information (In English)
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('general_info_bn') }}">
                                    সাধারণ তথ্যাদি (বাংলাতে)
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('present_address_en') }}">
                                    Present Address (In English)
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('present_address_bn') }}">
                                    বর্তমান ঠিকানা (বাংলাতে)
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('permanent_address_en') }}">
                                    Permanent Address (In English)
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('permanent_address_bn') }}">
                                    স্থায়ী ঠিকানা (বাংলাতে)
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ url('profile_edit') }}">প্রোফাইল</a>
                            </li>
                            {{-- <li>
                                <a href="{{ url('warish') }}">ওয়ারিশ</a>
                            </li>
                            <li>
                                <a href="{{ url('business') }}">ব্যবসা</a>
                            </li> --}}
                        @endif
                    </ul>
                </li>

                <li class="pull-right">
                    @if (Auth::user()->isAdmin())
                        <a href="{{ url('/dashboard') }}">
                            <i class="fa fa-cog"></i> এডমিন ড্যাশবোর্ড
                        </a>
                    @else
                        {{-- <a href="{{ url('#') }}"> --}}
                        {{-- <i class="fa fa-unlock-alt"></i> পাসওয়ার্ড পরিবর্তন --}}
                        {{-- </a> --}}
                        {{-- <a href="{{ url('/profile_update') }}"> --}}
                        {{-- <i class="fa fa-user"></i> প্রোফাইল হালনাগাদ --}}
                        {{-- </a> --}}
                        {{-- <a href="{{ url('/my_account') }}"> --}}
                        {{-- <i class="fa fa-list"></i> মাই একাউন্ট --}}
                        {{-- </a> --}}
                        <a href="{{ url('/logout') }}">
                            <i class="fa fa-sign-out"></i> লগ আউট
                        </a>
                    @endif
                </li>
            </ul>

        @endif
    </div>

</div>

@if (Auth::user()->isDigitalCenter() || Auth::user()->isAdmin())
    <div class="row">
        <div class="col-md-12">
            @if (Auth::user()->isDigitalCenter())
                <p>
                    ধন্যবাদ, {{ Auth::user()->name }} । আপনি একজন <b> ডিজিটাল সেন্টার কর্মকর্তা।</b>
                    আপনি চাইলে যে কারোর প্রোফাইল তৈরি করতে পারবেন, যা পরবতীতে সকল প্রোফাইল তালিকা থেকে পরিবর্তন
                    ও পরিবর্ধন করতে পারবেন।
                </p>
            @elseif(Auth::user()->isAdmin())
                <p>
                    ধন্যবাদ, {{ Auth::user()->name }} ।
                </p>
                {{--                <p> --}}
                {{--                    ধন্যবাদ, {{ Auth::user()->name }} । আপনি একজন <b> প্রশাসক।</b> --}}
                {{--                    আপনি চাইলে যে কারোর প্রোফাইল তৈরি করতে পারবেন, যা পরবতীতে সকল প্রোফাইল তালিকা থেকে পরিবর্তন --}}
                {{--                    ও পরিবর্ধন করতে পারবেন। --}}
                {{--                </p> --}}
            @else
                <p>
                    ধন্যবাদ, {{ Auth::user()->name }} । আপনি একজন <b> সাধারণ ব্যবহারকারী</b>
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        ইউজার খুঁজুন
                    </h5>
                </div>
                <div class="panel-body">

                    <form action="">
                        <div class="row">
                            <div class="col-xs-2">
                                <select name="column" required class="form-control select2" style="width: 100%;">
                                    <option value="Name"
                                        {{ Request::post('column') == 'name' ? 'selected="selected"' : 'selected="selected"' }}>
                                        নাম
                                    </option>
                                    <option value="nidno"
                                        {{ Request::post('column') == 'nidno' ? 'selected="selected"' : '' }}>
                                        ন্যাশনাল আইডি
                                    </option>
                                    <option value="passportno"
                                        {{ Request::post('column') == 'passportno' ? 'selected="selected"' : '' }}>
                                        পাসপোর্ট নং
                                    </option>
                                    <option value="birthcertificateno"
                                        {{ Request::post('column') == 'birthcertificateno' ? 'selected="selected"' : '' }}>
                                        বার্থ সার্টিফিকেট
                                    </option>
                                    <option value="email"
                                        {{ Request::post('column') == 'email' ? 'selected="selected"' : '' }}>
                                        ইমেইল
                                    </option>
                                    <option value="phone"
                                        {{ Request::post('column') == 'phone' ? 'selected="selected"' : '' }}>
                                        ফোন
                                    </option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" placeholder="সার্চ  বিষয়  লিখুন (ইংরেজিতে)"
                                    name="search_key" id="search_key">
                            </div>
                            <div class="col-xs-1">
                                <input type="submit" class="btn btn-success" value="খুঁজুন">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endif
