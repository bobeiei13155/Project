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
<form action="/Stminishow/SearchGen" method="GET" enctype="multipart/form-data">
    <div class="container  font_green">
        <br>
        <h2 class="font_green">ข้อมูลGEN</h2>

        <div class="row">
            <div class="col-md-2">
                <input type="text" name="searchGEN" class="form-control" style="width: 200px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</form>
<div class="container font_green">
    <form action="/Stminishow/createGen" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group font_green" >
            <div class="row ">
                <div class="col-md-5 ">
                    <label for="Name_Gen" class="font_green">ชื่อGEN</label>
                    <input type="text" class="form-control" name="Name_Gen" id="Name_Gen" placeholder="ชื่อGEN" required>
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
      <th scope="col">รหัสGEN</th>
      <th scope="col">ชื่อGEN</th>
      <th scope="col">แก้ไข</th>
      <th scope="col">ลบ</th>
    </tr>
  </thead>
  <tbody>
  @foreach($gens as $gen) 
      <tr class="font_green">
      <th scope="row">{{$gen->Id_Gen}}</th>
      <td>{{$gen->Name_Gen}}</td>
      <td>
          <a href="/Stminishow/editGen/{{$gen->Id_Gen}}" class ="btn btn-info">แก้ไข</a>
      </td>
      <td>
          <a href="/Stminishow/deleteGen/{{$gen->Id_Gen}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class ="btn btn-danger">ลบ</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$gens->links()}}
</div>

@endsection