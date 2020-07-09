@extends('layouts.stmininav')
@section('body')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-md">
    <br>
    <h2>Edit Position</h2>
    <form action="/Stminishow/updatePosition/{{$position->Id_Position}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Position">Position Name</label>
                    <input type="text" class="form-control" name="Name_Position" id="Name_Position" placeholder="Position Name" value="{{$position->Name_Position}}">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection