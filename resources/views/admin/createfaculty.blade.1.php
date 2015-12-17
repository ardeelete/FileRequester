@extends('admin')
@section('content')

<div class="container">

        <form role="form" method="POST" action"/create">
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
          
            
          </div>
          <button type="submit" name="create" class="btn btn-default">Create Class</button>
        </form>
        
        </div>
@stop