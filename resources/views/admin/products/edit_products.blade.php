@extends('layouts.admin.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{--{{ url('/admin/') }}--}}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="{{url('/admin/products')}}">Sản phẩm</a> <a href="" class="current">Sửa sản phẩm</a></div>
            <h1>Products</h1>

        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Thêm sản phẩm</h5>
                        </div>
                        <div class="widget-content nopadding">
                            @include('../../flash_message')
                            <form enctype="multipart/form-data" class="form-horizontal" method="post"
                                  action="{{ url('admin/products/update/'.$product->id)}}" name="add_product"
                                  id="add_product" novalidate="novalidate"> {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Nhà sản xuất</label>
                                    <div class="controls">
                                        <select name="brand_id" id="brand_id" style="width: 220px;">
                                            <option value='' selected disabled style="display: none"></option>
                                            @foreach($brands as $brand)
                                                @if($brand->id == $product->brand_id)
                                                    <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                                @else
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Loại sản phẩm</label>
                                    <div class="controls">
                                        <select name="type_id" id="type_id" style="width: 220px;">
                                            <option value='' selected disabled style="display: none"></option>
                                            @foreach($type_products as $type_product)
                                                @if($type_product->id == $product->type_id)
                                                    <option value="{{$type_product->id}}" selected>{{$type_product->name}}</option>
                                                @else
                                                    <option value="{{$type_product->id}}">{{$type_product->name}}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tên sản phẩm</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" value="{{$product->name}}" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Hệ điều hành</label>
                                    <div class="controls">
                                        <input type="text" name="win" id="win" value="{{$product->win}}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">CPU</label>
                                    <div class="controls">
                                        <input type="text" name="cpu" id="cpu" value="{{$product->cpu}}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Màn hình</label>
                                    <div class="controls">
                                        <input type="text" name="manHinh" id="manHinh" value="{{$product->manHinh}}"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Ram</label>
                                    <div class="controls">
                                        <input type="text" name="ram" id="ram" value="{{$product->ram}}"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Ổ cứng</label>
                                    <div class="controls">
                                        <input type="text" name="oCung" id="oCung" value="{{$product->oCung}}"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Giá</label>
                                    <div class="controls">
                                        <input type="text" name="unit_price" id="unit_price" value="{{$product->unit_price}}" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Giá khuyễn mãi</label>
                                    <div class="controls">
                                        <input type="text" name="promotion_price" id="promotion_price" value="{{$product->promotion_price}}" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Số lượng</label>
                                    <div class="controls">
                                        <input type="text" name="discount" value="{{$product->discount}}" id="discount" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Mô tả</label>
                                    <div class="controls">
                                        <textarea type="text" name="description" id="description"  style="height: 300px; width: 500px;resize: none;" >{{$product->description}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Ảnh</label>
                                    <div class="controls">
                                        <img src="{{ asset('/images/'.$product->image) }}">
                                        <input type="file" name="image" id="image" />
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Edit Product" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
