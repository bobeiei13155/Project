@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
  <a class="btn btn-green my-2 " href="/Stminishow/createEmployee">เพิ่มพนักงาน</a>
  <table class="table">
    <thead class="thead-green">
      <tr class="line">
        <th scope="col">รหัส</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">นามสกุล</th>
        <th scope="col">อีเมล</th>
        <th scope="col">เงินเดือน</th>
        <th scope="col">ตำแหน่ง</th>  
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>

    <tbody class="thead-dark ">
      @foreach($employees as $employee)
      <tr>
        
        <td scope="row" >{{$employee->Id_Emp}}</td>
        <td>{{$employee->FName_Emp}}</td>
        <td>{{$employee->LName_Emp}}</td>
        <td>{{$employee->Email_Emp}}</td>
        <td>{{$employee->Salary_Emp}}</td>
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
          <a href="/Stminishow/deletevEmployee/{{$employee->Id_Emp}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection