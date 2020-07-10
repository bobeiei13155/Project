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
<div class="container">
    <br>
    <h2>Create Position</h2>
    <form action="/Stminishow/createPosition" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Name_Position">Position Name</label>
                    <input type="text" class="form-control" name="Name_Position" id="Name_Position" placeholder="Position Name">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
<div class="container my-2">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Position</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      @foreach($positions as $position) 
      <tr>
      <th scope="row">{{$position->Id_Position}}</th>
      <td>{{$position->Name_Position}}</td>
      <td>
          <a href="/Stminishow/editPosition/{{$position->Id_Position}}" class ="btn btn-info">Edit</a>
      </td>
      <td>
          <a href="/Stminishow/deletePosition/{{$position->Id_Position}}" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?')" class ="btn btn-danger">Delete</a>
      </td>
    </tr>
      @endforeach
  </tbody>
</table>
</div>
@endsection