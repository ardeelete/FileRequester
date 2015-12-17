@extends('admin.admin')
@section('content')
<div class="container-table">
  <h2>Students</h2>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
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
              <button type="button" class="btn btn-success" formaction="/editstudent">Edit</button>
              <button type="button" class="btn btn-danger" formaction="/deletestudent">Delete</button>
            </div>
        </td>
      </tr>
        
        @endforeach
      
  </table>
  
    <button type="button" class="btn btn-primary" formaction="/createstudent">Add</button>
</div>


@endsection