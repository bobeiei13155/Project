@extends('layouts.stmininav')
@section('body')
<div class="container">
    <br>
    <h2>เพิ่มพนักงาน</h2>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">    
            <div class="row">
                <div class="col-sm-2">
                    <select class="form-control" name="Title_Emp">
                            <option value="Mr">Mr</option>
                            <option value="Miss">Miss</option>
                            <option value="Ms">Ms</option>
                    </select>
                </div>
                <div class="col-md-4">
                <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Last name">
                </div>
            </div>
        </div>
        </form>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="LName_Emp">Username</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="LName_Emp">Password</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection