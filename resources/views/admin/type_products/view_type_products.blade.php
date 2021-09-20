@extends('layouts.admin.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{--{{ url('/admin') }}--}}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="#">Loại sản phẩm</a> <a href="#" class="current">Tất cả
                    loại sản phẩm</a></div>
            <h1>AddUser</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>Loại sản phẩm</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Mô tả</th>
                                    <th>Created at</th>
                                    <th>Edited at</th>
                                    <th>Lựa chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($type_products as $type_product)
                                    <tr class="gradeX">
                                        <td>{{ $type_product->id }}</td>
                                        <td>{{ $type_product->name }}</td>
                                        <td>{{ $type_product->description }}</td>
                                        <td>{{ $type_product->created_at }}</td>
                                        <td>{{ $type_product->updated_at }}</td>
                                        <td class="center">
                                            <a href="{{ url('admin/type-products/edit/'.$type_product->id) }}"
                                               class="btn btn-primary btn-mini">Edit</a>
                                            <a id="delType"
                                               href="{{ url('admin/type-products/delete/'.$type_product->id) }}"
                                               class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
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
