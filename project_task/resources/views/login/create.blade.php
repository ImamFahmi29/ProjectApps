@extends("layouts.home")
@section("content")

{!! Form::open(['route' => 'login.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
<h2 align="center">Login Now</h2>
<hr>
<div class="form-group">
	{!! Form::label('email', 'Email', array('class' => 'col-lg-4 control-label')) !!}
	<div class="col-lg-4">
	{!! Form::text('email', null, array('class' => 'form-control'))!!}
	<div class="text-danger">{!! $errors->first('email') !!}</div>
	</div>
	<div class="clear"></div>
</div>

<div class="form-group">
	{!! Form::label('password', 'Password', array('class' => 'col-lg-4 control-label')) !!}
	<div class="col-lg-4">
	{!! Form::password('password', array('class' => 'form-control')) !!}
	<div class="text-danger">{!! $errors->first('password')!!}</div>
	</div>
	<div class="clear"></div>
</div>

<div class="form-group">
	{!! Form::label('remember', 'Remember Me', array('class' => 'col-lg-4 control-label')) !!}
	<div class="col-lg-4">
	{!! Form::checkbox('remember', null, array('class' => 'form-control')) !!}
	</div>
	<div class="clear"></div>
</div>

<div class="form-group">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
	{!! Form::submit('Login', array('class' => 'btn btn-raised btn-primary')) !!}
	<br>
	
	</div>
	<div class="clear"></div>
</div>
<hr>
{!! Form::close() !!}
@stop