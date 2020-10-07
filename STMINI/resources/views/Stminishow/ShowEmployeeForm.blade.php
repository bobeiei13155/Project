@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
<h2 class="font_green">ข้อมูลพนักงาน</h2>
  <form action="/Stminishow/SearchEmployee" method="GET">
  <div class="row">
    <div class="col-md-2">
      <input type="text" name="searchEmp" class="form-control" style="width: 200px;" >
    </div>
    <div class="col-md-2">
      <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
    </div>
    <!-- <div class="col-md-2">
    <select class="form-control" name="Position_Id">
                        <option value="">ตำแหน่ง</option>
                        @foreach($positions as $position)
                        <option value="{{$position->Id_Position}}">{{$position->Name_Position}}</option>
                        @endforeach
                    </select>
    </div> -->
  </div>
  </form>
  <a class="btn btn-green my-2 " href="/Stminishow/createEmployee">เพิ่มพนักงาน</a>
  <table class="table">
    <thead class="thead-green">
      <tr class="line">
        <th scope="col">รหัสพนักงาน</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">นามสกุล</th>
        <th scope="col">อีเมล</th>
        <th scope="col">เงินเดือน</th>
        <th scope="col">ตำแหน่ง</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>

    <tbody class="font_green ">
      @foreach($employees as $employee)
      <tr>

        <td scope="row">{{$employee->Id_Emp}}</td>
        <td>{{$employee->FName_Emp}}</td>
        <td>{{$employee->LName_Emp}}</td>
        <td>{{$employee->Email_Emp}}</td>
        <td>{{number_format($employee->Salary_Emp,2)}}</td>
        <td>
          @foreach($positions as $position)
          @if($employee->Position_Id == $position->Id_Position)
          {{$position->Name_Position}}
          @endif
          @endforeach
        </td>

        <td>
          <a href="/Stminishow/editEmployee/{{$employee->Id_Emp}}" class="btn btn-info">Edit</a>
        </td>
        <td>
          <a href="/Stminishow/deleteEmployee/{{$employee->Id_Emp}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  {{$employees->links()}}
  

</div>
@endsection