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
<div class="container  font_green" style = "font-size:16px">
    <br>
    <h2>แก้ไขพนักงาน</h2>
    <form action="/Stminishow/updateEmployee/{{$employee->Id_Emp}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group font_green">
            <div class="row">

                <div class="col-md-4">
                    <label for="FName_Emp">ชื่อ</label>
                    <input type="text" class="form-control " name="FName_Emp" id="FName_Emp" placeholder="ชื่อ" value="{{$employee->FName_Emp}}">
                </div>
                <div class="col-md-4">
                    <label for="LName_Emp">นามสกุล</label>
                    <input type="text" class="form-control"  name="LName_Emp" id="LName_Emp" placeholder="นามสกุล" value="{{$employee->LName_Emp}}">
                </div>
                <div class="col-sm-2">
                    <label for="Position_Id">ตำแหน่ง</label>
                    <select class="form-control" name="Position_Id">
                        <option value="{{$employee->Position_Id}}">
                            @foreach($positions as $position)
                            @if($employee->Position_Id == $position->Id_Position)
                            {{$position->Name_Position}}
                            @endif
                            @endforeach
                        </option>
                        @foreach($positions as $position)
                        <option value="{{$position->Id_Position}}">{{$position->Name_Position}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="Sex_Emp">เพศ</label>
                    <select class="form-control" name="Sex_Emp">
                        <option value="{{$employee->Sex_Emp}}" selected>{{$employee->Sex_Emp}}</option>
                        <option value="Men">ชาย</option>
                        <option value="Women">หญิง</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="Username_Emp">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" name="Username_Emp" id="Username_Emp" placeholder="ยูสเซอร์เนม" value="{{$employee->Username_Emp}}">
                </div>
                <div class="col-md-6">
                    <label for="Password_Emp">รหัสผ่าน</label>
                    <input type="password" class="form-control" name="Password_Emp" id="Password_Emp" placeholder="พาสเวิร์ด" value="{{$employee->Password_Emp}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                
                <div class="col-md-6">
                    <label for="Address_Emp">ที่อยู่</label>
                    <input type="text" class="form-control" name="Address_Emp" id="Address_Emp" placeholder="ที่อยู่" value="{{$employee->Address_Emp}}">
                </div>
                <div class="col-md-3">
                    <label for="Email_Emp">อีเมล</label>
                    <input type="email" class="form-control" name="Email_Emp" id="Email_Emp" placeholder="อีเมล" value="{{$employee->Email_Emp}}">
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
                        <select name="Province_Id" id="Province_Id" class="form-control province">
                            <option value="{{$employee->Province_Id}}">
                                @foreach($list as $row)
                                @if($employee->Province_Id == $row->PROVINCE_ID)
                                {{$row->PROVINCE_NAME}}
                                @endif
                                @endforeach
                            </option>

                            @foreach($list as $row)
                            <option value="{{$row->PROVINCE_ID}}">{{$row->PROVINCE_NAME}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="amphur">อำเภอ</label>
                    <div class="form-group">
                        <select name="District_Id" id="District_Id" class="form-control amphur">
                            <option value="{{$employee->District_Id}}">
                                @foreach($amphur as $row)
                                @if($employee->District_Id == $row->AMPHUR_ID)
                                {{$row->AMPHUR_NAME}}
                                @endif
                                @endforeach
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="district">ตำบล</label>
                    <div class="form-group">
                        <select name="Subdistrict_Id" class="form-control district">
                            <option value="{{$employee->Subdistrict_Id}}">
                                @foreach($subdistrict as $row)
                                @if($employee->Subdistrict_Id == $row->DISTRICT_ID)
                                {{$row->DISTRICT_NAME}}
                                @endif
                                @endforeach
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="district">รหัสไปรษณีย์</label>
                    <div class="form-group">
                        <select name="Postcode_Id" class="form-control postcode">
                            <option value="{{$employee->Postcode_Id}}">
                                @foreach($subdistrict as $row)
                                @if($employee->Subdistrict_Id == $row->DISTRICT_ID)
                                {{$row->POSTCODE}}
                                @endif
                                @endforeach
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="Tel_Emp">เบอร์โทร</label>
                    <input type="text" class="form-control" name="Tel_Emp" id="Tel_Emp" placeholder="เบอร์โทร" value="{{$employee->Tel_Emp}}">
                </div>
                <div class="col-md-6">
                    <label for="Bdate_Emp">วันเกิด</label>
                    <input type="date" class="form-control" name="Bdate_Emp" id="Bdate_Emp" value="{{$employee->Bdate_Emp}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">

                <div class="col-md-6">
                    <label for="Salary_Emp">เงินเดือน</label>
                    <input type="number" class="form-control" name="Salary_Emp" id="Salary_Emp" placeholder="เงินเดือน" value="{{$employee->Salary_Emp}}">
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-success">แก้ไข</button>

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
</script>

@endsection