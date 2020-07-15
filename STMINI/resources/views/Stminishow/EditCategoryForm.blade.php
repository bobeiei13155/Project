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
<div class="container">
    <br>
    <h2>แก้ไข ประเภทสินค้า </h2>
    <form action="/Stminishow/updateCategory/{{$category->Id_Category}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Category">ชื่อประเภทสินค้า</label>
                    <input type="text" class="form-control" name="Name_Category" id="Name_Category" value="{{$category->Name_Category}}">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">อัปเดต</button>
    </form>
</div>
@endsection