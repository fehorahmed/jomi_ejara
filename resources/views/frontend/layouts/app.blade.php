<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- @php
    $s_setting = App\Setting::first();
    @endphp --}}
    {{-- {!! metas(@$settings, $options = array(
    'url' => config('app.url', 'default'),
    'img_url' => NULL,
    'title' => NULL,
    'description' => NULL,
    'keywords' => NULL
    )) !!} --}}
    <script type="text/javascript">
        var baseurl = "<?php echo url('/'); ?>";
    </script>

    @include('frontend.layouts.css')
    <style>
        .custom-redio {
            background: rgb(23 229 229);
            padding: 7px;
            padding-left: 33px;
            /* padding-bottom: 10px; */
        }

        .payment_image {
            height: 50px;
            width: 135px;
        }

        .mb-1 {
            margin-bottom: 8px;
        }
    </style>
    @include('frontend.layouts.js_head')
</head>

<body style="background:#DFF0F9 !important;">
    @include('frontend.layouts.header')

    <div class="frontend_content">
        <div class="extra_pad">
            @yield('content')
        </div>
    </div>

    @include('frontend.layouts.footer')
    @include('frontend.layouts.js')
    @yield('cusjs')
</body>

</html>
