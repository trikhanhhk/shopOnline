<!--Header-part-->
<div id="header">
  <h1><a href="{{--{{ url('/admin/dashboard') }}--}}">Trang quản trị</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""><a title="" href="{{--{{ url('/admin/settings') }}--}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
      @if(\Illuminate\Support\Facades\Auth::check())
      <li class=""><a title="" href="{{--{{ url('/admin/settings') }}--}}">{{--<img style="line-height: 20px" width="20px" height="20px" src="{{asset('/images/icon/user-icon-24.png')}}">--}}<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg> <span class="text">Hi! {{Auth::user()->name}}</span></a></li>
      <li class=""><a title="" href="{{ url('admin/logout')}}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
      @endif
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
