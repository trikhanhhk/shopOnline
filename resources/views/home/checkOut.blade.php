@if(Auth::check())
    @extends("layouts.home.index")

@section("content")
    <div class="container">
        <br>
        <br>
        <div style="color: blue;font-size: x-large;font-weight: bold;padding-left: 100px;">
            Đơn hàng: {{number_format($money)}} VND
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('home.createDB') }}">
                {{ csrf_field() }}
                @if(Session::has('TTF'))
                    <script>
                        alert('Không đủ số dư để thanh toán!');
                    </script>
                @endif
                <div class="form-group">

                    <label class="col-form-label" style="color: red;">Tên khách hàng</label>
                    <input type="text" class="form-control" placeholder=" " name="name" required="">
                </div>
                <div class="form-group">

                    <label class="col-form-label" style="color: red;">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control" placeholder=" " name="address" required="">
                </div>
                <div class="form-group">

                    <label class="col-form-label" style="color: red;">Số điện thoại</label>
                    <input type="text" class="form-control" placeholder=" " name="phone" required="">
                </div>
                <div class="form-group">

                    <label class="col-form-label" style="color: red;">Ghi chú</label>
                    <input type="text" class="form-control" placeholder=" " name="note" required="">
                </div>
                <div class="form-group">
                    <label class="col-form-label" style="color: red;">Hình thức thanh toán</label>
                </div>
                <div class="form-group">
                    <input required="" name="thanhToan" type="radio" id="tienmat" value="tienMat"/><label for="tienmat">Tiền mặt</label>
                </div>
                <div class="right-w3l">
                    <input type="submit" class="form-control" value="Thanh toán">
                </div>

            </form>
        </div>
    </div>
@endsection
@endif
