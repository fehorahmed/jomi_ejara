@extends('frontend.layouts.app')

@section('content')
    <!--slider-area-start-->
    @include('frontend.common.slider')
    <!--slider-area-end-->
    <!-- marquee-area-start-->
    @include('frontend.common.marquee')
    <!-- marquee-area-end-->

    <div class="container user_panel">
        <div class="home-chairman-sesction">
            <div class="row">
                <div class="col-md-6">
                    <div class="google-map-title section-title">
                        <h2>
                            চেয়ারম্যান
                        </h2>
                    </div>
                    <div class="charman_wp ">
                        <div><img src="storage/uploads/fullsize/2021-06/chairman-faridpur.jpg" alt=""></div>
                        <div><br></div>
                        <div>
                            <p><b>জনাব বীর মুক্তিযোদ্ধা মোঃ শামসুল হক</b></p>
                        </div>
                        <div>
                            <p>চেয়ারম্যান, জেলা পরিষদ, ফরিদপুর <br></p>
                        </div>
                        <div style="text-align: justify;">
                            <p>যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক কিছু। যদি তুমি মনে করো,
                                এটা
                                তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে
                                রাখবে
                                লেখা অর্থহীন হয়, যখন তুমি তাকে অর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন
                                তুমি তাতে অর্থ ঢালো। যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক
                                কিছু।
                                যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে।?&nbsp; বিস্তারিত
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="google-map-title section-title">
                        <h2>
                            প্রধান নির্বাহী কর্মকর্তা
                        </h2>
                    </div>
                    <div class="charman_wp">
                        <div><img src="storage/uploads/fullsize/2021-06/md-mojibur-rahaman-ceo.png" alt="">
                        </div>
                        <div><br></div>
                        <div>
                            <p><b>জনাব মোঃ মুজিবুর রহমান</b></p>
                            <p>প্রধান নির্বাহী কর্মকর্তা, জেলা পরিষদ, ফরিদপুর<b><br></b></p>
                        </div>
                        <p style="text-align: justify;">অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার
                            মাঝেই
                            আছে অনেক কিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের
                            ভাষায়
                            লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে অর্থহীন মনে করো; আর
                            লেখা
                            অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। যেকোনো লেখাই তোমার কাছে অর্থবোধকতা
                            তৈরি
                            করতে পারে, যদি তুমি সেখানে অর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?
                            বিস্তারিত&nbsp; </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#GeneralInformation" role="tab" data-toggle="tab"> সাধারণ তথ্যাদি </a>
                </li>
                <li role="presentation" class="">
                    <a href="#allEseba" role="tab" data-toggle="tab"> সকল ই-সেবা </a>
                </li>
                <li role="presentation" class="">
                    <a href="#allMobileSeba" role="tab" data-toggle="tab"> মোবাইল সেবা </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" role="tabpanel" id="GeneralInformation">
                    <div class="panel panel-default">
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                    <div class="man-service_one">
                                        <div class="lang_enbn">
                                            <a class="btn btn-xs Bn_lang" target="_blank"
                                                href="login_now.html?uid=&amp;token=mjAssMlxpmvphflC94uMimSgpkNM3VZhVsQmHPto"
                                                target="_blank">
                                                বাংলা
                                            </a>

                                            <a class="btn btn-xs En_lang"
                                                href="login_now.html?uid=&amp;token=mjAssMlxpmvphflC94uMimSgpkNM3VZhVsQmHPto">
                                                EN
                                            </a>
                                        </div>
                                        <a target="_blank"
                                            href="login_now.html?uid=&amp;token=mjAssMlxpmvphflC94uMimSgpkNM3VZhVsQmHPto"
                                            target="_blank">
                                            <img src="public/icons/profile.png">
                                        </a>
                                        <a target="_blank"
                                            href="login_now.html?uid=&amp;token=mjAssMlxpmvphflC94uMimSgpkNM3VZhVsQmHPto">
                                            <h1>
                                                প্রোফাইল
                                            </h1>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                    <div class="man-service_one">
                                        <div class="lang_enbn">
                                            <a target="_blank" class="Bn_lang" href="login.html" target="_blank">
                                                বাংলা
                                            </a>




                                            <a target="_blank" class="En_lang" href="login.html">
                                                EN
                                            </a>
                                        </div>
                                        <a target="_blank" href="#" target="_blank">

                                            <img
                                                src="../192.168.0.101/pourashava/storage/uploads/fullsize/2019-07/marketshop.png">
                                        </a>
                                        <a target="_blank" href="#" target="_blank">
                                            <h1>
                                                আমার দোকান
                                            </h1>
                                        </a>
                                    </div>
                                </div>



                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                    <div class="man-service_one">
                                        <div class="lang_enbn">
                                            <a target="_blank" class="Bn_lang" href="login.html" target="_blank">
                                                বাংলা
                                            </a>




                                            <a target="_blank" class="En_lang" href="login.html">
                                                EN
                                            </a>
                                        </div>
                                        <a target="_blank" href="#" target="_blank">

                                            <img src="public/frontend/img/lease_land_icon.png">
                                        </a>
                                        <a target="_blank" href="#" target="_blank">
                                            <h1>
                                                জমি ইজারা
                                            </h1>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                    <div class="man-service_one">
                                        <div class="lang_enbn">
                                            <a target="_blank" class="Bn_lang" href="login.html" target="_blank">
                                                বাংলা
                                            </a>

                                            <a target="_blank" class="En_lang" href="login.html">
                                                EN
                                            </a>
                                        </div>
                                        <a target="_blank" href="login.html" target="_blank">

                                            <img src="public/frontend/img/contactor.png">
                                        </a>
                                        <a target="_blank" href="login.html" target="_blank">
                                            <h1>
                                                কন্টাক্টর
                                            </h1>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " role="tabpanel" id="allEseba">
                    <div class="panel panel-default">
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/মৎস্য ও প্রাণী">
                                        <img src="public/eseba_icons/agriculture.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/মৎস্য ও প্রাণী"
                                        class="service-type">
                                        মৎস্য ও প্রাণী </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/ভর্তির আবেদন">
                                        <img src="public/eseba_icons/admission_cap.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/ভর্তির আবেদন"
                                        class="service-type">
                                        ভর্তির আবেদন </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/ট্রেজারি চালান">
                                        <img src="public/eseba_icons/invoice_forms.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/ট্রেজারি চালান"
                                        class="service-type">
                                        ট্রেজারি চালান </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/টিকিট বুকিং ও ক্রয়">
                                        <img src="public/eseba_icons/ticket_train.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/টিকিট বুকিং ও ক্রয়"
                                        class="service-type">
                                        টিকিট বুকিং ও ক্রয় </a>
                                </div>

                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/নিয়োগ সংক্রান্ত">
                                        <img src="public/eseba_icons/govt_admision.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/নিয়োগ সংক্রান্ত"
                                        class="service-type">
                                        নিয়োগ সংক্রান্ত </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/পাসপোর্ট, ভিসা ও ইমিগ্রেশন">
                                        <img src="public/eseba_icons/passport_visa.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/পাসপোর্ট, ভিসা ও ইমিগ্রেশন"
                                        class="service-type">
                                        পাসপোর্ট, ভিসা ও ইমিগ্রেশন </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/কৃষি">
                                        <img src="public/eseba_icons/agriculture.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/কৃষি"
                                        class="service-type">
                                        কৃষি </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/ইউটিলিটি বিল">
                                        <img src="public/eseba_icons/utility.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/ইউটিলিটি বিল"
                                        class="service-type">
                                        ইউটিলিটি বিল </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/অনলাইন আবেদন">
                                        <img src="public/eseba_icons/online_application.png" alt=""
                                            width="" height=""> </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/অনলাইন আবেদন"
                                        class="service-type">
                                        অনলাইন আবেদন </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/অনলাইন নিবন্ধন">
                                        <img src="public/eseba_icons/birth_certificate.png" alt="" width=""
                                            height=""> </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/অনলাইন নিবন্ধন"
                                        class="service-type">
                                        অনলাইন নিবন্ধন </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/প্রশিক্ষণ">
                                        <img src="public/eseba_icons/training.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/প্রশিক্ষণ"
                                        class="service-type">
                                        প্রশিক্ষণ </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/পোস্টাল ও কুরিয়ার">
                                        <img src="public/eseba_icons/postal.png" alt="" width=""
                                            height=""> </a>
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/পোস্টাল ও কুরিয়ার"
                                        class="service-type">
                                        পোস্টাল ও কুরিয়ার </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/আয়কর">
                                        <img src="public/eseba_icons/tin.png" alt="" width=""
                                            height=""> </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/আয়কর"
                                        class="service-type">
                                        আয়কর </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/শিক্ষা-বিষয়ক">
                                        <img src="public/eseba_icons/apply_education.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/শিক্ষা-বিষয়ক"
                                        class="service-type">
                                        শিক্ষা-বিষয়ক </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/রেডিও, টিভির খবর">
                                        <img src="public/eseba_icons/radio_tv.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/রেডিও, টিভির খবর"
                                        class="service-type">
                                        রেডিও, টিভির খবর </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/যানবাহন সেবা">
                                        <img src="public/eseba_icons/transport.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/যানবাহন সেবা"
                                        class="service-type">
                                        যানবাহন সেবা </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/অর্থ ও বাণিজ্য">
                                        <img src="public/eseba_icons/business.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/অর্থ ও বাণিজ্য"
                                        class="service-type">
                                        অর্থ ও বাণিজ্য </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/স্বাস্থ্য বিষয়ক">
                                        <img src="public/eseba_icons/health.png" alt="" width=""
                                            height=""> </a>
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/স্বাস্থ্য বিষয়ক"
                                        class="service-type">
                                        স্বাস্থ্য বিষয়ক </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/আপনার জিজ্ঞাসা">
                                        <img src="public/eseba_icons/your_question.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/আপনার জিজ্ঞাসা"
                                        class="service-type">
                                        আপনার জিজ্ঞাসা </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/ডিজিটাল সেন্টার">
                                        <img src="public/eseba_icons/digital_center.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/ডিজিটাল সেন্টার"
                                        class="service-type">
                                        ডিজিটাল সেন্টার </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/তথ্য ভাণ্ডার">
                                        <img src="public/eseba_icons/info_vandar.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/তথ্য ভাণ্ডার"
                                        class="service-type">
                                        তথ্য ভাণ্ডার </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/ফরমস">
                                        <img src="public/eseba_icons/govt_forms.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/ফরমস"
                                        class="service-type">
                                        ফরমস </a>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                    <a target="_blank"
                                        href="https://bangladesh.gov.bd/site/view/eservices/পরীক্ষার ফলাফল">
                                        <img src="public/eseba_icons/exam_result.png" alt="" width=""
                                            height="">
                                    </a>
                                    <a target="_blank" href="https://bangladesh.gov.bd/site/view/eservices/পরীক্ষার ফলাফল"
                                        class="service-type">
                                        পরীক্ষার ফলাফল </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " role="tabpanel" id="allMobileSeba">
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                <a target="_blank" href="https://bangladesh.gov.bd/site/view/mservices/কৃষি">
                                    <img src="public/eseba_icons/agriculture.png" alt="" width=""
                                        height="">
                                </a>
                                <a target="_blank" href="https://bangladesh.gov.bd/site/view/mservices/কৃষি"
                                    class="service-type">
                                    কৃষি </a>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                <a target="_blank" href="https://bangladesh.gov.bd/site/view/mservices/কল সেন্টার">
                                    <img src="public/eseba_icons/call_center.png" alt="" width=""
                                        height="">
                                </a>
                                <a target="_blank" href="https://bangladesh.gov.bd/site/view/mservices/কল সেন্টার"
                                    class="service-type">
                                    কল সেন্টার </a>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                <a target="_blank" href="https://bangladesh.gov.bd/site/view/mservices/মোবাইল সেবা">
                                    <img src="public/eseba_icons/mobile_service.png" alt="" width=""
                                        height="">
                                </a>
                                <a target="_blank" href="https://bangladesh.gov.bd/site/view/mservices/মোবাইল সেবা"
                                    class="service-type">
                                    মোবাইল সেবা </a>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 eservice-cat ">
                                <a target="_blank" href="https://bangladesh.gov.bd/site/view/mservices/হেল্পডেস্ক">
                                    <img src="public/eseba_icons/helpdesk.png" alt="" width=""
                                        height=""> </a>
                                <a target="_blank" href="https://bangladesh.gov.bd/site/view/mservices/হেল্পডেস্ক"
                                    class="service-type">
                                    হেল্পডেস্ক </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="home-contact-box">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="google-map-title section-title">
                            <h2>
                                মানচিত্র
                            </h2>
                        </div>
                        <div class="map">
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d468476.44946061267!2d89.5583225053894!3d23.461465033734218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc94e9c3eb014d020!2sFaridpur%20Zilla%20Parishad!5e0!3m2!1sbn!2sbd!4v1600342617126!5m2!1sbn!2sbd"
                                    style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" width="100%"
                                    height="336" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="google-map-title section-title">
                            <h2>
                                মন্তব্য / জিজ্ঞাসা
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-text">
                                    <form method="POST" action="https://zpfaridpur.freelanceritbd.com/feedback_form"
                                        accept-charset="UTF-8" value="PATCH" id="feedback"><input name="_token"
                                            type="hidden" value="mjAssMlxpmvphflC94uMimSgpkNM3VZhVsQmHPto">

                                        <div class="box-body">
                                            <input name="feedback" type="hidden" value="1">
                                            <div class="form-group">

                                                <input required class="form-control" placeholder=" নাম  " name="name"
                                                    type="text">
                                            </div>
                                            <div class="form-group">

                                                <input class="form-control" placeholder=" ইমেইল  " name="email"
                                                    type="text">
                                            </div>
                                            <div class="form-group">

                                                <input required class="form-control" placeholder=" ফোন  " name="phone"
                                                    type="text">
                                            </div>
                                            <div class="form-group">

                                                <textarea required="" class="form-control" placeholder=" আপনার  বার্তা  " name="message" cols="50"
                                                    rows="5" id="message"></textarea>
                                            </div>

                                        </div>

                                        <div class="box-footer">
                                            <input class="btn btn-success" type="submit" value="  ফিডব্যাক  পাঠান ">
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="google-map-title section-title">
                            <h2>
                                যোগাযোগ
                            </h2>
                        </div>
                        <table class="table">
                            <tbody style="font-size: 16px;">
                                <tr>
                                    <td>
                                        <b>চেয়ারম্যান
                                        </b><br>জেলা পরিষদ কার্যালয়, ফরিদপুর ।
                                        <br>মোবাইল : ০১৭১১১৮২৩৬২<br>ই-মেইল:&nbsp;<a title="comillazp@gmail.com"
                                            href="mailto:comillazp@gmail.com"
                                            style="background-color: rgb(255, 255, 255); font-family: kalpurush, "
                                            open="" sans";="" font-size:="" 14px;="" text-align:=""
                                            justify;"="">mshbm50@</a>gmail.com
                                    </td>
                                    <td>
                                        <b>প্রধান নির্বাহী কর্মকর্তা
                                        </b><br>জেলা পরিষদ কার্যালয়, ফরিদপুর ।
                                        <br>মোবাইল : ০১৯১১৭৬৭৩৫৩<br>ই-মেইল:&nbsp;<a title="comillazp@gmail.com"
                                            href="mailto:comillazp@gmail.com"
                                            style="background-color: rgb(255, 255, 255); font-family: kalpurush, "
                                            open="" sans";="" font-size:="" 14px;="" text-align:=""
                                            justify;"="">ceo@zpfaridpur.org</a>
                                    </td>
                                    <td><b>সহকারী প্রকৌশলী</b>
                                        <br>জেলা পরিষদ কার্যালয়, ফরিদপুর ।
                                        <br>মোবাইল : <a href="tel:+8801600000000"
                                            title="Click here to call">০১৭১২২২০৩৭০</a><br>ই-মেইল:&nbsp;<a
                                            title="comillazp@gmail.com" href="mailto:comillazp@gmail.com"
                                            style="background-color: rgb(255, 255, 255); font-family: kalpurush, "
                                            open="" sans";="" font-size:="" 14px;="" text-align:=""
                                            justify;"="">ceo@zpfaridpur.org</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cusjs')
@endsection
