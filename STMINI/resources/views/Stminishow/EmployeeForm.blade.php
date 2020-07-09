@extends('layouts.stmininav')
@section('body')
<div class="table-responsive">
    <h2>เพิ่มพนักงาน</h2>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
            <input type="text" class="form-control" name="name" id="name" placeholder="Something">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="type">Category</label>
            <select class="form-control" name="category">
                    <option value="men">Men</option>
                    <option value="women">WoMen</option>
            </select>
        </div>
        <div class="form-group">
            <label for="type">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection