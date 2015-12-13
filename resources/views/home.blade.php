@extends('layout')
@section('content')
<form role="form" method="POST" action"/home">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<button type="submit" name="logout" class="btn btn-default">Log out</button>
</form>
@stop