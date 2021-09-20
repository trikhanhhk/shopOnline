@extends('layouts.admin.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{--{{ url('/admin/') }}--}}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="{{url('/admin/products')}}">Sản phẩm</a> <a href="#" class="current">Add
                    Product</a></div>
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
                                  action="{{ url('admin/products/insert-products') }}" name="add_product"
                                  id="add_product" novalidate="novalidate"> {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Thương hiệu</label>
                                    <div class="controls">
                                        <select name="brand_id" id="brand" style="width: 220px;">
                                            <option value='' selected disabled style="display: none"></option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">
                                                    {{$brand->name}}
                                                    {{--<div style="display: flex">
                                                        <img src="{{ asset('/images/Users-logo/'.$brand->image_logo) }}" width="40">
                                                        <strong>{{$brand->name}}</strong>
                                                    </div>--}}
                                                </option>
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
                                                <option value="{{$type_product->id}}">{{$type_product->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tên sản phẩm</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Hệ điều hành</label>
                                    <div class="controls">
                                        <input type="text" name="win" id="system" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">CPU</label>
                                    <div class="controls">
                                        <input type="text" name="cpu" id="cpu" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Màn hình</label>
                                    <div class="controls">
                                        <input type="text" name="manHinh" id="manHinh" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Ram</label>
                                    <div class="controls">
                                        <input type="text" name="ram" id="ram" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Ổ cứng</label>
                                    <div class="controls">
                                        <input type="text" name="oCung" id="hard_drive" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Giá</label>
                                    <div class="controls">
                                        <input type="text" name="unit_price" id="unit_price" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Giá khuyễn mãi</label>
                                    <div class="controls">
                                        <input type="text" name="promotion_price" id="promotion_price" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Số lượng</label>
                                    <div class="controls">
                                        <input type="text" name="discount" id="discount" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Mô tả</label>
                                    <div class="controls">
                                        <textarea type="text" name="description" id="description"  style="height: 300px; width: 500px;resize: none;" required></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Ảnh</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="image" required/>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" value="Thêm sản phẩm" class="btn btn-success">Thêm sản phẩm
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
