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
    <h2>เพิ่มตำแหน่ง</h2>
    <form action="/Stminishow/createPosition" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Position">ชื่อ ตำแหน่ง</label>
                    <input type="text" class="form-control" name="Name_Position" id="Name_Position" placeholder="Position Name">
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
      <th scope="col">ตำแหน่ง</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
      @foreach($positions as $position) 
      <tr>
      <th scope="row">{{$position->Id_Position}}</th>
      <td>{{$position->Name_Position}}</td>
      <td>
          <a href="/Stminishow/editPosition/{{$position->Id_Position}}" class ="btn btn-info">แก้ไข</a>
      </td>
      <td>
          <a href="/Stminishow/deletePosition/{{$position->Id_Position}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class ="btn btn-danger">ลบ</a>
      </td>
    </tr>
      @endforeach
  </tbody>
</table>
</div>
@endsection