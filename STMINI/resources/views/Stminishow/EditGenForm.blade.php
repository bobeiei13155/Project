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
    <h2>แก้ไขข้อมูลGEN </h2>
    <form action="/Stminishow/updateGen/{{$gens->Id_Gen}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Gen">ชื่อGEN</label>
                    <input type="text" class="form-control" name="Name_Gen" id="Name_Gen" value="{{$gens->Name_Gen}}">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">แก้ไข</button>
        <a class="btn btn-danger my-2" href="/Stminishow/createGen">กลับ</a>
    </form>
</div>
@endsection