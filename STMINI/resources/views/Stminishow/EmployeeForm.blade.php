@extends('layouts.stmininav')
@section('body')
<div class="container ">
    <br>
    <h2>เพิ่มพนักงาน</h2>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">    
            <div class="row">
                <div class="col-sm-2">
                    <label for="LName_Emp">คำนำหน้า</label>
                        <select class="form-control" name="Title_Emp">
                        <option value="" selected>เลือกคำนำหน้า</option>  
                                <option value="Mr">นาย</option>
                                <option value="Miss">นาง</option>
                                <option value="Ms">นางสาว</option>
                        </select>
                </div>
                <div class="col-md-4">
                    <label for="LName_Emp">ชื่อ</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="ชื่อ">
                </div>
                <div class="col-md-4">
                    <label for="LName_Emp">นามสกุล</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="นามสกุล">
                </div>
                <div class="col-sm-2">
                    <label for="LName_Emp">ตำแหน่ง</label>
                        <select class="form-control" name="Title_Emp">
                        <option value="" selected>ตำแหน่ง</option>  
                               @foreach($positions as $position)
                                <option value="{{$position->Id_Position}}">{{$position->Name_Position}}</option>
                                @endforeach
                        </select>
                </div>
            </div>
        </div>
        </form>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="LName_Emp">ยูสเซอร์</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="ยูสเซอร์">
                </div>
                <div class="col-md-6">
                    <label for="LName_Emp">พาสเวิร์ด</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="พาสเวิร์ด">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <div class="col-md-3">
                        <label for="LName_Emp">เพศ</label>
                            <select class="form-control" name="Title_Emp"> 
                            <option value="" selected>เลือกเพศ</option>                          
                                    <option value="Men">ชาย</option>
                                    <option value="Women">หญิง</option>
                            </select>
                </div>
            <div class="col-md-3">
                        <label for="LName_Emp">ที่อยู่</label>
                        <input type="text" class="form-control" name="LName_Emp" id="LName_Emp"  placeholder="ที่อยู่">
                    </div>
                <div class="col-md-3">
                    <label for="Email_Emp">อีเมล</label>
                    <input type="text" class="form-control" name="Email_Emp" id="Email_Emp" placeholder="อีเมล">
                </div>
                
                <div class="col-md-3">
                    <label for="LName_Emp">รหัสบัตรประชาชน</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="รหัสบัตรประชาชน">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                        <label for="LName_Emp">จังหวัด</label>
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
                        <label for="LName_Emp">อำเภอ</label>
                        <div class="form-group">
                            <select name="province"  class="form-control amphur">                          
                                    <option value="">เลือกอำเภอ</option>
                            </select>
                        </div>
                </div>
                <div class="col-md-3">
                        <label for="LName_Emp">ตำบล</label>
                        <div class="form-group">
                            <select name="province"  class="form-control district" >                          
                                    <option value="">เลือกตำบล</option>
                            </select>
                        </div>
                </div>
                <div class="col-md-2">
                        <label for="LName_Emp">รหัสไปรษณีย์</label>
                        <div class="form-group">
                            <select name="province"  class="form-control postcode" >                          
                                    <option value="">เลือกรหัสไปรษณีย์</option>
                            </select>
                        </div>
                </div>
          </div>
    </div>
        <div class="form-group">
            <div class="row">
            <div class="col-md-6">
                    <label for="Bdate_Emp">เบอร์โทร</label>
                    <input type="text" class="form-control" name="Bdate_Emp" id="Bdate_Emp"  placeholder="เบอร์โทร">
                </div>
                <div class="col-md-6">
                    <label for="Bdate_Emp">วันเกิด</label>
                    <input type="date" class="form-control" name="Bdate_Emp" id="Bdate_Emp">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
               
                <div class="col-md-6">
                    <label for="LName_Emp">เงินเดือน</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp"  placeholder="เงินเดือน">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">เพิ่ม</button>
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


