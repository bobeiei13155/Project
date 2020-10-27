@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
  <h2 class="font_green">ค้นหาข้อมูลบริษัทคู่ค้า</h2>
  <form action="/Stminishow/SearchPartner" method="GET">
    <div class="row">
      <div class="col-md-2">
        <input type="text" name="searchPTN" class="form-control" style="width: 200px;">
      </div>
      <div class="col-md-2">
        <button type="submit" name="submit" class="btn btn-green "><i class="fas fa-search"></i></button>
      </div>
    </div>
  </form>
  <a class="btn btn-green my-2 " href="/Stminishow/createPartner">เพิ่มบริษัทคู่ค้า</a>
  <table class="table">
    <thead class="thead-green">
      <tr class="line">
        <th scope="col">รหัสบริษัทคู่ค้า</th>
        <th scope="col">ชื่อบริษัทคู่ค้า</th>
        <th scope="col">เบอร์โทรศัพท์</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>
      </tr>
    </thead>
    <tbody class="font_green ">
      @foreach($partners as $partner)
      <tr>

        <td scope="row">{{$partner->Id_Partner}}</td>
        <td>{{$partner->Name_Partner}}</td>
        <td>
        
          @foreach($telptns as $telptn)

          @if($telptn->Id_Partner == $partner->Id_Partner)


          {{$telptn->Tel_PTN}}
          @break
          @endif
          
          @endforeach
        
        </td>
        <td>
          <a href="/Stminishow/editPartner/{{$partner->Id_Partner}}" class="btn btn-info">Edit</a>
        </td>
        <td>
          <a href="/Stminishow/deletePartner/{{$partner->Id_Partner}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{$partners->appends(['searchPTN'=>request()->query('searchPTN')])->links()}}
</div>
@endsection