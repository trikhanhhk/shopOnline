@extends('layouts.admin.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{--{{ url('/admin') }}--}}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="#">AddUser</a> <a href="#" class="current">Add Brand</a>
            </div>
            <h1>AddUser</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Brand</h5>
                        </div>
                        <div class="widget-content nopadding">
                            @include('flash_message')

                            <form class="form-horizontal" method="post"
                                  action="{{ url('admin/brands/insert') }}" enctype="multipart/form-data" name="add_Brand" id="add_Brand"
                                  novalidate="novalidate"> {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Brand Name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="Brand_name">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Logo thương hiệu</label>
                                    <div class="controls">
                                        <input type="file" name="logo" id="logo_brand">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Mô tả thương hiệu</label>
                                    <div class="controls">
                                        <textarea type="text" name="description" id="description"  style="height: 300px; width: 500px;resize: none;" required></textarea>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Thêm thương hiệu" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
