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
    <form action="/Stminishow/createPartner" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">

                <div class="col-md-4">
                    <label for="Name_Partner" class="font_green">ชื่อบริษัทคู่ค้า</label>
                    <input type="text" class="form-control" name="Name_Partner" id="Name_Partner" placeholder="ชื่อบริษัทคู่ค้า">
                </div>
                <div class="col-md-6">
                    <label for="Address_Partner" class="font_green">ที่อยู่</label>
                    <input type="text" class="form-control" name="Address_Partner" id="Address_Partner" placeholder="ที่อยู่">
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
                <div class="col-md-4">
                    <table class="table table-borderd" id="tel">
                        <tr>
                            <th class="font_green th1">เบอร์โทรศัพท์</th>
                            <th><input type="button" class="btn btn-success addRowTel" value="+"></th>
                        </tr>
                        <tr>
                            <th>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="Tel_PTN[]" id="Tel_PTN" placeholder="เบอร์โทรศัพท์" maxlength="10" onkeypress="return onlyNumberKey(event)">
                                </div>
                            </th>

                            <th><input type="button" class="btn btn-danger remove" value="x"></th>
                        </tr>
                    </table>
                </div>
                <div class="col-md-8">
                    <table class="table table-borderd" id="costs">
                        <tr>
                            <th class="font_green th1">สินค้า</th>
                            <th></th>
                            <th><input type="button" class="btn btn-success addRowCosts" value="+"></th>
                        </tr>
                        <tr>
                            <div class="row">
                                <th>
                                    <div class="col-md- form-group">
                                        <select class="form-control" name="Id_Product[]">
                                        <option value="" selected>เลือกสินค้า  </option>
                                            @foreach($products as $product)
                                            <option value="{{$product->Id_Product}}">{{$product->Name_Product}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </th>
                                <th>
                                    <div class="col-sm form-group">
                                        <input type="text" class="form-control" name="cost[]" id="cost" placeholder="ราคาทุน" maxlength="10" onkeypress="return onlyNumberKey(event)">
                                    </div>
                                </th>

                                <th><input type="button" class="btn btn-danger remove" value="x"></th>
                            </div>
                        </tr>
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

    $('.addRowCosts').on('click', function() {
        addRowCosts();
    });

    function onlyNumberKey(evt) {


        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }


    function addRowTel() {
        var addrow = '<tr>' +
            '   <th>' +
            '  <div class="form-group">' +
            '    <input type="text" class="form-control" name="Tel_PTN[]" id="Tel_PTN" placeholder="เบอร์โทรศัพท์" maxlength="10" onkeypress="return onlyNumberKey(event)">' +
            '  </div>' +
            '      </th>' +

            '        <th>' +
            ' <input type="button" class="btn btn-danger remove" value="x">' +
            '     </th>' +
            '     </tr>'
        $('#tel').append(addrow);
    }
    $(document).on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });

    function addRowCosts() {
        var addrow = '<tr>' +
            '     <div class="row">' +
            '<th>' +
            '  <div class="col-md- form-group">' +
            '   <select class="form-control" name="Id_Product[]">' +
         '   <option value="" selected>เลือกสินค้า  </option>'+
            '@foreach($products as $product)' +
            '    <option value="{{$product->Id_Product}}">{{$product->Name_Product}}</option>' +
            '   @endforeach' +
            '       </select>' +
            '   </div>' +
            ' </th>' +
            ' <th>' +
            ' <div class="col-sm form-group">' +
            '   <input type="text" class="form-control" name="cost[]" id="cost" placeholder="ราคาทุน" maxlength="10" onkeypress="return onlyNumberKey(event)">' +
            '</div>' +
            '  </th>' +

            '      <th><input type="button" class="btn btn-danger remove" value="x"></th>' +
            '   </div>' +
            '</tr>'
        $('#costs').append(addrow);
    }
    $(document).on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });
</script>
@endsection