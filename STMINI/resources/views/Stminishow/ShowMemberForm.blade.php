@extends('layouts.stmininav')
@section('body')

<div class="container my-2">
<a class="btn btn-primary my-2" href="/Stminishow/createMember">เพิ่มสมาชิก</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัส</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">นามสกุล</th>
      <th scope="col">อีเมล</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
</table>
</div>
@endsection