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
<form action="/Stminishow/SearchCategory" method="GET" enctype="multipart/form-data">
<div class="container  font_green">
    <br>
    <h2 class="font_green">ค้นหาข้อมูลประเภทสินค้า</h2>
    
        <div class="row">
            <div class="col-md-2">
                <input type="text" name="searchCRP" class="form-control" style="width: 200px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
        </div>

</div>
<div class="container my-2">
    <table class="table">
        <thead class="thead-green">
            <tr class="line">
                <th scope="col">รหัสประเภทสินค้า</th>
                <th scope="col">ชื่อประเภทสินค้า</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
            <tr class=" font_green ">
                <th scope="row">{{$category->Id_Category}}</th>
                <td>{{$category->Name_Category}}</td>
                <td>
                    <a href="/Stminishow/editCategory/{{$category->Id_Category}}" class="btn btn-info">Edit</a>
                </td>
                <td>
                    <a href="/Stminishow/deleteCategory/{{$category->Id_Category}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>


    </table>

</div>
</form>
@endsection