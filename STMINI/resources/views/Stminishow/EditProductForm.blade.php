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
<div class="container ">
    <br>
    <h2 class="font_green">แก้ไขสินค้า</h2>
    <form action="/Stminishow/updateProduct/{{$products->Id_Product}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row ">
                <div class="col-md-4">
                    <label for="Name_Product" class="font_green">ชื่อสินค้า</label>
                    <input type="text" class="form-control" name="Name_Product" id="Name_Product" value="{{$products->Name_Product}}">
                </div>
                <div class="col-md-2">
                    <label for="Category_Id" class="font_green">ประเภทสินค้า</label>
                    <select class="form-control" name="Category_Id">
                        <option value="{{$products->Category_Id}}">
                            @foreach($categories as $category)
                            @if($products->Category_Id == $category->Id_Category)
                            {{$category->Name_Category}}
                            @endif
                            @endforeach
                        </option>
                        @foreach($categories as $category)
                        <option value="{{$category->Id_Category}}">{{$category->Name_Category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="Brand_Id" class="font_green">ยี่ห้อ</label>
                    <select class="form-control" name="Brand_Id">
                        <option value="{{$products->Brand_Id}}">
                            @foreach($brands as $brand)
                            @if($products->Brand_Id == $brand->Id_Brand)
                            {{$brand->Name_Brand}}
                            @endif
                            @endforeach
                        </option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->Id_Brand}}">{{$brand->Name_Brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="Gen_Id" class="font_green">รุ่นที่ใส่ได้</label>
                    <select class="form-control" name="Gen_Id">
                        <option value="{{$products->Gen_Id}}">
                            @foreach($gens as $gen)
                            @if($products->Gen_Id == $gen->Id_Gen)
                            {{$gen->Name_Gen}}
                            @endif
                            @endforeach
                        </option>
                        @foreach($gens as $gen)
                        <option value="{{$gen->Id_Gen}}">{{$gen->Name_Gen}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="Color_Id" class="font_green">สี</label>
                    <select class="form-control" name="Color_Id">
                        <option value="{{$products->Color_Id}}">
                            @foreach($colors as $color)
                            @if($products->Color_Id == $color->Id_Color)
                            {{$color->Name_Color}}
                            @endif
                            @endforeach
                        </option>
                        @foreach($colors as $color)
                        <option value="{{$color->Id_Color}}">{{$color->Name_Color}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="Pattern_Id" class="font_green">ลาย</label>
                    <select class="form-control" name="Pattern_Id">
                        <option value="{{$products->Pattern_Id}}">
                            @foreach($patterns as $pattern)
                            @if($products->Pattern_Id == $pattern->Id_Pattern)
                            {{$pattern->Name_Pattern}}
                            @endif
                            @endforeach
                        </option>
                        @foreach($patterns as $pattern)
                        <option value="{{$pattern->Id_Pattern}}">{{$pattern->Name_Pattern}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="Insurance" class="font_green">ระยะเวลาประกัน</label>
                    <select class="form-control" name="Insurance">
                        <option value="{{$products->Insurance}}" selected>{{$products->Insurance}}</option>
                        <option value="365">1ปี</option>
                        <option value="730">2ปี</option>
                        <option value="0">ไม่มีประกัน</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="Purchase" class="font_green">จุดสั่งซื้อ</label>
                    <input type="number" class="form-control" name="Purchase" id="Purchase" placeholder="จุดสั่งซื้อ" min="0" value="{{$products->Purchase}}">
                </div>
                <div class="col-md-2">
                    <label for="Price" class="font_green">ราคาขาย</label>
                    <input type="number" class="form-control" name="Price" id="Price" placeholder="ราคาขาย" min="0" value="{{$products->Price}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="image_product" class="font_green">รูปสินค้า</label>
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <br>
                    <div class="row ">
                        <div class="col-md-4 ">
                            <img src="{{asset('storage')}}/Products_image/{{$products->Img_Product}}" alt="" width="150px" height="150px">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Detail" class="font_green">รายละเอียด</label>
                    <textarea class="form-control" id="Detail" rows="4" name="Detail" value="{{$products->Detail}}">{{$products->Detail}} </textarea>
                </div>

            </div>

        </div>

        <button type="submit" name="submit" class="btn btn-success">เพิ่ม</button>

        <a class="btn btn-danger my-2" href="/Stminishow/ShowProduct">กลับ</a>
    </form>
</div>
{{csrf_field()}}
<script type="text/javascript">

</script>
@endsection