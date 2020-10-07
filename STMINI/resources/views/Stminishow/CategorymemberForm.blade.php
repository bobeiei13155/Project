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
<form action="/Stminishow/SearchCategorymember" method="GET" enctype="multipart/form-data">
    <div class="container  font_green">
        <br>
        <h2 class="font_green">ข้อมูลประเภทลูกค้า</h2>

        <div class="row">
            <div class="col-md-2">
                <input type="text" name="SearchCMB" class="form-control" style="width: 200px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
</form>
<div class="container font_green">
    <form action="/Stminishow/createCategorymember" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group font_green">
            <div class="row ">
                <div class="col-md-5 ">
                    <label for="Name_Cmember" class="font_green">ชื่อประเภทลูกค้า </label>
                    <input type="text" class="form-control" name="Name_Cmember" id="Name_Cmember" placeholder="ชื่อประเภทลูกค้า">
                </div>
                <div class="col-md-2 ">
                    <label for="Discount_Cmember" class="font_green">จำนวนส่วนลดลูกค้า <i style="font-size: 20px;" class="fas fa-percentage"></i> </label>
                    <input type="number" class="form-control" name="Discount_Cmember" id="Discount_Cmember" placeholder="ชื่อประเภทลูกค้า" min="0" max="100">
                </div>
                
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success " >เพิ่ม</button>
    </form>
</div>
<div class="container my-2 ">
    <table class="table ">
        <thead class="thead-green">
            <tr class="line">
                <th scope="col">รหัสประเภทลูกค้า</th>
                <th scope="col">ชื่อประเภทลูกค้า</th>
                <th scope="col">ส่วนลดลูกค้า</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorymembers as $categorymember)
            <tr class="font_green">
                <th scope="row">{{$categorymember->Id_Cmember}}</th>
                <td>{{$categorymember->Name_Cmember}}</td>
                <td>{{$categorymember->Discount_Cmember}}</td>
                <td>
                    <a href="/Stminishow/editCategorymember/{{$categorymember->Id_Cmember}}" class="btn btn-info">แก้ไข</a>
                </td>
                <td>
                    <a href="/Stminishow/deleteCategorymember/{{$categorymember->Id_Cmember}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">ลบ</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$categorymembers->links()}}
</div>
<script>
    // $('.fixnum').on('click', function() {
    //     fixnum();
    // });

    // function fixnum() {
    //     var x, text;

    //     // Get the value of the input field with id="numb"
    //     x = document.getElementById("numb").value;

    //     // If x is Not a Number or less than one or greater than 10
    //     if (isNaN(x) || x < 1 || x > 10) {
    //         text = "Input not valid";
    //     } else {
    //         text = "Input OK";
    //     }
    //     document.getElementById("demo").innerHTML = text;
    // }
</script>
@endsection