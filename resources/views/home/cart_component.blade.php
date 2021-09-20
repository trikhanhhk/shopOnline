<div class="cart_wrapper">
    <div style="height: 100px;width: 100%;"></div>
    <div class="cart delete_cart_url" data-url="{{route('home.deleteCart')}}">
        <div class="container">


            @if($cart != null)
                <div class="row">

                    <table class="table update_cart_url" data-url="{{route('home.updateCart')}}">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $total = 0;
                        @endphp
                        @foreach($cart as $id => $item)
                            @php
                                $total += $item['price']*$item['quantity'];
                            @endphp
                            <tr>
                                <td scope="row">{{$id}}</td>
                                <td><img src="images/{{$item['image']}}" alt="" style="height: 150px;width: 100px"></td>
                                <td>{{$item['name']}}</td>
                                <td>{{number_format($item['price'])}}</td>
                                <td><input type="number" style="width: 70px;" value="{{$item['quantity']}}" min="1"
                                           class="quatity">
                                </td>
                                <td>{{number_format($item['price']*$item['quantity'])}}</td>
                                <td>

                                    <a href="#" data-id="{{$id}}" class="btn btn-primary cart-update">Cập nhật</a>
                                    <a href="#" data-id="{{$id}}" class="btn btn-danger cart-delete">Xóa</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div style="color: blue;font-weight: bold;font-size: x-large;padding-left: 623px;">
                    Tổng tiền : {{number_format($total)}} VND
                </div>
                <br>
                @if(Auth::check())
                    <div style="padding-left: 765px;">
                        <button class="btn btn-primary"><a href="{{route('checkOut')}}" style="color: #FFFFFF">Thanh
                                toán</a></button>
                    </div>
                @else
                    <div style="color: red;font-size: large;text-align: center;">
                        Bạn cần <a href="#" data-toggle="modal" data-target="#exampleModal">Đăng nhập</a> để thanh toán giỏ hàng !
                    </div>
                @endif
            @else
                <div><h2>Giỏ hàng trống !</h2></div>
            @endif
                <br>
                <br>
        </div>

    </div>
</div>
