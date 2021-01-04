@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
  <h2 class="font_green">ข้อมูลของแถม</h2>
  <form action="/Stminishow/SearchPremiumPro" method="GET" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-2">
        <input type="text" name="searchPMP" class="form-control" style="width: 200px;">
      </div>
      <div class="col-md-2">
        <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
      </div>
    </div>
  
  <a class="btn btn-green my-2 " href="/Stminishow/createPremiumPro">เพิ่มของแถม</a>
  <table class="table">
    <thead class="thead-green">
      <tr class="line">
        <th scope="col">รหัสของแถม</th>
        <th scope="col">ชื่อของแถม</th>
        <th scope="col">รูป</th>
        <th scope="col">จำนวน</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>
      </tr>
    </thead>

    <tbody class="font_green " >
       @foreach($premium_pros as $PremiumPro) 
      <tr >

        <td scope="row"style="vertical-align:middle"  >{{$PremiumPro->Id_Premium_Pro}}</td>
        <td  style="vertical-align:middle" >{{$PremiumPro->Name_Premium_Pro}}</td>
        <td style="vertical-align:middle" >
            <img src="{{asset('storage')}}/PremiumPro_image/{{$PremiumPro->Img_Premium_Pro}}" alt="" width="150px" height="150px">
        </td>
        <td style="vertical-align:middle" >{{$PremiumPro->Amount_Premium_Pro}}</td>
        <td style="vertical-align:middle" >
          <a href="/Stminishow/editPremiumPro/{{$PremiumPro->Id_Premium_Pro}}" class="btn btn-info">แก้ไข</a>
        </td>
        <td style="vertical-align:middle" >
          <a href="/Stminishow/deletePremiumPro/{{$PremiumPro->Id_Premium_Pro}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">ลบ</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  </form>

  {{$premium_pros->appends(['searchPMP'=>request()->query('searchPMP')])->links()}}
</div>
@endsection