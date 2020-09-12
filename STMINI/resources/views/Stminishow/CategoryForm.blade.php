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
<div class="container  font_green">
    <br>
    <h2 class="font_green">ข้อมูลประเภทสินค้า</h2>
    <form action="/Stminishow/SearchCategory" method="GET" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-2">
                <input type="text" name="searchCRP" class="form-control" style="width: 200px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <form action="/Stminishow/createCategory" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Category">ชื่อประเภทสินค้า</label>
                    <input type="text" class="form-control" name="Name_Category" id="Name_Category" placeholder="ชื่อประเภทสินค้า">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">เพิ่ม</button>
    </form>
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
            <tr class="font_green ">
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
    {{$categories->links()}}
</div>
@endsection