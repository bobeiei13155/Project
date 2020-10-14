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
<div class="container ">
    <br>
    <h2 class="font_green">แก้ไขตำแหน่ง</h2>
    <form action="/Stminishow/updatePosition/{{$position->Id_Position}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">

                <p id="demo"></p>
                <div class="col-md-4">
                    <label for="Name_Position" class="font_green">ชื่อตำแหน่ง</label>
                    <input type="text" class="form-control" name="Name_Position" id="Name_Position" value="{{$position->Name_Position}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="all" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label font_green" for="inlineCheckbox1">ทั้งหมด</label>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-check form-check-inline">


                    <input class="form-check-input" type="checkbox" name="employee" id="inlineCheckbox2" @if($employee==1) checked @endif>

                    <label class="form-check-label font_green" for="inlineCheckbox2">ข้อมูลพนักงาน</label>

                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="position" id="inlineCheckbox3" @if($pmposition==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox3">ข้อมูลตำแหน่ง</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="product" id="inlineCheckbox4" @if($product==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox4">ข้อมูลสินค้า</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="partner" id="inlineCheckbox5" @if($partner==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox5">ข้อมูลบริษัทคู่ค้า</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="member" id="inlineCheckbox6" @if($member==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox6">ข้อมูลลูกค้า</label>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="promotion" id="inlineCheckbox7" @if($promotion==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox7">ข้อมูลลูกค้า</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="premiumpro" id="inlineCheckbox8" @if($premiumpro==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox8">ข้อมูลของแถม</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="offerorder" id="inlineCheckbox9" @if($offerorder==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox9">เสนอสั่งซื้อสินค้า</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="approveorder" id="inlineCheckbox10" @if($approveorder==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox10">อนุมัติสั่งซื้อสินค้า</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="order" id="inlineCheckbox11" @if($order==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox11">สั่งซื้อสินค้า</label>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="receive" id="inlineCheckbox12" @if($receive==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox12">รับสินค้า</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sell" id="inlineCheckbox13" @if($sell==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox13">ขายสินค้า</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="Claim" id="inlineCheckbox14" @if($Claim==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox14">เคลมสินค้า</label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="report" id="inlineCheckbox15" @if($report==1) checked @endif>
                    <label class="form-check-label font_green" for="inlineCheckbox15">ออกรายงาน</label>
                </div>
            </div>
        </div>

        <br>
        <button type="submit" name="submit" class="btn btn-success">แก้ไข</button>

        <a class="btn btn-danger my-2" href="/Stminishow/showPosition">กลับ</a>
    </form>

</div>
@endsection