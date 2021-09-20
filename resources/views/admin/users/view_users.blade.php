@extends('layouts.admin.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"><a href="{{--{{ url('/admin') }}--}}" title="Go to Home" class="tip-bottom"><i
                        class="icon-home"></i> Home</a> <a href="#">User</a> <a href="#" class="current">Tất cả tài
                    khoản</a></div>
            <h1>Tài khoản</h1>

        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>Tất cả User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>ID User</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Lựa chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="gradeX">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div style="display: flex">
                                                <div>
                                                    <input type="radio" @if($user->id == Auth::user()->id || $user->role_id===1) disabled="disabled" @endif class="role_user" name="role-user_{{$user->id}}" @if($user->role_id===1) checked @endif id="admin" value="1"> <label style="margin-left: 28px; margin-top: -17px;" for="admin_{{$user->id}}">Admin</label>
                                                    <input type="radio" @if($user->id == Auth::user()->id || $user->role_id===1) disabled="disabled" @endif class="role_user" name="role-user_{{$user->id}}" @if($user->role_id===2) checked @endif id="user" value="2"> <label style="margin-left: 28px; margin-top: -17px;" for="user_{{$user->id}}">User</label>
                                                    <input type="radio" @if($user->id == Auth::user()->id || $user->role_id===1) disabled="disabled" @endif class="role_user" name="role-user_{{$user->id}}" @if($user->role_id===3) checked @endif id="employee" value="3"> <label style="margin-left: 28px; margin-top: -17px;" for="employee_{{$user->id}}">Employee</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->updated_at}}</td>
                                        <td class="center"><a href="#myModal{{ $user->id }}"
                                                              data-toggle="modal"
                                                              class="btn btn-success btn-mini">View</a> <a
                                                @if($user->role_id===1 && $user->id != Auth::user()->id) style="display: none" @endif
                                                href="{{ url('admin/users/edit/'.$user->id) }}"
                                                class="btn btn-primary btn-mini" >Edit</a> <a id="delCat" @if($user->id == Auth::user()->id || $user->role_id===1) style="display: none" @endif
                                                                                             href="{{ url('/admin/users/delete/'.$user->id) }}"
                                                                                             class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                    <div id="myModal{{ $user->id }}" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                            <h3>{{ $user->name }} Full Details</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tên: {{ $user->name }}</p>
                                            <p><span>email: {{$user->email}}</span></p>
                                            <p><span>Mật khẩu: {{$user->password}}</span></p>
                                            <p><span>Vai trò:  @foreach($roles as $role)
                                                        @if($role->id == $user->role_id)
                                                            {{ $role->name }}
                                                        @endif
                                                    @endforeach</span></p>
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
