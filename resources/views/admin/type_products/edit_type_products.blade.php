@extends('layouts.admin.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{--{{ url('/admin') }}--}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">AddUser</a> <a href="#" class="current">Add Brand</a> </div>
            <h1>Loại sản phẩm</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Chỉnh sửa</h5>
                        </div>
                        <div class="widget-content nopadding">
                            @include('flash_message')

                            <form class="form-horizontal" method="post" action="{{ url('admin/type-products/update/'.$typeProductDetails->id) }}" name="add_type_product" id="add_type_product" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Tên loại sản phẩm</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="type_product_name" value="{{$typeProductDetails->name}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Mô tả</label>
                                    <div class="controls">
                                        <textarea name="description" id="description_type_product" style="height: 300px; width: 500px;resize: none;" required>
                                            {{$typeProductDetails->description}}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Add Brand" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
