@if(Auth::user()->hasAnyRole(['manager']))
<!DOCTYPE html>
<html lang="en">
<head>
<title>Trang quản trị</title>
<meta charset="UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/matrix-media.css') }}" />
<link href="{{ asset('fonts/admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/admin/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

@include('layouts.admin.admin_header')

@include('layouts.admin.admin_sidebar')

@yield('content')

@include('layouts.admin.admin_footer')

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/admin/select2.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.validate.js') }}"></script>
<script src="{{ asset('js/admin/matrix.js') }}"></script>
<script src="{{ asset('js/admin/matrix.form_validation.js') }}"></script>
<script src="{{ asset('js/admin/matrix.tables.js') }}"></script>
<script src="{{ asset('js/admin/matrix.popover.js') }}"></script>
<script>
    let role = "";
    let id_permission = "";
    $(document).ready(function () {
        $("#role").change(function () {
            let allPermission = $('input[name="permission"]');
            allPermission.prop( "checked", false);
            let divElm = $("#permission .controls");
            for (let i=0; i<divElm.length; i++) {
                divElm[i].style.display = "none";
            }
            let role = this.value;
            id_permission = role + "_role";
            $("#" + id_permission).css("display", "block");
        });
        $("#show-pass").change(function () {
            if($(this).prop("checked") == true){
                $('input[name="password"]')[0].type = "text";
                $('input[name="repeat_pass"]')[0].type = "text";
            }else {
                $('input[name="password"]')[0].type = "password";
                $('input[name="repeat_pass"]')[0].type = "password";
            }
        });

        $(".status-bill").change(function () {
            let name = this.name;
            let id = name.split("_")[1];
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:'POST',
                url:'/admin/bills/update/' + id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    "status" : this.value.toString(),
                    "_token" : _token,
                },
                success:function(data) {
                    console.log(data);
                }
            });
        });

        $(".role_user").change(function () {
            let name = this.name;
            let id = name.split("_")[1];
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:'POST',
                url:'users/update-role/' + id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                    "role_id" : this.value.toString(),
                    "_token" : _token,
                },
                success:function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>
</body>
</html>
@endif
