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
    <h2>แก้ไขลาย </h2>
    <form action="/Stminishow/updatePattern/{{$patterns->Id_Pattern}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Pattern">ชื่อลาย</label>
                    <input type="text" class="form-control" name="Name_Pattern" id="Name_Pattern" value="{{$patterns->Name_Pattern}}">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">อัปเดต</button>
        <a class="btn btn-danger my-2" href="/Stminishow/createPattern">กลับ</a>
    </form>
</div>
@endsection