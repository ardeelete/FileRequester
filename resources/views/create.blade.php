@extends('admin')
@section('content')

<div class="container">

        <form role="form" method="POST" action"e">
            <input type='hidden' name='_token' value='{{{csrf_token() }}}'>
            <div class="form-group">
                <label for="usr">Username: </label>
                <input type="text" class="form-control" id="usr" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        
            <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd" required>
          
            <label><input type="checkbox"> Remember me</label>
          </div>
          <button type="submit" name="login" class="btn btn-default">Log In</button>
        </form>
        
        </div>
@stop