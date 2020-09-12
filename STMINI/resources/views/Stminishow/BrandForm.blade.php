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
<form action="/Stminishow/SearchBrand" method="GET" enctype="multipart/form-data">
    <div class="container  font_green">
        <br>
        <h2 class="font_green">ข้อมูลยี่ห้อสินค้า</h2>

        <div class="row">
            <div class="col-md-2">
                <input type="text" name="searchBND" class="form-control" style="width: 200px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</form>
<div class="container font_green">
    <form action="/Stminishow/createBrand" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group font_green" >
            <div class="row ">
                <div class="col-md-5 ">
                    <label for="Name_Brand" class="font_green">ชื่อยี่ห้อสินค้า</label>
                    <input type="text" class="form-control" name="Name_Brand" id="Name_Brand" placeholder="ชื่อยี่ห้อสินค้า">
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
      <th scope="col">รหัสยี่ห้อสินค้า</th>
      <th scope="col">ชื่อยี่ห้อสินค้า</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
  @foreach($brands as $brand) 
      <tr class="font_green">
      <th scope="row">{{$brand->Id_Brand}}</th>
      <td>{{$brand->Name_Brand}}</td>
      <td>
          <a href="/Stminishow/editBrand/{{$brand->Id_Brand}}" class ="btn btn-info">Edit</a>
      </td>
      <td>
          <a href="/Stminishow/deleteBrand/{{$brand->Id_Brand}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class ="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$brands->links()}}
</div>

@endsection