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
    <h2>แก้ไข รุ่นรถ </h2>
    <form action="/Stminishow/updateCarmodel/{{$carmodel->Id_Carmodel}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Carmodel">ชื่อรุ่นรถ</label>
                    <input type="text" class="form-control" name="Name_Carmodel" id="Name_Carmodel" value="{{$carmodel->Name_Carmodel}}">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">อัปเดต</button>
    </form>
</div>
@endsection