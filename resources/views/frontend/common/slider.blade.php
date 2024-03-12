<section class="">
    <div class="container">
        <div class="row">
            <div class=" ads-box col-md-12">
                {!! @$widgets[12]->description !!}
            </div>
        </div>
    </div>
</section>
<section class="slider-area" style="display:none">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                        <div class="item">

                            <img src="" alt="Image">
                        </div>



                    </div>

                    {{--<!-- Controls -->--}}
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="home-logo">
            @if(!empty($setting))
            <a href="{{ url('/') }}">
                <img src="{{ url($setting->com_logourl) }}" alt="">
                <h2>{{ $setting->com_name }}</h2>
            </a>
            @endif
        </div>
    </div>
    </div>
</section>

<div class="container">
    <div class="rwo">
        <div class="col-md-12">
            <div class="row">
                <div class="nav-area">
                    <!-- nav start -->
                    <div id="main-nav" class="stellarnav navone">
                        {{-- <?php $parent_items = get_parent_menus(1); ?> --}}
                        <ul>

                            <li>
                                <a href="">sdsfsdfsdf</a>



                            </li>
                            {{-- @if(isset($parent_items))
                            @foreach($parent_items as $parent)

                            @php
                            $sub_menus = get_sub_menus($parent->id);
                            $sub_count = $sub_menus->count();

                            if($sub_count > 0) {
                            $has_sub = 'class="has_sub"';
                            $sul = '<ul>';
                                $eul = '</ul>';
                            } else {
                            $has_sub = '';
                            $sul = '';
                            $eul = '';
                            }
                            @endphp

                            <li>
                                <a href="{{ $parent->link }}">{{ $parent->label }}</a>


                                @if(!empty($sub_menus))
                                {!! $sul !!}
                                @foreach($sub_menus as $item)
                            <li>
                                <a href="{{ $item->link }}">{{ $item->label }}</a>
                            </li>
                            @endforeach
                            {!! $eul !!}
                            @endif
                            @endforeach
                            @endif --}}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- nav end -->
        </div>
    </div>
</div>
