{{-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="marqueeContent">
                <div class="ptms_marquee">
                    <marquee onmouseout="this.start()" onmouseover="this.stop()" direction="left" scrolldelay="10"
                        scrollamount="5" style="color:#FF0000;">
                        <?php
                        $news = [1, 2, 3, 4];
                        // $news = \App\Post::where('categories', 9)->limit(9)->orderBy('id', 'desc')->get();
                        ?>
                        <ul class="olnodesign">
                            @foreach ($news as $p)
                            <li>- <a href="#">{{ $p }}</a></li>
                            @endforeach
                        </ul>
                    </marquee>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="marqueeContent">
                <div class="ptms_marquee">
                    <marquee onmouseout="this.start()" onmouseover="this.stop()" direction="left" scrolldelay="10"
                        scrollamount="5" style="color:#FF0000;">
                        <ul class="olnodesign">
                            <li>- <a href="#">জেলা পরিষদ নির্বাচন চুড়ান্ত সীমা নির্ধারণ</a></li>
                            <li>- <a href="#">অনলাইনে পাসপোর্টের আবেদন</a></li>
                            <li>- <a href="#">কৃষি, মৎস্য ও প্রাণী-সেবা</a></li>
                            <li>- <a href="#">নিরাপত্তার ও শৃঙ্খলা</a></li>
                        </ul>
                    </marquee>
                </div>
            </div>
        </div>
    </div>
</div>
