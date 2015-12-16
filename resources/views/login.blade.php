@extends('layout')

<!-- resources/views/auth/login.blade.php -->
@section('content')
<div class="container1">
    
    <div class="content">
        
        <div class="title">File Requester</div>
        
        <form role="form" method="POST" action"/https://file-requester-ardeelete.c9users.io/home">
            <input type='hidden' name='_token' value='{{{csrf_token() }}}'>
            <div class="form-group">
                <label for="usr">Email address:</label>
                <input type="usr" class="form-control" id="usr" name="username" required>
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
          
    </div>
    
</div>
@stop