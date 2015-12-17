@extends('faculty.faculty')
@section('table')
<h1>Create Class</h1>
<div class="container">

        <form role="form" method="POST" action"/createclass">
            <input type='hidden' name='_token' value='{{{csrf_token() }}}'>
            
            <div class="form-group">
                <label for="class_name">Class Name: </label>
                <input type="text" class="form-control" id="class_name" name="class_name" required>
            </div>
            <div class="form-group">
                <label for="class_desc">Description: </label>
                <textarea rows="3" class="form-control" id="class_desc" name="class_desc" required></textarea>
            </div>
            
          
          <div class="form-group">
          <button type="submit" name="addclass" class="btn btn-default">Create</button>
          </div>
        </form>
        
        </div>
@stop