@extends('layouts.admin.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{--{{ url('/admin') }}--}}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="#">AddUser</a> <a href="#" class="current">Edit
                    Brand</a></div>
            <h1>AddUser</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Brand</h5>
                        </div>
                        <div class="widget-content nopadding">
                            @include('flash_message')

                            <form class="form-horizontal" method="post" enctype="multipart/form-data"
                                  action="{{ url('admin/brands/update/'.$brandDetails->id) }}" name="edit_Brand"
                                  id="edit_Brand" novalidate="novalidate"> {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Tên thương hiệu</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="Brand_name"
                                               value="{{ $brandDetails->name }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Logo thương hiệu</label>
                                    <div class="controls">
                                        <img src="{{ asset('/images/brands-logo/'.$brandDetails->logo) }}" width="40px">
                                        <input type="file" name="logo" id="logo">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Mô tả thương hiệu</label>
                                    <div class="controls">
                                        <textarea type="text" name="description" id="description"  style="height: 300px; width: 500px;resize: none;" required>{{$brandDetails->description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
