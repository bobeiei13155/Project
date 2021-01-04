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
<form action="/Stminishow/SearchPTN" method="GET" enctype="multipart/form-data">
    <div class="container  font_green">
        <br>
        <h2 class="font_green">ค้นหาข้อมูลลาสินค้า</h2>

        <div class="row">
            <div class="col-md-2">
                <input type="text" name="searchPTN" class="form-control" style="width: 200px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
            <div class="col-md-8">
                <div class="countall">รายการข้อมูลทั้งหมด {{$count}} รายการ</div>
            </div>
        </div>
    </div>
</form>

<div class="container my-2 ">
    <table class="table ">
        <thead class="thead-green">
            <tr class="line">
                <th scope="col">รหัสลายสินค้า</th>
                <th scope="col">ชื่อลายสินค้า</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patterns as $pattern)
            <tr class="font_green">
                <th scope="row">{{$pattern->Id_Pattern}}</th>
                <td>{{$pattern->Name_Pattern}}</td>
                <td>
                    <a href="/Stminishow/editPattern/{{$pattern->Id_Pattern}}" class="btn btn-info">Edit</a>
                </td>
                <td>
                    <a href="/Stminishow/deletePattern/{{$pattern->Id_Pattern}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$patterns->appends(['searchPTN'=>request()->query('searchPTN')])->links()}}
</div>  

@endsection