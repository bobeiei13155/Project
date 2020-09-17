@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
  <h2 class="font_green">ข้อมูลลูกค้า</h2>
  <form action="/Stminishow/SearchEmployee" method="GET">
    <div class="row">
      <div class="col-md-2">
        <input type="text" name="searchEmp" class="form-control" style="width: 200px;">
      </div>
      <div class="col-md-2">
        <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
      </div>
    </div>
  </form>
  <a class="btn btn-green my-2 " href="/Stminishow/createMember">เพิ่มลูกค้า</a>
  <table class="table">
    <thead class="thead-green">
      <tr class="line">
        <th scope="col">รหัสลูกค้า</th>
        <th scope="col">ชื่อลูกค้า</th>
        <th scope="col">นามสกุลลูกค้า</th>
        <th scope="col">เบอร์โทรลูกค้า</th>
        <th scope="col">ประเภทลูกค้า</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>
      </tr>
    </thead>

    <tbody class="font_green ">
      @foreach($members as $member)
      <tr>

        <td scope="row">{{$member->Id_Member}}</td>
        <td>{{$member->FName_Member}}</td>
        <td>{{$member->LName_Member}}</td>
        <td>
          @foreach($telmems as $telmem)
          @if($telmem->Id_Member == $member->Id_Member)
          {{$telmem->Tel_MEM}}
          @break
          @endif
          @endforeach
        </td>
        <td>
          @foreach($categorymembers as $categorymember)
          @if($categorymember->Id_Cmember == $member->Cmember_Id)
          {{$categorymember->Name_Cmember}}
          @endif
          @endforeach
        </td>
        <td>
          <a href="#" class="btn btn-info">Edit</a>
        </td>
        <td>
          <a href="#" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


</div>
@endsection