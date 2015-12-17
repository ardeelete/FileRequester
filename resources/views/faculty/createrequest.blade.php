@extends('faculty.faculty')
@section('table')
<h1>Create Request</h1>
<div class="container">

        <form role="form" method="POST" action"/createrequest" enctype="multipart/form-data">
            <input type='hidden' name='_token' value='{{{csrf_token() }}}'/>
            <div class="form-group">
                <label for="req_name">Request Name</label>: </label>
                <input type="text" class="form-control" id="req_name" name="req_name" required/>
            </div>
            <div class="form-group">
                <label for="req_desc">Description: </label>
                <textarea rows="3" class="form-control" id="req_desc" name="req_desc" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="deadline">Deadline: </label>
                <input type="date" class="form-control" id="deadline" name="deadline" required/>
            </div>
            
              <div class="form-group">
            <div class="form-inline"> 
                
                <label for="size_limit">File Size Limit: </label>
                      
                <input type="number" name="size_limit" min="0.01" max="999.99" step="0.01" required/>
                    <select class="form-control" name="bytes" id="byte" class="form-control">
                        <option>kb</option>
                        <option>mb</option>
                     </select>
              </div>
              </div>
              <div class="form-group">
                <label for="mime_type[]">File Types: </label>
                <div class="mime">
                    <div class="checkbox">
                        @foreach($columns as $column =>$value)
                        @if($column != 0)
                        <label class="checkbox-inline"><input type="checkbox" name="mime_type[]" value="{{{$value}}}"/>.{{$value}}</label>
                        @endif
                        @endforeach
                    </div>
                </div>
                    
            </div>
            
            <div class="form-group">
            <label for="yrLevel">Class Name: </label>
              <select class="form-control" name="class_name" id="class_name" class="form-control">
                @foreach ($classnames as $classname)
                    <option>{{ $classname }}</option>
                @endforeach
              </select>
              </div>
            
          <button type="submit" name="create" class="btn btn-default">Create Request</button>
        </form>
        
        </div>
@stop