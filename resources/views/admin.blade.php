@extends('home')
@section('nav')
<ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a>
        </li>
        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Teacher Records<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/create">Create</a></li>
                    <li><a href="#">Edit</a></li>
                    
                    <li><a href="#">Delete</a></li>
                  </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student Records<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Edit</a></li>
                    
                    <li><a href="#">Delete</a></li>
                  </ul></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
@stop

