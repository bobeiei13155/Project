@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
    <h2 class="font_green">ค้นหาข้อมูลโปรโมชั่นของแถม</h2>
    <form action="/Stminishow/SearchPromotionPro" method="GET">
        <div class="row">
            <div class="col-md-2">
                <input type="text" name="searchPOP" class="form-control" style="width: 200px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <a class="btn btn-green my-2 " href="/Stminishow/createPromotionPro">เพิ่มโปรโมชั่นของแถม</a>
    <table class="table">
        <thead class="thead-green">
            <tr class="line">
                <th scope="col">รหัสโปรโมชั่น</th>
                <th scope="col">ชื่อโปรโมชั่น</th>
                <th scope="col">ชื่อสินค้าที่มีของแถม</th>
                <th scope="col">วันเริ่มต้น</th>
                <th scope="col">วันสิ้นสุด</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
            </tr>
        </thead>

        <tbody class="font_green ">
            
            @foreach($promotions as $promotion)
            <td>
                {{$promotion->Id_Promotion}}
            </td>
            <td>
                {{$promotion->Name_Promotion}}
            </td>
            <td>
              
                @foreach($products as $product)
                @foreach($promotion_prods as $promotion_prod)
                @if($promotion->Id_Promotion == $promotion_prod->Id_Promotion && $promotion_prod->Id_Product == $product->Id_Product)
                {{$product->Name_Product}}
                @endif
                @endforeach
                @endforeach
            </td>
            <td>
                {{$promotion->Sdate_Promotion}}
            </td>
            <td>
                {{$promotion->Edate_Promotion}}
            </td>
            <td>

                <a href="/Stminishow/editPromotionPro/{{$promotion->Id_Promotion}}" class="btn btn-info">แก้ไข</a>
            </td>


            <td>
                <a href="/Stminishow/deletePromotionPro/{{$promotion->Id_Promotion}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">ลบ</a>
            </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    {{$promotions->appends(['searchPOP'=>request()->query('searchPOP')])->links()}}
</div>
@endsection