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
<div class="container  font_green">
    <br>
    <h2 class="font_green">ค้นหาข้อมูลตำแหน่ง</h2>
    <form action="/Stminishow/SearchPOS" method="GET">
        <div class="row">
            <div class="col-md-2">
                <input type="text" name="searchPOS" class="form-control" style="width: 200px;" pattern="[^'\x22]+" title="Invalid input">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <a class="btn btn-green my-2 " href="/Stminishow/createPosition">เพิ่มตำแหน่ง</a>
</div>
<div class="container my-2 font_green">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">รหัส</th>
                <th scope="col">ตำแหน่ง</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $position)
            <tr>
                <th scope="row">{{$position->Id_Position}}</th>
                <td>{{$position->Name_Position}}</td>
                <td>
                    <a href="/Stminishow/editPosition/{{$position->Id_Position}}" class="btn btn-info">แก้ไข</a>
                </td>
                <td>
                    <a href="/Stminishow/deletePosition/{{$position->Id_Position}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">ลบ</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection