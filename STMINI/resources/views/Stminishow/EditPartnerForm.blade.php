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
    <h2 class="font_green">เพิ่มบริษัทคู่ค้า</h2>
    <form action="/Stminishow/updatePartner/{{$partners->Id_Partner}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">

                <div class="col-md-4">
                    <label for="Name_Partner" class="font_green">ชื่อบริษัทคู่ค้า</label>
                    <input type="text" class="form-control" name="Name_Partner" id="Name_Partner" placeholder="ชื่อบริษัทคู่ค้า" value="{{$partners->Name_Partner}}">
                </div>
                <div class="col-md-6">
                    <label for="Address_Partner" class="font_green">ที่อยู่</label>
                    <input type="text" class="form-control" name="Address_Partner" id="Address_Partner" placeholder="ที่อยู่" value="{{$partners->Address_Partner}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    <label for="province" class="font_green">จังหวัด</label>
                    <div class="form-group">
                        <select name="Province_Id" id="province" class="form-control province">
                            <option value="{{$partners->Province_Id}}">
                                @foreach($list as $row)
                                @if($partners->Province_Id == $row->PROVINCE_ID)
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
                            <option value="{{$partners->District_Id}}">
                                @foreach($amphur as $row)
                                @if($partners->District_Id == $row->AMPHUR_ID)
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
                        <option value="{{$partners->Subdistrict_Id}}">
                                @foreach($subdistrict as $row)
                                @if($partners->Subdistrict_Id == $row->DISTRICT_ID)
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
                        <option value="{{$partners->Postcode_Id}}">
                                @foreach($subdistrict as $row)
                                @if($partners->Subdistrict_Id == $row->DISTRICT_ID)
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
                    <table class="table table-borderd" id="tel">
                        <tr>
                            <th class="font_green th1">เบอร์โทรศัพท์</th>
                            <th><input type="button" class="btn btn-success addRowTel" value="+"></th>
                        </tr>
                        @foreach($telptns as $row)
                        <tr>
                            <th>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="Tel_PTN[]" id="Tel_PTN" value="{{$row->Tel_PTN}}" placeholder="เบอร์โทรศัพท์" maxlength="10" onkeypress="return onlyNumberKey(event)">
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

        <a class="btn btn-danger my-2" href="/Stminishow/showPartner">กลับ</a>
    </form>
</div>
{{csrf_field()}}
<script type="text/javascript">
    $('.province').change(function() {
        if ($(this).val() != '') {
            var select = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('Partner.f_amphures')}}",
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
                url: "{{route('Partner.f_districts')}}",
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
                url: "{{route('Partner.f_postcode')}}",
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
    $('.addRowTel').on('click', function() {
        addRowTel();
    });
    function onlyNumberKey(evt) { 
          
          
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
              return false; 
          return true; 
      } 


    function addRowTel() {
        var addrow = '<tr>' + '<td> <input type="text" class="form-control" name="Tel_PTN[]" id="Tel_PTN" placeholder="เบอร์โทรศัพท์" maxlength="10" onkeypress="return onlyNumberKey(event)"></td>' +
            '<td><input type="button" class="btn btn-danger remove" value="x"></td>' + '</tr>'
        $('#tel').append(addrow);
    }
    $(document).on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });
</script>
@endsection