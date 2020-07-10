@extends('layouts.stmininav')
@section('body')
<div class="container">
    <br>
    <h2>Create Employee</h2>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">    
            <div class="row">
                <div class="col-sm-2">
                <label for="LName_Emp">Title Name</label>
                    <select class="form-control" name="Title_Emp">
                            <option value="Mr">Mr</option>
                            <option value="Miss">Miss</option>
                            <option value="Ms">Ms</option>
                    </select>
                </div>
                <div class="col-md-4">
                <label for="LName_Emp">First Name</label>
                <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="First name">
                </div>
                <div class="col-md-4">
                <label for="LName_Emp">Last Name</label>
                <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="Last name">
                </div>
            </div>
        </div>
        </form>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="LName_Emp">Username</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="Username">
                </div>
                <div class="col-md-5">
                    <label for="LName_Emp">Password</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Email_Emp">Email</label>
                    <input type="text" class="form-control" name="Email_Emp" id="Email_Emp" placeholder="Email">
                </div>
                <div class="col-md-5">
                    <label for="LName_Emp">Idcard</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp" placeholder="Idcard">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="LName_Emp">Address</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp"  placeholder="Address">
                </div>
                <div class="col-md-5">
                    <label for="Bdate_Emp">Birthday</label>
                    <input type="date" class="form-control" name="Bdate_Emp" id="Bdate_Emp">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-5">
                    <label for="Bdate_Emp">Tel.</label>
                    <input type="text" class="form-control" name="Bdate_Emp" id="Bdate_Emp"  placeholder="Tel">
                </div>
                <div class="col-md-5">
                    <label for="LName_Emp">Salary</label>
                    <input type="text" class="form-control" name="LName_Emp" id="LName_Emp"  placeholder="Salary">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection