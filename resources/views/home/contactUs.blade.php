@extends("layouts.home.index")

@section("content")

    <div class="page-head_agile_info_w3l">

    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{route('index')}}">Home</a>
                        <i>|</i>
                    </li>
                    <li>Liên hệ</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- contact -->
    <div class="contact py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>L</span>iên
                <span>H</span>ệ
                <span>C</span>húng
                <span>T</span>ôi
            </h3>
            <!-- //tittle heading -->
            <div class="row contact-grids agile-1 mb-5">
                <div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
                    <div class="contact-grid1 text-center">
                        <div class="con-ic">
                            <i class="fas fa-map-marker-alt rounded-circle"></i>
                        </div>
                        <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Địa chỉ</h4>
<p>
                            <label>Tân Triều, Thanh Trì</label>
</p>
                    </div>
                </div>
                <div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
                    <div class="contact-grid1 text-center">
                        <div class="con-ic">
                            <i class="fas fa-phone rounded-circle"></i>
                        </div>
                        <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Điện thoại</h4>
                        <p>+333 222 3333
                            <label>+222 11 4444</label>
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 contact-grid agileinfo-6">
                    <div class="contact-grid1 text-center">
                        <div class="con-ic">
                            <i class="fas fa-envelope-open rounded-circle"></i>
                        </div>
                        <h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Email</h4>
                        <p>
                            <a href="mailto:info@example.com">thakhacontact@gmail.com</a>
                            <label>
                                <a href="mailto:info@example.com">thakhahelpme@gmail.com</a>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
            <!-- form -->
            <form action="#" method="post">
                <div class="contact-grids1 w3agile-6">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 contact-form1 form-group">
                            <label class="col-form-label">Tên</label>
                            <input type="text" class="form-control" name="Name" placeholder="" required="">
                        </div>
                        <div class="col-md-6 col-sm-6 contact-form1 form-group">
                            <label class="col-form-label">E-mail</label>
                            <input type="email" class="form-control" name="Email" placeholder="" required="">
                        </div>
                    </div>
                    <div class="contact-me animated wow slideInUp form-group">
                        <label class="col-form-label">Ý kiến quý khách</label>
                        <textarea name="Message" class="form-control" placeholder="" required=""> </textarea>
                    </div>
                    <div class="contact-form">
                        <input type="submit" value="Gửi">
                    </div>
                </div>
            </form>
            <!-- //form -->
        </div>
    </div>
    <!-- //contact -->

    <!-- map -->
    <div class="map mt-sm-0 mt-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2949344038475!2d105.79403981476239!3d20.98081138602441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc508f938fd%3A0x883e474806a2d1f2!2zSOG7jWMgVmnhu4duIEvhu7kgVGh14bqtdCBN4bqtdCBNw6M!5e0!3m2!1svi!2s!4v1630185908567!5m2!1svi!2s"
                allowfullscreen></iframe>

    </div>
    <!-- //map -->

    <!-- middle section -->
{{--    <div class="join-w3l1 py-sm-5 py-4">--}}
{{--        <div class="container py-xl-4 py-lg-2">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="join-agile text-left p-4">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-7 offer-name">--}}
{{--                                <h6>Smooth, Rich & Loud Audio</h6>--}}
{{--                                <h4 class="mt-2 mb-3">Branded Headphones</h4>--}}
{{--                                <p>Sale up to 25% off all in store</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-5 offerimg-w3l">--}}
{{--                                <img src="images/off1.png" alt="" class="img-fluid">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 mt-lg-0 mt-5">--}}
{{--                    <div class="join-agile text-left p-4">--}}
{{--                        <div class="row ">--}}
{{--                            <div class="col-sm-7 offer-name">--}}
{{--                                <h6>A Bigger Phone</h6>--}}
{{--                                <h4 class="mt-2 mb-3">Smart Phones 5</h4>--}}
{{--                                <p>Free shipping order over $100</p>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-5 offerimg-w3l">--}}
{{--                                <img src="images/off2.png" alt="" class="img-fluid">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
