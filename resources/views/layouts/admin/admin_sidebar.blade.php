<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i>Bảng điều khiển</a>
    <ul>
        <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>
        @if(Auth::user()->hasAnyRole(['manager_user']))
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Quản lý tài khoản</span> <span
                    class="label label-important">2</span></a>
            <ul>
                <li><a href="{{ url('/admin/users/add') }}">Thêm tài khoản</a></li>
                <li><a href="{{ url('/admin/users') }}">Tất cả tài khoản</a></li>
{{--                <li><a href="{{ url('/admin/users') }}">Tất cả tài khoản</a></li>--}}
                <li><a href="{{ url('/admin/users/role/1') }}">Supper Admin</a></li>
                <li><a href="{{ url('/admin/users/role/3') }}">Nhân viên</a></li>
                <li><a href="{{ url('/admin/users/role/2') }}">Người dùng thường</a></li>
            </ul>
        </li>
        @endif
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Thương hiệu</span> <span
                    class="label label-important">2</span></a>
            <ul>
                <li><a href="{{ url('/admin/brands/add') }}">Thêm thương hiệu</a></li>
                <li><a href="{{ url('/admin/brands') }}">Tất cả thương hiệu</a></li>
            </ul>
        </li>
{{--        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Loại sản phẩm</span> <span--}}
{{--                    class="label label-important">2</span></a>--}}
{{--            <ul>--}}
{{--                <li><a href="{{ url('/admin/type-products/add') }}">Thêm loại sản phẩm</a></li>--}}
{{--                <li><a href="{{ url('/admin/type-products') }}">Tất cả loại sản phẩm</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Sản phẩm</span> <span
                    class="label label-important">2</span></a>
            <ul>
                <li><a href="{{ url('/admin/products/add') }}">Thêm sản phẩm</a></li>
                <li><a href="{{ url('/admin/products') }}">Tất cả sản phẩm</a></li>
            </ul>
        </li>
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Đơn hàng</span> <span
                    class="label label-important">2</span></a>
            <ul>
                <li><a href="{{ url('/admin/bills') }}">Tất cả đơn hàng</a></li>
                <li><a href="{{ url('/admin/bills/0') }}">Đơn hàng chưa xử lý</a></li>
                <li><a href="{{ url('/admin/bills/1') }}">Đang gửi hàng</a></li>
                <li><a href="{{ url('/admin/bills/2') }}">Đơn hàng thành công</a></li>
                <li><a href="{{ url('/admin/bills/3') }}">Đơn hủy</a></li>
            </ul>
        </li>


    </ul>
</div>
<!--sidebar-menu-->
