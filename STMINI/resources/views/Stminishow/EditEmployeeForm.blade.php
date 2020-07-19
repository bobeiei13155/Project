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
<div class="container ">
    <br>
    <h2>เพิ่มพนักงาน</h2>
    <form action="/Stminishow/updateEmployee/{{$employee->Id_Emp}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">    
            <div class="row">
                <div class="col-sm-2">
                    <label for="Title_Emp">คำนำหน้า</label>
                        <select class="form-control" name="Title_Emp">
                        <option value="{{$employee->Title_Emp}}" selected>{{$employee->Title_Emp}}</option>  
                                <option value="Mr">นาย</option>
                                <option value="Miss">นาง</option>
                                <option value="Ms">นางสาว</option>
                        </select>
                </div>
                <div class="col-md-4">
                    <label for="FName_Emp">ชื่อ</label>
                    <input type="text" class="form-control" name="FName_Emp" id="FName_Emp" placeholder="ชื่อ" value="{{$employee->FName_Emp}}">
                </div>
                <div class="col-md-4">
                    <label for="LName_Emp">นามสกุล</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="นามสกุล" value="{{$employee->LName_Emp}}">
                </div>
                <div class="col-sm-2">
                    <label for="Position_Id">ตำแหน่ง</label>
                        <select class="form-control" name="Position_Id">
                        <option value="">ตำแหน่ง</option>  
                               @foreach($positions as $position)
                                <option value="{{$position->Id_Position}}">{{$position->Name_Position}}</option>
                                @endforeach
                        </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="Username_Emp">ยูสเซอร์เนม</label>
                    <input type="text" class="form-control" name="Username_Emp" id="Username_Emp" placeholder="ยูสเซอร์เนม" value="{{$employee->Username_Emp}}">
                </div>
                <div class="col-md-6">
                    <label for="Password_Emp">พาสเวิร์ด</label>
                    <input type="password" class="form-control" name="Password_Emp" id="Password_Emp" placeholder="พาสเวิร์ด" value="{{$employee->Password_Emp}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <div class="col-md-3">
                        <label for="Sex_Emp">เพศ</label>
                            <select class="form-control" name="Sex_Emp"> 
                            <option value="" selected>เลือกเพศ</option>                          
                                    <option value="Men">ชาย</option>
                                    <option value="Women">หญิง</option>
                            </select>
                </div>
            <div class="col-md-3">
                        <label for="Address_Emp">ที่อยู่</label>
                        <input type="text" class="form-control" name="Address_Emp" id="Address_Emp"  placeholder="ที่อยู่" value="{{$employee->Address_Emp}}">
                    </div>
                <div class="col-md-3">
                    <label for="Email_Emp">อีเมล</label>
                    <input type="email" class="form-control" name="Email_Emp" id="Email_Emp" placeholder="อีเมล"  value="{{$employee->Email_Emp}}" >
                </div>
                
                <div class="col-md-3">
                    <label for="Idcard_Emp">รหัสบัตรประชาชน</label>
                    <input type="text" class="form-control" name="Idcard_Emp" id="Idcard_Emp" placeholder="รหัสบัตรประชาชน" value="{{$employee->Idcard_Emp}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                        <label for="province">จังหวัด</label>
                        <div class="form-group">
                            <select name="province" id="province" class="form-control province" >  
                                    <option value="" selected>เลือกจังหวัด</option>                      
                                    @foreach($list as $row)
                                    <option value="{{$row->PROVINCE_ID}}">{{$row->PROVINCE_NAME}}</option>
                                    @endforeach
                            </select>
                        </div>
                </div>
                <div class="col-md-3">
                        <label for="amphur">อำเภอ</label>
                        <div class="form-group">
                            <select name="amphur"  class="form-control amphur">                          
                                    <option value="">เลือกอำเภอ</option>
                            </select>
                        </div>
                </div>
                <div class="col-md-3">
                        <label for="district">ตำบล</label>
                        <div class="form-group">
                            <select name="Subdistrict_Id"  class="form-control district" >                          
                                    <option value="">เลือกตำบล</option>
                            </select>
                        </div>
                </div>
                <div class="col-md-2">
                        <label for="district">รหัสไปรษณีย์</label>
                        <div class="form-group">
                            <select name="postcode"  class="form-control postcode" >                          
                                    <option value="">เลือกรหัสไปรษณีย์</option>
                            </select>
                        </div>
                </div>
          </div>
    </div>
        <div class="form-group">
            <div class="row">
            <div class="col-md-6">
                    <label for="Tel_Emp">เบอร์โทร</label>
                    <input type="text" class="form-control" name="Tel_Emp" id="Tel_Emp"  placeholder="เบอร์โทร" value="{{$employee->Tel_Emp}}">
                </div>
                <div class="col-md-6">
                    <label for="Bdate_Emp">วันเกิด</label>
                    <input type="date" class="form-control" name="Bdate_Emp" id="Bdate_Emp"  value="{{$employee->Bdate_Emp}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
               
                <div class="col-md-6">
                    <label for="Salary_Emp">เงินเดือน</label>
                    <input type="number" class="form-control" name="Salary_Emp" id="Salary_Emp"  placeholder="เงินเดือน" value="{{$employee->Salary_Emp}}">
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-success">เพิ่ม</button>

        <a class="btn btn-danger my-2" href="/Stminishow/showEmployee">กลับ</a>
    </form>
</div>
{{csrf_field()}}
<script type ="text/javascript">
        $('.province').change(function(){
          if($(this).val()!=''){
              var select =$(this).val();
              var _token=$('input[name="_token"]').val();
              $.ajax({
                  url:"{{route('Employee.f_amphures')}}",
                  method:"POST",
                  data:{select:select,_token:_token},
                  success:function(result){
                     $('.amphur').html(result);
                  }
              })
          } 
        });
        $('.amphur').change(function(){
          if($(this).val()!=''){
              var select =$(this).val();
              var _token=$('input[name="_token"]').val();
              $.ajax({
                  url:"{{route('Employee.f_districts')}}",
                  method:"POST",
                  data:{select:select,_token:_token},
                  success:function(result){
                     $('.district').html(result);
                  }
              })
          } 
        });
        $('.district').change(function(){
          if($(this).val()!=''){
              var select =$(this).val();
              var _token=$('input[name="_token"]').val();
              $.ajax({
                  url:"{{route('Employee.f_postcode')}}",
                  method:"POST",
                  data:{select:select,_token:_token},
                  success:function(result){
                     $('.postcode').html(result);
                  }
              })
          } 
        });

</script> 
  
@endsection


