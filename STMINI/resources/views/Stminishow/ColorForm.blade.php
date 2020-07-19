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
    <h2>เพิ่มสี</h2>
    <form action="/Stminishow/createColor" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Color">ชื่อสี</label>
                    <input type="text" class="form-control" name="Name_Color" id="Name_Color" placeholder="ชื่อสี">
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
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อสี</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
  @foreach($colors as $color) 
      <tr>
      <th scope="row">{{$color->Id_Color}}</th>
      <td>{{$color->Name_Color}}</td>
      <td>
          <a href="/Stminishow/editColor/{{$color->Id_Color}}" class ="btn btn-info">Edit</a>
      </td>
      <td>
          <a href="/Stminishow/deleteColor/{{$color->Id_Color}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class ="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection