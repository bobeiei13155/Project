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

    <h2 class="font_green">เพิ่มโปรโมชั่นของแถม</h2>
    <form action="/Stminishow/createPromotionPro" method="post" enctype="multipart/form-data">
        {{csrf_field()}}


        <div class="form-group">
            <div class="row">

                <div class="col-md-3">
                    <label for="Name_Promotion" class="font_green">ชื่อโปรโมชั่น</label>
                    <input type="text" class="form-control" name="Name_Promotion" id="Name_Promotion" placeholder="ชื่อโปรโมชั่น">
                </div>
                <div class="col-md-3">
                    <label for="Sdate_Promotion" class="font_green">วันเริ่มต้น</label>
                    <input type="date" class="form-control" name="Sdate_Promotion" id="Sdate_Promotion">
                </div>
                <div class="col-md-3">
                    <label for="Edate_Promotion" class="font_green">วันสิ้นสุด</label>
                    <input type="date" class="form-control" name="Edate_Promotion" id="Edate_Promotion">
                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-borderd" id="costs">
                            <tr>
                                <th class="font_green th1">สินค้าจัดโปรโมชั่น</th>
                            </tr>
                            <tr>
                                <div class="row">
                                    <th>
                                        <div class="col-md form-group">
                                            <select class="form-control" name="Id_Product"   oninvalid="this.setCustomValidity('กรุณากรอกเลือกสินค้าเพื่อจัดโปรโมชั่น')" oninput="setCustomValidity('')" required>
                                                <option value="" selected>เลือกสินค้า </option>
                                                @foreach($products as $product)
                                                <option value="{{$product->Id_Product}}">{{$product->Name_Product}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </th>

                                </div>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderd" id="costs">
                            <tr>
                                <th class="font_green th1">สินค้าของแถม</th>
                            </tr>
                            <tr>
                                <div class="row">
                                    <th>
                                        <div class="col-md form-group">
                                            <select class="form-control" name="Id_Premium_Pro"  oninvalid="this.setCustomValidity('กรุณากรอกเลือกสินค้าของแถมเพื่อจัดโปรโมชั่น')" oninput="setCustomValidity('')" required>
                                                <option value="" selected>เลือกสินค้าของแถม </option>
                                                @foreach($PremiumPros as $PremiumPro)
                                                <option value="{{$PremiumPro->Id_Premium_Pro}}">{{$PremiumPro->Name_Premium_Pro}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </th>

                                </div>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-sm form-group">
            <input type="text" class="form-control" name="cost[]" id="cost" placeholder="จำนวนสินค้า" maxlength="10" onkeypress="return onlyNumberKey(event)">
        </div> -->
        <div class="row">
            <div class="col-md-2">
                <button type="submit" name="submit" id="submit" class="btn btn-success">เพิ่ม</button>

                <a class="btn btn-danger my-2" href="/Stminishow/ShowPromotionPro">กลับ</a>
            </div>
        </div>
    </form>

</div>

{{csrf_field()}}
<script>
    function onlyNumberKey(evt) {


        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

</script>

@endsection