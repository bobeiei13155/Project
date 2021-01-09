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
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h1 display">แก้ไขลูกค้า </h1>
        </header>
        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header  align-items-center">
                        <h4>ID : {{$members->Id_Member}}</h4>
                    </div>
                    <div class="card-body">
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
                                        <input type="text" class="form-control" name="LName_Member" id="LName_Member" placeholder="นามสกุล" value="{{$members->LName_Member}}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Cmember_Id" class="font_green">ประเภทลูกค้า</label>
                                        <select name="Cmember_Id" class="form-control">
                                            @foreach($categorymembers as $categorymember)
                                            <option value="{{$categorymember->Id_Cmember}}" @if($categorymember->Id_Cmember == $members->Cmember_Id)selected
                                                @endif
                                                >{{$categorymember->Name_Cmember}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="Sex_Member">เพศ</label>
                                        <select class="form-control" name="Sex_Member">
                                            @if($members->Sex_Member == "ชาย" ){
                                            <option value="ชาย" selected>
                                                {{$members->Sex_Member}}
                                            </option>
                                            <option value="หญิง">หญิง</option>
                                            }@else{

                                            <option value="หญิง" selected>
                                                {{$members->Sex_Member}}
                                            </option>
                                            <option value="ชาย">ชาย</option>
                                            }
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Email_Member" class="font_green">อีเมล</label>
                                        <input type="email" class="form-control" name="Email_Member" id="Email_Member" placeholder="อีเมล" value="{{$members->Email_Member}}">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="Address_Member" class="font_green">ที่อยู่</label>
                                        <input type="text" class="form-control" name="Address_Member" id="Address_Member" placeholder="ที่อยู่" value="{{$members->Address_Member}}">
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
                                        <table class="table" id="tel">
                                            <tr>
                                                <th class="">เบอร์โทรศัพท์</th>
                                                <th> <button type="button" class="btn btn-success addRowTel"><i class="fas fa-plus"></i></button></th>
                                            </tr>
                                            @foreach($telmems as $row)
                                            <tr>
                                                <th>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="Tel_MEM[]" id="Tel_MEM"  value="{{$row->Tel_MEM}}" placeholder="เบอร์โทรศัพท์" maxlength="10" onkeypress="return onlyNumberKey(event)">
                                                    </div>
                                                </th>
                                                <th> <button type="button" class="btn btn-danger remove"><i class="fas fa-minus"></i></button></th>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" id="submit" class="btn btn-success"> <i class="fas fa-plus" style="margin-right: 5px;"></i>เพิ่ม</button>
                            <a class="btn btn-danger my-2" href="/Stminishow/showMember"> <i class="fas fa-arrow-left" style="margin-right: 5px;"></i>กลับ</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
        var addrow = '<tr>' + '<td> <input type="text" class="form-control" name="Tel_Emp[]" id="Tel_Emp" placeholder="เบอร์โทรศัพท์" maxlength="10" onkeypress="return onlyNumberKey(event)"></td>' +
            ' <th> <button type="button"  class="btn btn-danger remove" ><i class="fas fa-minus" ></i></button></th>' + '</tr>'
        $('#tel').append(addrow);
    }

    $(document).on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });
    $('#submit').click(function() {
        //validate form
        $.get('sample-action.php', $('#sample-form').serialize(), function(response) {
            $('#result').html(response);
        });
    });






    function Script_checkID(id) {
        if (!IsNumeric(id)) return false;
        if (id.substring(0, 1) == 0) return false;
        if (id.length != 13) return false;
        for (i = 0, sum = 0; i < 12; i++)
            sum += parseFloat(id.charAt(i)) * (13 - i);
        if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) return false;
        return true;
    }

    function IsNumeric(input) {
        var RE = /^-?(0|INF|(0[1-7][0-7]*)|(0x[0-9a-fA-F]+)|((0|[1-9][0-9]*|(?=[\.,]))([\.,][0-9]+)?([eE]-?\d+)?))$/;
        return (RE.test(input));
    }
</script>
@endsection