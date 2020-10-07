@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
  <h2 class="font_green">ข้อมูลโปรโมชั่นยอดชำระ</h2>
  <form action="/Stminishow/SearchEmployee" method="GET">
    <div class="row">
      <div class="col-md-2">
        <input type="text" name="searchEmp" class="form-control" style="width: 200px;">
      </div>
      <div class="col-md-2">
        <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
      </div>
    </div>
  </form>
  <a class="btn btn-green my-2 " href="/Stminishow/createPromotionPay">เพิ่มโปรโมชั่นยอดชำระ</a>
  <table class="table">
    <thead class="thead-green">
      <tr class="line">
        <th scope="col">รหัสโปรโมชั่น</th>
        <th scope="col">ชื่อโปรโมชั่น</th>
        <th scope="col">ยอดชำระ</th>
        <th scope="col">วันเริ่มต้น</th>
        <th scope="col">วันสิ้นสุด</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>
      </tr>
    </thead>

    <tbody class="font_green ">
      @foreach($payment_amounts as $payment_amount)
      <tr>

        <td scope="row">{{$payment_amount->Id_Promotion}}</td>
        <td>{{$payment_amount->Name_Promotion}}</td>
        <td>
          {{number_format($payment_amount->Payment_Amount,2)}}
        </td>
        <td>{{$payment_amount->Sdate_Promotion}}</td>
        <td>{{$payment_amount->Sdate_Promotion}}</td>
        

        <td>
          <a href="/Stminishow/editPromotionPay/{{$payment_amount->Id_Promotion}}" class="btn btn-info">Edit</a>
        </td>
        <td>
          <a href="/Stminishow/deletePromotionPay/{{$payment_amount->Id_Promotion}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>

  {{$payment_amounts->links()}}

</div>
@endsection