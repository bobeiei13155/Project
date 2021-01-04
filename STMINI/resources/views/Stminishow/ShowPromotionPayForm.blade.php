@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
  <h2 class="font_green">ข้อมูลโปรโมชั่นยอดชำระ</h2>
  <form action="/Stminishow/SearchPromotionPay" method="GET">
    <div class="row">
      <div class="col-md-2">
        <input type="text" name="searchPOM" class="form-control" style="width: 200px;">
      </div>
      <div class="col-md-2">
        <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col">
      <a class="btn btn-green my-2 " href="/Stminishow/createPromotionPay">เพิ่มโปรโมชั่นยอดชำระ</a>
    </div>
    <div class="col">
      <div class="countall">รายการข้อมูลทั้งหมด {{$promotionpaycount}} รายการ</div>
    </div>
  </div>

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
      @foreach($promotionpays as $promotionpay)
      <tr>

        <td scope="row">{{$promotionpay->Id_Promotion}}</td>
        <td>{{$promotionpay->Name_Promotion}}</td>
        <td>
          @foreach($promotion_payments as $promotion_payment)
          @if($promotionpay->Id_Promotion == $promotion_payment->Id_Promotion)
          {{number_format($promotion_payment->Payment_Amount,2)}}
          @endif
          @endforeach
        </td>
        <td>{{$promotionpay->Sdate_Promotion}}</td>
        <td>{{$promotionpay->Edate_Promotion}}</td>


        <td>
          <a href="/Stminishow/editPromotionPay/{{$promotionpay->Id_Promotion}}" class="btn btn-info">แก้ไข</a>
        </td>
        <td>
          <a href="/Stminishow/deletePromotionPay/{{$promotionpay->Id_Promotion}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">ลบ</a>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>

  {{$promotionpays->links()}}

</div>
@endsection