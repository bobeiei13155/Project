@extends('layouts.stmininav')
@section('body')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container font_green">
    <br>
    <h2>แก้ไขประเภทสินค้า </h2>
    <form action="/Stminishow/updateCategorymember/{{$categorymembers->Id_Cmember}}" method="post">
        {{csrf_field()}}
        <div class="form-group font_green">
            <div class="row ">
                <div class="col-md-5 ">
                    <label for="Name_Cmember" class="font_green">ชื่อประเภทลูกค้า </label>
                    <input type="text" class="form-control" name="Name_Cmember" id="Name_Cmember" placeholder="ชื่อประเภทลูกค้า" value="{{$categorymembers->Name_Cmember}}">
                </div>
                <div class="col-md-2 ">
                    <label for="Discount_Cmember" class="font_green">จำนวนส่วนลดลูกค้า <i style="font-size: 20px;" class="fas fa-percentage"></i> </label>
                    <input type="number" class="form-control" name="Discount_Cmember" id="Discount_Cmember" placeholder="จำนวนเปอร์เซ็น" min="0" max="100" value="{{$categorymembers->Discount_Cmember}}">
                </div>
                
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">อัปเดต</button>
        <a class="btn btn-danger my-2" href="/Stminishow/createCategorymember">กลับ</a>
    </form>
</div>
@endsection