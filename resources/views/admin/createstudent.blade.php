@extends('admin.admin')
@section('content')

<div class="container">

        <form role="form" method="POST" action"/createstudent" enctype="multipart/form-data">
            <input type='hidden' name='_token' value='{{{csrf_token() }}}'>
            <div class="form-group">
                <label for="id_num">ID: </label>
                <input type="text" class="form-control" id="id_num" name="id_num" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo: </label>
            <input type="file" name="photo" id="photo" required>
            </div>
            <div class="form-group">
                <label for="fname">First Name: </label>
                <input type="text" class="form-control" id="fname" name="fname" required>
            </div>
            
            <div class="form-group">
                <label for="lname">Last Name: </label>
                <input type="text" class="form-control" id="lname" name="lname" required>
            </div>
            <div class="form-group">
                
            <label for="gender">Gender: </label>
              <select class="form-control" name="gender" id="gender" class="form-control">
                <option>Male</option>
                <option>Female</option>
              </select>
              </div>
              
              <div class="form-group">
                <label for="course">Course: </label>
                <input type="text" class="form-control" id="course" name="course" required>
            </div>
            <div class="form-group">
            <label for="yrLevel">Year Level: </label>
              <select class="form-control" name="yrLevel" id="yrLevel" class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              </div>
            
          <button type="submit" name="create" class="btn btn-default">Add Student</button>
        </form>
        
        </div>
@stop