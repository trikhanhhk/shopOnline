@extends('layouts.admin.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{--{{ url('/admin/') }}--}}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="#">Người dùng</a> <a href="#" class="current">Sửa thông tin</a></div>
            <h1>Sửa thông tin</h1>

        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Sửa thông tin người dùng</h5>
                        </div>
                        <div class="widget-content nopadding">
                            @include('flash_message')

                            <form class="form-horizontal" method="post"
                                  action="{{ url('admin/users/update/'.$userDetails->id) }}" name="edit_user"
                                  id="edit_user"
                                  novalidate="novalidate"> {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Vai trò</label>
                                    <div class="controls">
                                        <select name="role_id" id="role" style="width: 220px;">
                                            <option value='' disabled></option>
                                            @foreach($roles as $role)
                                                @if($role->id == $userDetails->role_id)
                                                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                @else
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
{{--                                <div class="control-group" id="permission">--}}
{{--                                    <label class="control-label">Quyền người dùng</label>--}}
{{--                                    @foreach($roles as $role)--}}
{{--                                        <div class="controls" id="{{$role->id}}_role"--}}
{{--                                             @if($role->id == $userDetails->role_id)--}}
{{--                                                style="display: block"--}}
{{--                                             @else--}}
{{--                                                style="display: none"--}}
{{--                                            @endif--}}
{{--                                        >--}}
{{--                                            @foreach($rolePermissions as $rolePermission)--}}
{{--                                                @if($role->id == $rolePermission->role_id)--}}
{{--                                                    @foreach($permissions as $permission)--}}
{{--                                                        @if($rolePermission->permission_id == $permission->id)--}}
{{--                                                            <div style="display: flex">--}}
{{--                                                                <input type="checkbox" name="permission"--}}
{{--                                                                       id="{{$role->id}}_{{$permission->id}}"--}}
{{--                                                                       value="{{$permission->id}}"/> <label--}}
{{--                                                                    for="{{$role->id}}_{{$permission->id}}">{{$permission->name}}</label>--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
                                <div class="control-group">
                                    <label class="control-label">Tên người dùng</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" value="{{$userDetails->name}}" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Mật khẩu</label>
                                    <div class="controls">
                                        <span style="color: grey">Nếu không thay đổi thì để trống mật khẩu</span><br>
                                        <input type="password" name="password" id="password" required/>
                                        <div style="display: flex">
                                            <input type="checkbox" name="show-pass"
                                                   id="show-pass" value=""/>
                                            <label for="show-pass">Hiện mật khẩu</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"></label>
                                    <div class="controls">

                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="text" name="email" id="email"  value="{{$userDetails->email}}" required/>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" value="" class="btn btn-success">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
