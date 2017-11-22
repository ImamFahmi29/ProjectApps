@extends('layouts.application')
@section('content')
{!! Form::open(['route' => 'login.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}

<div class="form-group">
	<div class="col-lg-3"></div>
		<div class="col-lg-4">
		<!-- {!! Form::submit('Login', array('class' => 'btn btn-raised btn-primary')) !!} -->
	<br/>
	{!! link_to(route('reminders.create'), 'Forgot Password?') !!}
	</div>
	<div class="clear"></div>
	</div>
{!! Form::close() !!}