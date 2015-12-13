@extends('layout')

<!-- resources/views/auth/login.blade.php -->
@section('content')
<div class="title">File Requester</div>
<form role="form" method="POST" action"/https://filerequester-ardeelete.c9users.io/home">
    <input type='hidden' name='_token' value='{{{csrf_token() }}}'>
    <div class="form-group">
        <label for="username">Email address:</label>
        <input type="username" class="form-control" id="username" name="username">
    </div>

    <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="pwd">
  </div>
      <select class="form-control" name="type" id="type" class="form-control">
        <option>Student</option>
        <option>Faculty</option>
        <option>Admin</option>
      </select>

    <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" name="login" class="btn btn-default">Log In</button>
</form>
@stop