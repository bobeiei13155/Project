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
    <h2>แก้ไข รุ่นรถ </h2>
    <form action="/Stminishow/updateCarmodel/{{$carmodel->Id_Carmodel}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Carmodel">ชื่อรุ่นรถ</label>
                    <input type="text" class="form-control" name="Name_Carmodel" id="Name_Carmodel" value="{{$carmodel->Name_Carmodel}}">
                </div>
                <div class="col-md-3">
                <label for="Gen_Id" class="font_green">GEN</label>
                <div class="form-group">
                    <select name="Gen_Id" id="Gen" class="form-control">
                        <option value="" selected>เลือกGEN</option>
                        @foreach($gens as $gen)
                        <option value="{{$gen->Id_Gen}}">{{$gen->Name_Gen}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">อัปเดต</button>
        <a class="btn btn-danger my-2" href="/Stminishow/createCarmodel">กลับ</a>
    </form>
</div>
@endsection