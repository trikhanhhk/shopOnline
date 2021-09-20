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
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item item1 active">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>Get flat
                                <span>10%</span> Cashback</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">The
                                <span>Big</span>
                                Sale
                            </h3>
                            {{--                            <a class="button2" href="#">Mua ngay </a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item2">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>advanced
                                <span>Wireless</span> earbuds</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
                                <span>Headphone</span>
                            </h3>
                            {{--                            <a class="button2" href="product.html">Shop Now </a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item3">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>Get flat
                                <span>10%</span> Cashback</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">New
                                <span>Standard</span>
                            </h3>
                            {{--                            <a class="button2" href="product.html">Shop Now </a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item4">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>Get Now
                                <span>40%</span> Discount</p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Today
                                <span>Discount</span>
                            </h3>
                            {{--                            <a class="button2" href="product.html">Shop Now </a>--}}
                        </div>
                    </div>
                </div>
            </div>
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

            <!-- //tittle heading -->
            <div class="row">
                <!-- product left -->
                <div class="agileinfo-ads-display col-lg-12">
                    <div class="wrapper">
                        <!-- first section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                            <h3 class="heading-tittle text-center font-italic">Sản phẩm tìm thấy</h3>
                            <div class="row">
                                @foreach($data as $item)
                                    <div class="col-md-4 product-men mt-5">
                                        <div class="men-pro-item simpleCart_shelfItem">
                                            <div class="men-thumb-item text-center">
                                                <img src="images/{{$item->image}}" alt=""style="height: 300px;width: 250px">
                                                <div class="men-cart-pro">
                                                    <div class="inner-men-cart-pro">
                                                        <a href="{{route('home.detailProduct',$item->id)}}" class="link-product-add-cart">Quick
                                                            View</a>
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
                                                <div
                                                    class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                    <a href="#" data-url="{{route('home.addToCart',['id'=>$item->id])}}" class="add-to-cart btn btn-primary">Thêm giỏ hàng</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- //top products -->

    <!-- middle section -->
    <div class="join-w3l1 py-sm-5 py-4">
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
    </div>
    <!-- middle section -->

    <!-- footer -->

@endsection
