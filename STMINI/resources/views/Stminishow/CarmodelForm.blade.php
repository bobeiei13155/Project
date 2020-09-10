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
<form action="/Stminishow/SearchCarmodel" method="GET" enctype="multipart/form-data">
    <div class="container  font_green">
        <br>
        <h2 class="font_green">ข้อมูลประเภทสินค้า</h2>

        <div class="row">
            <div class="col-md-2">
                <input type="text" name="searchCMD" class="form-control" style="width: 200px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</form>
<div class="container font_green">
    <form action="/Stminishow/createCarmodel" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group font_green" >
            <div class="row ">
                <div class="col-md-5 ">
                    <label for="Name_Carmodel" class="font_green">ชื่อรุ่นรถ</label>
                    <input type="text" class="form-control" name="Name_Carmodel" id="Name_Carmodel" placeholder="ชื่อรุ่นรถ">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">เพิ่ม</button>
    </form>
</div>
<div class="container my-2 ">
<table class="table ">
  <thead class="thead-green">
    <tr class="line">
      <th scope="col">รหัสประเภทสินค้า</th>
      <th scope="col">ชื่อรุ่นรถ</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
  @foreach($carmodels as $carmodel) 
      <tr class="font_green">
      <th scope="row">{{$carmodel->Id_Carmodel}}</th>
      <td>{{$carmodel->Name_Carmodel}}</td>
      <td>
          <a href="/Stminishow/editCarmodel/{{$carmodel->Id_Carmodel}}" class ="btn btn-info">Edit</a>
      </td>
      <td>
          <a href="/Stminishow/deleteCarmodel/{{$carmodel->Id_Carmodel}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class ="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$carmodels->links()}}
</div>

@endsection