@extends('layouts.admin.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{--{{ url('/admin') }}--}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Products</a> </div>
    <h1>Products</h1>

  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID Sản phẩm</th>
                  <th>Thương hiệu</th>
                  <th>Tên sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Mô tả</th>
                  <th>Giá</th>
                  <th>Giá khuyến mãi</th>
                  <th>Loại sản phẩm</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($products as $product)
                <tr class="gradeX">
                  <td>{{ $product->id }}</td>

                            <td style="width: 250px">
                                <div style="display: flex">
                                    <img src="{{ asset('/images/brands-logo/'.$product->brandLogo()) }}" style="width: 30px;height: 30px;" id="logo_brand{{$product->id}}">
                                    <h4>{{$product->brandName()}}</h4>
                                </div>
                            </td>
                  <td>{{ $product->name }}</td>
                  <td>
                      @if(!empty($product->image))
                      <img src="{{ asset('/images/'.$product->image) }}" style="width:60px;">
                      @endif
                  </td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->unit_price }}</td>
                  <td>{{ $product->promotion_price }}</td>
                    @foreach($type_products as $type_product)
                        @if($product->type_id == $type_product->id)
                            <td>{{$type_product->name}}</td>
                        @endif
                    @endforeach
                  <td>{{ $product->created_at }}</td>
                  <td>{{ $product->updated_at }}</td>
                  <td class="center"><a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a> <a href="{{ url('/admin/products/edit/'.$product->id) }}" class="btn btn-primary btn-mini">Edit</a> <a id="delCat" href="{{ url('admin/products/delete/'.$product->id) }}" class="btn btn-danger btn-mini">Delete</a> </td>
                </tr>
                    <div id="myModal{{ $product->id }}" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>{{ $product->product_name }} Full Details</h3>
                      </div>
                      <div class="modal-body">
                        <p>Product ID: {{ $product->id }}</p>
                          @foreach($type_products as $type_product)
                              @if($product->type_id == $type_product->id)
                                  <p>Loại sản phẩm: {{ $type_product->name}}</p>
                              @endif
                          @endforeach
                          @foreach($brands as $brand)
                              @if($product->brand_id == $brand->id)
                                  <p>Nhà sản xuất: {{ $brand->name}}</p>
                              @endif
                          @endforeach
                        <p><span>CPU: {{$product->cpu}}</span></p>
                        <p><span>RAM: {{$product->ram}}</span></p>
                        <p><span>Ổ Cứng: {{$product->oCung}}</span></p>
                        <p><span>HDH: {{$product->win}}</span></p>
                        <p><span>Man hinh: {{$product->manHinh}}</span></p>
                        <p>Description: {{ $product->description }}</p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                            </svg>
                            Price: {{ $product->unit_price }}
                        </p>
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
