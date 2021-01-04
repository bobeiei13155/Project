@extends('layouts.stmininav')
@section('body')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<form action="/Stminishow/SearchColor" method="GET" enctype="multipart/form-data">
<div class="container  font_green">
    <br>
    <h2 class="font_green">ค้นหาข้อมูลสีสินค้า</h2>
    
        <div class="row">
            <div class="col-md-2">
                <input type="text" name="searchCLR" class="form-control" style="width: 200px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
            <div class="col-md-8">
                <div class="countall">รายการข้อมูลทั้งหมด {{$count}} รายการ</div>
            </div>
        </div>

</div>
<div class="container my-2">
    <table class="table">
    <thead class="thead-green">
    <tr class="line">
                <th scope="col">รหัสสีสินค้า</th>
                <th scope="col">ชื่อสีสินค้า</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colors as $color)
            <tr class="font_green">
                <th scope="row">{{$color->Id_Color}}</th>
                <td>{{$color->Name_Color}}</td>
                <td>
                    <a href="/Stminishow/editColor/{{$color->Id_Color}}" class="btn btn-info">แก้ไข</a>
                </td>
                <td>
                    <a href="/Stminishow/deleteColor/{{$color->Id_Color}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">ลบ</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    {{$colors->appends(['searchCLR'=>request()->query('searchCLR')])->links()}}
</div>
</form>
@endsection