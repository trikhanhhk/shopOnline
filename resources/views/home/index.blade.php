@extends("layouts.home.index")

@section("content")
    <!-- //navigation -->
    @if(Session::has('ok'))
        <script>
            alert('Mua hàng thành công !');
        </script>
    @endif
    <!-- banner -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Indicators-->
        <ol class="carousel-indicators">
            @if(count($slides)>=1)
                <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
            @endif
            @if(count($slides)>=2)
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            @endif
            @if(count($slides)>=3)
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            @endif
            @if(count($slides)>=4)
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            @endif
        </ol>
        <div class="carousel-inner" style="background-color: #F2F8FE ">
            @if(count($slides)>=1)
            <div class="carousel-item item1 active" style="background: url('images/{{$slides[0]['image']}}') no-repeat center">
            </div>
            @endif
            @if(count($slides)>=2)
            <div class="carousel-item item2" style="background: url('images/{{$slides[1]['image']}}') no-repeat center">
            </div>
            @endif
            @if(count($slides)>=3)
            <div class="carousel-item item3" style="background: url('images/{{$slides[2]['image']}}') no-repeat center">
            </div>
            @endif
            @if(count($slides)>=4)
            <div class="carousel-item item4" style="background: url('images/{{$slides[3]['image']}}') no-repeat center">
            </div>
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- //banner -->

    <!-- top Products -->
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3" style="color: #0e90d2">
                Sản phẩm mới
            </h3>
            <!-- //tittle heading -->
            <div class="row">
                <!-- product left -->
                <div class="agileinfo-ads-display col-lg-12">
                    <div class="wrapper">
                        <!-- first section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                            <h3 class="heading-tittle text-center font-italic">Điện thoại</h3>
                            <div class="row">
                                @foreach($phones as $phone)
                                    <div class="col-md-4 product-men mt-5" @if($phone->discount<=0) disabled="disabled" style="opacity: 0.8; padding-bottom: 10px" @else style="padding-bottom: 10px" @endif>
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item text-center">
                                                <img src="images/{{$phone->image}}" alt=""style="height: 300px;width: 250px">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="{{route('home.detailProduct',$phone->id)}}" class="link-product-add-cart">Chi tiết</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-info-product text-center border-top mt-4">
                                                <h4 class="pt-1">
                                                    <a href="{{route('home.detailProduct',$phone->id)}}">{{$phone->name}}</a>
                                                </h4>
                                                <div class="info-product-price my-2">
                                                    @if($phone-> promotion_price!= 0)
                                                        <span class="item_price">{{number_format($phone->promotion_price)}}</span>

                                                        <del>{{number_format($phone->unit_price)}}</del>
                                                    @else
                                                        <span class="item_price">{{number_format($phone->unit_price)}}</span>
                                                    @endif
                                                </div>
                                                @if($phone->discount<=0)
                                                    <div class="single-item hvr-outline-out">
                                                        <p class="btn btn-primary" disabled="disabled" style="opacity: 0.6; background-color: grey">Hết hàng</p>
                                                    </div>
                                                @else
                                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                        <a href="#" data-url="{{route('home.addToCart',['id'=>$phone->id])}}" class="add-to-cart btn btn-primary">Thêm giỏ hàng</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                        <!-- //first section -->
                        <!-- second section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                            <h3 class="heading-tittle text-center font-italic">Laptop</h3>
                            <div class="row">
                                @foreach($laptops as $laptop)
                                    <div class="col-md-4 product-men mt-5" @if($laptop->discount<=0) disabled="disabled" style="opacity: 0.8; padding-bottom: 10px" @else style="padding-bottom: 10px" @endif>
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item text-center">
                                                <img src="images/{{$laptop->image}}" style="height: 300px;width: 250px"
                                                     alt="">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="{{route('home.detailProduct',$laptop->id)}}" class="link-product-add-cart">Chi tiết</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-info-product text-center border-top mt-4">
                                                <h4 class="pt-1">
                                                    <a href="{{route('home.detailProduct',$laptop->id)}}">{{$laptop->name}}</a>
                                                </h4>
                                                <div class="info-product-price my-2">
                                                    @if($laptop-> promotion_price!= 0)
                                                        <span class="item_price">{{number_format($laptop->promotion_price)}}</span>

                                                        <del>{{number_format($laptop->unit_price)}}</del>
                                                    @else
                                                        <span class="item_price">{{number_format($laptop->unit_price)}}</span>
                                                    @endif
                                                </div>
                                                @if($laptop->discount<=0)
                                                    <div class="single-item hvr-outline-out">
                                                        <p class="btn btn-primary" disabled="disabled" style="opacity: 0.6; background-color: grey">Hết hàng</p>
                                                    </div>
                                                @else
                                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                        <a href="#" data-url="{{route('home.addToCart',['id'=>$laptop->id])}}" class="add-to-cart btn btn-primary">Thêm giỏ hàng</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- //second section -->
                        <!-- third section -->
                        <div class=" px-sm-5 px-3">
                            <div class="row">
    {{--                            <h3 class="col-md-4 effect-bg">Back to school</h3>
                                <p class="w3l-nut-middle">Giảm giá thêm 10%</p>--}}
                                <div class="col-md-8 bg-right-nut">
                                    <img src="images/637660305811365864_F-C1_1200x300.jpg" alt=""
                                         width="1020px">
                                </div>
                            </div>
                        </div>
                        <!-- //third section -->
                        <!-- fourth section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
                            <h3 class="heading-tittle text-center font-italic">Phụ kiện khác</h3>
                            <div class="row">
                                @foreach($phuKien as $pk)
                                <div class="col-md-4 product-men mt-5" @if($phuKien->discount<=0) disabled="disabled" style="opacity: 0.8; padding-bottom: 10px" @else style="padding-bottom: 10px" @endif>
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img src="images/{{$pk->image}}" alt="" style="height: 300px;width: 250px">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{route('home.detailProduct',$pk->id)}}" class="link-product-add-cart">Chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="product-new-top">New</span>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <h4 class="pt-1">
                                                <a href="{{route('home.detailProduct',$pk->id)}}">{{$pk->name}}</a>
                                            </h4>
                                            <div class="info-product-price my-2">
                                                @if($pk-> promotion_price!= 0)
                                                    <span class="item_price">{{number_format($pk->promotion_price)}}</span>

                                                    <del>{{number_format($pk->unit_price)}}</del>
                                                @else
                                                    <span class="item_price">{{number_format($pk->unit_price)}}</span>
                                                @endif
                                            </div>
                                            @if($phuKien->discount<=0)
                                                <div class="single-item hvr-outline-out">
                                                    <p class="btn btn-primary" disabled="disabled" style="opacity: 0.6; background-color: grey">Hết hàng</p>
                                                </div>
                                            @else
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                    <a href="#" data-url="{{route('home.addToCart',['id'=>$phuKien->id])}}" class="add-to-cart btn btn-primary">Thêm giỏ hàng</a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- //fourth section -->
                    </div>
                </div>
                <!-- //product left -->

                <!-- product right -->
{{--                <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">--}}
{{--                    <div class="side-bar p-sm-4 p-3">--}}
{{--                        <div class="search-hotel border-bottom py-2">--}}
{{--                            <h3 class="agileits-sear-head mb-3">Tìm kiếm tại đây..</h3>--}}
{{--                            <form action="#" method="post">--}}
{{--                                <input type="search" placeholder="Tên sản phẩm..." name="search" required="">--}}
{{--                                <input type="submit" value=" ">--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <!-- price -->--}}
{{--                        <div class="range border-bottom py-2">--}}
{{--                            <h3 class="agileits-sear-head mb-3">Giá sản phẩm</h3>--}}
{{--                            <div class="w3l-range">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Trên 25 triệu</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="my-1">--}}
{{--                                        <a href="#">20 triệu - 25 triệu</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">15 triệu - 20 triệu</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="my-1">--}}
{{--                                        <a href="#">5 triệu - 15 triệu</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Dưới 5 triệu</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- //price -->--}}
{{--                        <!-- discounts -->--}}
{{--                        <div class="left-side border-bottom py-2">--}}
{{--                            <h3 class="agileits-sear-head mb-3">Hãng </h3>--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <input type="checkbox" class="checked">--}}
{{--                                    <span class="span">LENOVO</span>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <input type="checkbox" class="checked">--}}
{{--                                    <span class="span">SAMSUNG</span>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <input type="checkbox" class="checked">--}}
{{--                                    <span class="span">ASUS</span>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <input type="checkbox" class="checked">--}}
{{--                                    <span class="span">OPPO</span>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <input type="checkbox" class="checked">--}}
{{--                                    <span class="span">XIAOMI</span>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <input type="checkbox" class="checked">--}}
{{--                                    <span class="span">HP</span>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="f-grid py-2">--}}
{{--                            <h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>--}}
{{--                            <div class="box-scroll">--}}
{{--                                <div class="scroll">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-3 col-sm-2 col-3 left-mar">--}}
{{--                                            <img src="images/k1.jpg" alt="" class="img-fluid">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">--}}
{{--                                            <a href="">Samsung Galaxy On7 Prime (Gold, 4GB RAM + 64GB Memory)</a>--}}
{{--                                            <a href="" class="price-mar mt-2">$12,990.00</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row my-4">--}}
{{--                                        <div class="col-lg-3 col-sm-2 col-3 left-mar">--}}
{{--                                            <img src="images/k2.jpg" alt="" class="img-fluid">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">--}}
{{--                                            <a href="">Haier 195 L 4 Star Direct-Cool Single Door Refrigerator</a>--}}
{{--                                            <a href="" class="price-mar mt-2">$12,499.00</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-3 col-sm-2 col-3 left-mar">--}}
{{--                                            <img src="images/k3.jpg" alt="" class="img-fluid">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">--}}
{{--                                            <a href="">Ambrane 13000 mAh Power Bank (P-1310 Premium)</a>--}}
{{--                                            <a href="" class="price-mar mt-2">$1,199.00 </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- //best seller -->--}}
{{--                    </div>--}}
{{--                    <!-- //product right -->--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!-- //top products -->

    <!-- middle section -->
{{--    <div class="join-w3l1 py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="join-agile text-left p-4">
                        <div class="row">
                            <div class="col-sm-7 offer-name">
                                <h6>Smooth, Rich & Loud Audio</h6>
                                <h4 class="mt-2 mb-3">Branded Headphones</h4>
                                <p>Sale up to 25% off all in store</p>
                            </div>
                            <div class="col-sm-5 offerimg-w3l">
                                <img src="images/off1.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5">
                    <div class="join-agile text-left p-4">
                        <div class="row ">
                            <div class="col-sm-7 offer-name">
                                <h6>A Bigger Phone</h6>
                                <h4 class="mt-2 mb-3">Smart Phones 5</h4>
                                <p>Free shipping order over $100</p>
                            </div>
                            <div class="col-sm-5 offerimg-w3l">
                                <img src="images/off2.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- middle section -->

    <!-- footer -->

@endsection
