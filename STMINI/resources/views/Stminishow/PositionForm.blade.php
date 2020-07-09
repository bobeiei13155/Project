@extends('layouts.stmininav')
@section('body')
<div class="table-responsive">
    <h2>เพิ่มตำแหน่ง</h2>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection