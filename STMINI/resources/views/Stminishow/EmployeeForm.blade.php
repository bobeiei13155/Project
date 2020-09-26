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
    <h2 class="font_green">เพิ่มพนักงาน</h2>
    <form action="/Stminishow/createEmployee" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">

                <div class="col-md-4">
                    <label for="FName_Emp" class="font_green">ชื่อ</label>
                    <input type="text" class="form-control" name="FName_Emp" id="FName_Emp" placeholder="ชื่อ">
                </div>
                <div class="col-md-4">
                    <label for="LName_Emp" class="font_green">นามสกุล</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="นามสกุล">
                </div>
                <div class="col-sm-2">
                    <label for="Position_Id" class="font_green">ตำแหน่ง</label>
                    <select class="form-control" name="Position_Id">
                        <option value="">ตำแหน่ง</option>
                        @foreach($positions as $position)
                        <option value="{{$position->Id_Position}}">{{$position->Name_Position}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="Sex_Emp" class="font_green">เพศ</label>
                    <select class="form-control" name="Sex_Emp">
                        <option value="" selected>เลือกเพศ</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="Username_Emp" class="font_green">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" name="Username_Emp" id="Username_Emp" placeholder="ชื่อผู้ใช้">
                </div>
                <div class="col-md-6">
                    <label for="Password_Emp" class="font_green">รหัสผ่าน</label>
                    <input type="password" class="form-control" name="Password_Emp" id="Password_Emp" placeholder="รหัสผ่าน">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">

                <div class="col-md-6">
                    <label for="Address_Emp" class="font_green">ที่อยู่</label>
                    <input type="text" class="form-control" name="Address_Emp" id="Address_Emp" placeholder="ที่อยู่">
                </div>
                <div class="col-md-3">
                    <label for="Email_Emp" class="font_green">อีเมล</label>
                    <input type="email" class="form-control" name="Email_Emp" id="Email_Emp" placeholder="อีเมล">
                </div>

                <div class="col-md-3">
                    <label for="Idcard_Emp" class="font_green">รหัสบัตรประชาชน</label>
                    <input type="text" class="form-control" name="Idcard_Emp" id="Idcard_Emp" placeholder="รหัสบัตรประชาชน" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="province" class="font_green">จังหวัด</label>
                    <div class="form-group">
                        <select name="Province_Id" id="province" class="form-control province">
                            <option value="" selected>เลือกจังหวัด</option>
                            @foreach($list as $row)
                            <option value="{{$row->PROVINCE_ID}}">{{$row->PROVINCE_NAME}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="amphur" class="font_green">อำเภอ</label>
                    <div class="form-group">
                        <select name="District_Id" class="form-control amphur">
                            <option value="">เลือกอำเภอ</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="district" class="font_green">ตำบล</label>
                    <div class="form-group">
                        <select name="Subdistrict_Id" class="form-control district">
                            <option value="">เลือกตำบล</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="district" class="font_green">รหัสไปรษณีย์</label>
                    <div class="form-group">
                        <select name="Postcode_Id" class="form-control postcode">
                            <option value="">เลือกรหัสไปรษณีย์</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="Bdate_Emp" class="font_green">วันเกิด</label>
                    <input type="date" class="form-control" name="Bdate_Emp" id="Bdate_Emp">
                </div>

                <div class="col-md-6">
                    <label for="Salary_Emp" class="font_green">เงินเดือน</label>
                    <input type="number" class="form-control" name="Salary_Emp" id="Salary_Emp" placeholder="เงินเดือน" min="0" >
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderd" id="tel">
                        <tr>
                            <th class="font_green th1">เบอร์โทรศัพท์</th>
                            <th><input type="button" class="btn btn-success addRowTel" value="+"></th>
                        </tr>
                        <tr>
                            <th>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="Tel_Emp[]" id="Tel_Emp" placeholder="เบอร์โทรศัพท์" maxlength="10" onkeypress="return onlyNumberKey(event)">
                                </div>
                            </th>
                            <th><input type="button" class="btn btn-danger remove" value="x"></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">เพิ่ม</button>

        <a class="btn btn-danger my-2" href="/Stminishow/showEmployee">กลับ</a>
    </form>
</div>
{{csrf_field()}}
<script type="text/javascript">
    $('.province').change(function() {
        if ($(this).val() != '') {
            var select = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('Employee.f_amphures')}}",
                method: "POST",
                data: {
                    select: select,
                    _token: _token
                },
                success: function(result) {
                    $('.amphur').html(result);
                }
            })
        }
    });
    $('.amphur').change(function() {
        if ($(this).val() != '') {
            var select = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('Employee.f_districts')}}",
                method: "POST",
                data: {
                    select: select,
                    _token: _token
                },
                success: function(result) {
                    $('.district').html(result);
                }
            })
        }
    });
    $('.district').change(function() {
        if ($(this).val() != '') {
            var select = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('Employee.f_postcode')}}",
                method: "POST",
                data: {
                    select: select,
                    _token: _token
                },
                success: function(result) {
                    $('.postcode').html(result);
                }
            })
        }
    });
 
    function onlyNumberKey(evt) { 
          
          
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
              return false; 
          return true; 
      } 
      $('.addRowTel').on('click', function() {
        addRowTel();
    });
    function addRowTel() {
        var addrow = '<tr>' + '<td> <input type="text" class="form-control" name="Tel_Emp[]" id="Tel_Emp" placeholder="เบอร์โทรศัพท์"maxlength="10" onkeypress="return onlyNumberKey(event)"></td>' +
            '<td><input type="button" class="btn btn-danger remove" value="x"></td>' + '</tr>'
        $('#tel').append(addrow);
    }
    $(document).on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });
</script>
@endsection