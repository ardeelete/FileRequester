@extends('faculty.faculty')
@section('table')


  <h2>Students</h2>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th >ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Course</th>
        <th>Year Level</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
        <td>{{ $student->id_num }}</td>
        <td>{{ $student->stud_fname }}</td>
        <td>{{ $student->stud_lname }}</td>
        <td>{{$student->stud_gender }}</td>
        <td>{{ $student->course }}</td>
        <td>{{ $student->yrlevel }}</td>
        <td><div class="btn-group">
            <div class="form-group">
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Add
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  @foreach($classnames as $classname)
                    <li><a href="/add{{$classname}}/{{{$student->id_num}}}">{{$classname}}</a></li>
                  @endforeach
                </ul>
                <button type="button" class="btn btn-primary" formmethod="get" formaction="/removeclassStudent">Remove</button>
              </div>
              
            </div>
            
        </td>
      </tr>
      @endforeach
  </table>
    <form>
  <div class="form-group">
        <div class="form-inline">
          
              <button type="submit" class="btn btn-primary" formmethod="post" formaction="http://file-requester-ardeelete.c9users.io/addclass/all">Add All</button>
          
            <input type='hidden' name='_token' value='{{{csrf_token() }}}'>
              <select class="form-control" name="class_name" id="class_name" class="form-control">
                @foreach($classnames as $classname)
                <option>{{$classname}}</option>
                @endforeach
              </select>
          </div>
          </div>
          
    </form>
  
@endsection