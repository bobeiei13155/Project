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
    <h2 class="font_green">แก้ไขลูกค้า</h2>
    <form action="/Stminishow/updateEmployee/{{$members->Id_Member}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">

                <div class="col-md-4">
                    <label for="FName_Member" class="font_green">ชื่อ</label>
                    <input type="text" class="form-control" name="FName_Member" id="FName_Member" placeholder="ชื่อ" value="{{$members->FName_Member}}">
                </div>
                <div class="col-md-4">
                    <label for="LName_Member" class="font_green">นามสกุล</label>
                    <input type="text" class="form-control" name="LName_Member" id="LName_Member" placeholder="นามสกุล"value="{{$members->LName_Member}}">
                </div>
                <div class="col-md-3">
                    <label for="Cmember_Id" class="font_green">ประเภทลูกค้า</label>
                    <select class="form-control" name="Cmember_Id">
                    <option value="{{$members->Cmember_Id}}">
                            @foreach($categorymembers as $categorymember)
                            @if($members->Cmember_Id == $categorymember->Id_Cmember)
                            {{$categorymember->Name_Cmember}}
                            @endif
                            @endforeach
                        </option>
                        @foreach($categorymembers as $categorymember)
                        <option value="{{$categorymember->Id_Cmember}}">{{$categorymember->Name_Cmember}}</option>
                        @endforeach
                    </select>
                </div>
               
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <div class="col-sm-2">
                    <label for="Sex_Member" class="font_green">เพศ</label>
                    <select class="form-control" name="Sex_Member">
                    <option value="{{$members->Sex_Member}}" selected>{{$members->Sex_Member}}</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                </div>
                
                <div class="col-md-4">
                    <label for="Email_Member" class="font_green">อีเมล</label>
                    <input type="email" class="form-control" name="Email_Member" id="Email_Member" placeholder="อีเมล"value="{{$members->Email_Member}}">
                </div>
                <div class="col-md-5">
                    <label for="Address_Member" class="font_green">ที่อยู่</label>
                    <input type="text" class="form-control" name="Address_Member" id="Address_Member" placeholder="ที่อยู่"value="{{$members->Address_Member}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="province" class="font_green">จังหวัด</label>
                    <div class="form-group">
                        <select name="Province_Id" id="province" class="form-control province">
                        <option value="{{$members->Province_Id}}">
                                @foreach($list as $row)
                                @if($members->Province_Id == $row->PROVINCE_ID)
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
                    <label for="amphur" class="font_green">อำเภอ</label>
                    <div class="form-group">
                        <select name="District_Id" class="form-control amphur">
                        <option value="{{$members->District_Id}}">
                                @foreach($amphur as $row)
                                @if($members->District_Id == $row->AMPHUR_ID)
                                {{$row->AMPHUR_NAME}}
                                @endif
                                @endforeach
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="district" class="font_green">ตำบล</label>
                    <div class="form-group">
                        <select name="Subdistrict_Id" class="form-control district">
                        <option value="{{$members->Subdistrict_Id}}">
                                @foreach($subdistrict as $row)
                                @if($members->Subdistrict_Id == $row->DISTRICT_ID)
                                {{$row->DISTRICT_NAME}}
                                @endif
                                @endforeach
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="district" class="font_green">รหัสไปรษณีย์</label>
                    <div class="form-group">
                        <select name="Postcode_Id" class="form-control postcode">
                        <option value="{{$members->Postcode_Id}}">
                                @foreach($subdistrict as $row)
                                @if($members->Subdistrict_Id == $row->DISTRICT_ID)
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
                    <label for="Bdate_Member" class="font_green">วันเกิด</label>
                    <input type="date" class="form-control" name="Bdate_Member" id="Bdate_Member" value="{{$members->Bdate_Member}}">
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
                        @foreach($telmems as $row)
                        <tr>
                        
                            <th>
                               

                                <div class="form-group">
                                    <input type="text" class="form-control" name="Tel_MEM[]" id="Tel_MEM"  value="{{$row->Tel_MEM}}"placeholder="เบอร์โทรศัพท์" maxlength="10" onkeypress="return onlyNumberKey(event)">
                                </div>
                               
                            </th>
                            <th><input type="button" class="btn btn-danger remove" value="x"></th>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">เพิ่ม</button>

        <a class="btn btn-danger my-2" href="/Stminishow/showMember">กลับ</a>
    </form>
</div>
{{csrf_field()}}
<script type="text/javascript">
    $('.province').change(function() {
        if ($(this).val() != '') {
            var select = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('Member.f_amphures')}}",
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
                url: "{{route('Member.f_districts')}}",
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
                url: "{{route('Member.f_postcode')}}",
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
        var addrow = '<tr>' + '<td> <input type="text" class="form-control" name="Tel_MEM[]" id="Tel_MEM" placeholder="เบอร์โทรศัพท์"maxlength="10" onkeypress="return onlyNumberKey(event)"></td>' +
            '<td><input type="button" class="btn btn-danger remove" value="x"></td>' + '</tr>'
        $('#tel').append(addrow);
    }
    $(document).on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });
</script>
@endsection