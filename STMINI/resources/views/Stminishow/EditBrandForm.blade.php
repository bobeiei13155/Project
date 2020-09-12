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
    <h2>แก้ไขยี่ห้อ </h2>
    <form action="/Stminishow/updateBrand/{{$brands->Id_Brand}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Brand">ชื่อยี่ห้อสินค้า</label>
                    <input type="text" class="form-control" name="Name_Brand" id="Name_Brand" value="{{$brands->Name_Brand}}">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">อัปเดต</button>
        <a class="btn btn-danger my-2" href="/Stminishow/createBrand">กลับ</a>
    </form>
</div>
@endsection