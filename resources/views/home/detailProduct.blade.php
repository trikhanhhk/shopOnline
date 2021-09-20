@extends("layouts.home.index")

@section("content")

{{--    <div class="page-head_agile_info_w3l">

    </div>--}}
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
                    <li>Chi tiết sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits py-5">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->

            <!-- //tittle heading -->
            <div class="row">
                <div class="col-lg-5 col-md-8 single-right-left ">
                    <div class="grid images_3_of_2">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="images/si1.jpg" style="display: block">
                                    <div class="thumb-image">
                                        <img src="http://localhost:8000/images/{{$data->image}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                    <h3 class="mb-3">{{$data->name}}</h3>
                    <p class="mb-3">
                        @if($data-> promotion_price!= 0)
                            <span class="item_price">{{number_format($data->promotion_price)}} VND</span>

                            <del class="mx-2 font-weight-light">{{number_format($data->unit_price)}}</del>
                        @else
                            <span class="item_price">{{number_format($data->unit_price)}}</span>
                        @endif

                        <label>Giao hàng miễn phí</label>
                    </p>

                    <div class="product-single-w3l">
                        <p class="my-3">
                            <i class="far fa-hand-point-right mr-2"></i>
                            <label>Thông tin cấu hình</label></p>
                        <ul>
                            <li class="mb-1">
                                RAM: {{$data->ram}}
                            </li>
                            <li class="mb-1">
                                CPU: {{$data->cpu}}
                            </li>
                            <li class="mb-1">
                                Ổ cứng: {{$data->oCung}}
                            </li>
                            <li class="mb-1">
                                Hệ điều hành: {{$data->win}}
                            </li>
                            <li class="mb-1">
                                Màn hình: {{$data->manHinh}}
                            </li>
                        </ul>
                        <p class="my-sm-4 my-3">
                            <i class="">Kho còn: </i> {{$data->discount}} <span>sản phẩm</span>
                        </p>
                    </div>
                    @if($data->discount <= 0)
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <p class="btn btn-primary" style="background-color: grey">Hết hàng</p>
                            <p><i style="color: red">Xin lỗi quý khách, sản phẩm tạm thời hết hàng</i></p>
                        </div>
                    @else
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <a href="#" data-url="{{route('home.addToCart',['id'=>$data->id])}}" class="add-to-cart btn btn-primary">Thêm giỏ hàng</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- //Single Page -->

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
@endsection
