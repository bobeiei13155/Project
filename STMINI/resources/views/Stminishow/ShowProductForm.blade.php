@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
  <h2 class="font_green">ข้อมูลสินค้า</h2>
  <form action="/Stminishow/SearchPRO" method="GET" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-2">
        <input type="text" name="searchPRO" class="form-control" style="width: 200px;">
      </div>
      <div class="col-md-2">
        <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
      </div>
    </div>

    <a class="btn btn-green my-2 " href="/Stminishow/createProduct">เพิ่มสินค้า</a>
    <table class="table">
      <thead class="thead-green">
        <tr class="line">
          <th scope="col">รหัสสินค้า</th>
          <th scope="col">ชื่อสินค้า</th>
          <th scope="col">ประเภทสินค้า</th>
          <th scope="col">ยี่ห้อ</th>
          <th scope="col">Gen</th>
          <th scope="col">ราคาขาย</th>
          <th scope="col">รูป</th>
          <th scope="col">แก้ไข</th>
          <th scope="col">ลบ</th>
        </tr>
      </thead>

      <tbody class="font_green">
        @foreach($products as $product)
        <tr>

          <td scope="row" style="vertical-align:middle">{{$product->Id_Product}}</td>
          <td style="vertical-align:middle">{{$product->Name_Product}}</td>
          <td style="vertical-align:middle">
            @foreach($categories as $category)
            @if($product->Category_Id == $category->Id_Category)
            {{$category->Name_Category}}
            @endif
            @endforeach
          </td>
          <td style="vertical-align:middle">
            @foreach($brands as $brand)
            @if($product->Brand_Id == $brand->Id_Brand)
            {{$brand->Name_Brand}}
            @endif
            @endforeach
          </td>
          <td style="vertical-align:middle">
            @foreach($gens as $gen)
            @if($product->Gen_Id == $gen->Id_Gen)
            {{$gen->Name_Gen}}
            @endif
            @endforeach
          </td>
          <td style="vertical-align:middle">
            {{$product->Price}}
          </td>
          <td style="vertical-align:middle">
            <img src="{{asset('storage')}}/Products_image/{{$product->Img_Product}}" alt="" width="80px" height="80px">
          </td>


          <td style="vertical-align:middle">
            <a href="/Stminishow/editProduct/{{$product->Id_Product}}" class="btn btn-info">Edit</a>
          </td>
          <td style="vertical-align:middle"> 
            <a href="/Stminishow/deleteProduct/{{$product->Id_Product}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </form>
</div>
@endsection