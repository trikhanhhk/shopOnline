@extends('layouts.admin.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/admin') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Đơn hàng</a> <a href="#" class="current">Tất cả đơn hàng</a> </div>
            <h1>Đơn hàng</h1>

        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Chi tiết hóa đơn</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>Bill ID</th>
                                    <th>Mã Khách hàng</th>
                                    <th>Họ tên</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Hình thức thanh toán</th>
                                    <th>Địa chỉ gửi hàng</th>
                                    <th>Lưu ý</th>
                                    <th>Trạng thái</th>
                                    <th>Lựa chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bills as $bill)
                                <tr class="gradeX">
                                    <td>{{ $bill->id }}</td>
                                    <td>{{ $bill->customer_id }}</td>
                                    @foreach($customers as $customer)
                                        @if($customer->id == $bill->customer_id)
                                        <td>{{ $customer->name }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $bill->date_order }}</td>
                                    <td>{{ $bill->quantity }}</td>
                                    <td>{{ $bill->total }}</td>
                                    <td>{{ $bill->payment }}</td>
                                    @foreach($customers as $customer)
                                        @if($customer->id == $bill->customer_id)
                                            <td>{{ $customer->address}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $bill->note }}</td>
                                    <td>
                                        <div style="display: flex">
                                            <div>
                                                <input type="radio" class="status-bill" name="status-bill_{{$bill->id}}" @if($bill->status==="0") checked @endif id="listen-validate" value="0"> <label style="margin-left: 28px; margin-top: -17px;" for="listen-validate">Chờ xác nhận</label>
                                                <input type="radio" class="status-bill" name="status-bill_{{$bill->id}}" @if($bill->status==="1") checked @endif id="trasport" value="1"> <label style="margin-left: 28px; margin-top: -17px;" for="trasport">Vận chuyển</label>
                                                <input type="radio" class="status-bill" name="status-bill_{{$bill->id}}" @if($bill->status==="2") checked @endif id="bill-success" value="2"> <label style="margin-left: 28px; margin-top: -17px;" for="bill-success">Thành công</label>
                                                <input type="radio" class="status-bill" name="status-bill_{{$bill->id}}" @if($bill->status==="3") checked @endif id="bill-failure" value="3"> <label style="margin-left: 28px; margin-top: -17px;" for="bill-failure">Hủy đơn</label>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="line-height: 100px" class="center"><a href="#myModal{{ $bill->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a> <a href="{{--{{ url('/admin/edit-products/'.$product->id) }}--}}" class="btn btn-primary btn-mini">Edit</a> <a id="delCat" href="{{ url('/admin/bills/delete/'.$bill->id) }}" class="btn btn-danger btn-mini">Delete</a> </td>
                                </tr>
                                <div id="myModal{{ $bill->id }}" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>Chi tiết đơn hàng</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>ID đơn hàng: {{ $bill->id }}</p>
                                        <p>Ngày đặt hàng:{{ $bill->date_order }}</p>
                                        @foreach($customers as $customer)
                                            @if($customer->id == $bill->customer_id)
                                                <p>Tên khách hàng: {{$customer->name }}</p>
                                                <p>Email: {{$customer->email }}</p>
                                                <p>SDT: {{$customer->phone }}</p>
                                            @endif
                                        @endforeach
                                        <hr>
                                        @foreach($bill_details as $bill_detail)
                                            @if($bill->id == $bill_detail->bill_id)
                                                @foreach($products as $product)
                                                    @if($product->id == $bill_detail->product_id)
                                                    <p>San pham: {{$product->name}}</p>
                                                    @endif
                                                @endforeach
                                                <p>Giá: {{ $bill_detail->price }}</p>
                                                <p>Số lượng: {{ $bill_detail->quantity }}</p><hr>
                                            @endif
                                        @endforeach
                                        @foreach($customers as $customer)
                                            @if($customer->id == $bill->customer_id)
                                                <p>Địa chỉ nhận hàng: {{ $customer->address}}</p>
                                            @endif
                                        @endforeach
                                        <p>Tổng Tiền: {{$bill->total}}</p>
                                    </div>
                                </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
