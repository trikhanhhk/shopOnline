@if(Auth::check())
    @extends('layouts.home.index')
@section('content')
    <br>
    <br>
    <div class="container">
        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên hàng</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $index => $item)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td><img src="http://localhost:8000/images/{{$item->image}}" alt="" style="height: 150px;width: 100px"></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{number_format($item->price)}} VND</td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
@endsection
@endif
