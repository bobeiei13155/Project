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
    <h2 class="font_green">เพิ่มของแถม</h2>
    <form action="/Stminishow/createPremiumPro" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row ">
                <div class="col-md-4">
                    <label for="Name" class="font_green">ชื่อของแถม</label>
                    <input type="text" class="form-control" name="Name" id="Name" placeholder="ชื่อของแถม">
                </div>
                <div class="col-md-4">
                    <label for="Amount" class="font_green">จำนวนสินค้าของแถม</label>
                    <input type="text" class="form-control" name="Amount" id="Amount" placeholder="จำนวนสินค้าของแถม">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <label for="LName_Emp" class="font_green">รูปสินค้าของแถม</label>
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-success">เพิ่ม</button>

        <a class="btn btn-danger my-2" href="/Stminishow/ShowPremiumPro">กลับ</a>
    </form>
</div>
{{csrf_field()}}
<script type="text/javascript">

</script>
@endsection