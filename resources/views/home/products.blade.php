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
                    <li>{{$caption}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- top Products -->
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
{{--            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">--}}
{{--                <span>M</span>obiles--}}
{{--                <span>&</span>--}}
{{--                <span>C</span>omputers</h3>--}}
            <!-- //tittle heading -->
            <div class="row">
                <!-- product left -->
                <div class="agileinfo-ads-display col-lg-9">
                    <div class="wrapper">
                        <!-- first section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                            <div class="row">
                                @foreach($data as $item)
                                <div class="col-md-4 product-men" @if($item->discount<=0) disabled="disabled" style="opacity: 0.8; padding-bottom: 10px" @else style="padding-bottom: 10px" @endif>
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img src="http://localhost:8000/images/{{$item->image}}" alt="" style="height: 300px;width: 250px">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{route('home.detailProduct',$item->id)}}" class="link-product-add-cart">Chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <h4 class="pt-1">
                                                <a href="{{route('home.detailProduct',$item->id)}}">{{$item->name}}</a>
                                            </h4>
                                            <div class="info-product-price my-2">
                                                @if($item-> promotion_price!= 0)
                                                <span class="item_price">{{number_format($item->promotion_price)}}</span>

                                                <del>{{number_format($item->unit_price)}}</del>
                                                @else
                                                    <span class="item_price">{{number_format($item->unit_price)}}</span>
                                                @endif

                                            </div>
                                            @if($item->discount<=0)
                                            <div class="single-item hvr-outline-out">
                                                <p class="btn btn-primary" disabled="disabled" style="opacity: 0.6; background-color: grey">Hết hàng</p>
                                            </div>
                                            @else
                                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                    <a href="#" data-url="{{route('home.addToCart',['id'=>$item->id])}}" class="add-to-cart btn btn-primary">Thêm giỏ hàng</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>


                        </div>
{{--                        <div>{{$data->links()}}</div>--}}
                    </div>

                </div>
                <!-- //product left -->
                <!-- product right -->
                <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                    <div class="side-bar p-sm-4 p-3">
                        <form action="{{route('home.typeProduct',$id)}}">
                            <input type="submit" value="Tim kiem">
                        <div class="search-hotel border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">HÃNG</h3>

{{--                                <input type="search" placeholder="Tên hãng..." name="searchBrand" required="">--}}
                                <div class="left-side py-2">
                                    <ul>
                                        @foreach($brand as $item)
                                            <li>
                                                {{--                                        <input type="checkbox" class="checked">--}}
                                                {{--                                        <span class="span">{{$item->description}}</span>--}}
                                                <input  name="brand" type="radio" value="{{$item->id}}"/>{{$item->description}}
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>


                        </div>
                        <!-- ram -->
                        <div class="left-side border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">RAM</h3>
                            <ul>

                                <li>
                                    <input  name="ram" type="radio" value="1"/> 1 GB
                                </li>
                                <li>
                                    <input  name="ram" type="radio" value="2"/> 2 GB
                                </li>
                                <li>
                                    <input  name="ram" type="radio" value="3"/> 3 GB
                                </li>
                                <li>
                                    <input  name="ram" type="radio" value="4"/> 4 GB
                                </li>
                                <li>
                                    <input  name="ram" type="radio" value="6"/> 6 GB
                                </li>
                                <li>
                                    <input  name="ram" type="radio" value="8"/> 8 GB
                                </li>
                                <li>
                                    <input  name="ram" type="radio" value="16"/> 16 GB
                                </li>
                            </ul>
                        </div>
                        <!-- //ram -->
                        <!-- price -->
                        <div class="range border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Giá sản phẩm</h3>
                            <div class="w3l-range">
                                <ul>
                                    <li>
                                        <input  name="tien" type="radio" value="25"/> Trên 25 triệu
                                    </li>
                                    <li class="my-1">
                                        <input  name="tien" type="radio" value="20"/>20 triệu - 25 triệu
                                    </li>
                                    <li>
                                        <input  name="tien" type="radio" value="15"/>15 triệu - 20 triệu
                                    </li>
                                    <li class="my-1">
                                        <input  name="tien" type="radio" value="5"/>5 triệu - 15 triệu
                                    </li>
                                    <li>
                                        <input  name="tien" type="radio" value="1ph"/>Dưới 5 triệu
                                    </li>

                                </ul>
                            </div>
                        </div>
                        </form>
                        <!-- //price -->
                        <!-- discounts -->

                        <!-- //arrivals -->
                    </div>
                    <!-- //product right -->
                </div>
            </div>
        </div>
    </div>
    <!-- //top products -->

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
