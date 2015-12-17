@extends('home')
@section('nav')
<ul class="nav navbar-nav">
        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Class Records<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">List</a></li>
                    <li><a href="/createclass">Create</a></li>
                    <li><a href="#">Edit</a></li>
                    <li><a href="#">Delete</a></li>
                    <li><a href="#">Search</a></li>
                  </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Request Records<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">List</a></li>
                    <li><a href="/createrequest">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Search</a></li>
                  </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student Records<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/liststudent">List</a></li>
                    <li><a href="#">Search</a></li>
                  </ul>
                  </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
      
@stop
@section('aside')

<aside>

    
    <div class="content-class">
        
          <div class="panel panel-primary">
               <div class="panel-heading"><h1>Classes</h1></div>
    <div class="panel-body"> 
              
            <ul class="nav nav-pills nav-stacked">
                @foreach ($classnames as $classname)
                    
                    <li class="active"><a href="#" >{{ $classname }}</a></li>
                @endforeach
            </ul></div>
  

</aside>
<section>
    <div class="container">
<form class="form-inline" role="form">
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>   Search </button>
  <div class="form-group">
    <input class="form-control" id="focusedInput" type="text">
  </div>
  </form>
  
  @yield('table')
  
  
</div>
  </section>
  
@stop