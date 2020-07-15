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
<div class="container">
    <br>
    <h2>เพิ่มประเภทสินค้า</h2>
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
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category) 
      <tr>
      <th scope="row">{{$category->Id_Category}}</th>
      <td>{{$category->Name_Category}}</td>
      <td>
          <a href="/Stminishow/editCategory/{{$category->Id_Category}}" class ="btn btn-info">Edit</a>
      </td>
      <td>
          <a href="/Stminishow/deletePosition/{{$category->Id_Category}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class ="btn btn-danger">Delete</a>
      </td>
    </tr>
      @endforeach
  </tbody>
</table>
</div>
@endsection