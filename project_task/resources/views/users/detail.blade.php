@extends("layouts.home")
@section("content")

{!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'role' => 'form','files'=>'true']) !!}

<h2 align="center">Fill in First</h2><hr>

<div class="form-group">
	{!! Form::label('full_name', 'Full Name', array('class' => 'col-lg-4 control-label')) !!}
	<div class="col-lg-4">
		{!! Form::text('first_name', null, array('class' => 'form-control')) !!}
		<div class="text-danger"> {!! $errors->first('first_name') !!}</div>
	</div>
	<div class="clear"></div>
</div>

<div class="form-group">
	{!! Form::label('address', 'Address', array('class' =>'col-lg-4 control-label')) !!}
		<div class="col-lg-4">
			{!! Form::textarea('address', null, array('class' => 'form-control')) !!}
				<div class="text-danger">{!! $errors->first('address')!!} </div>
		</div>
		<div class="clear"></div>
</div>

<div class="form-group">
	{!! Form::label('post_code', 'Post Code', array('class' => 'col-lg-4 control-label')) !!}
		<div class="col-lg-4">
			{!! Form::text('post', null, array('class' => 'form-control')) !!}
				<div class="text-danger">{!! $errors->first('post')!!}</div>
		</div>
		<div class="clear"></div>
</div>
<div class="form-group">
	{!! Form::label('no_hp', 'No. Hp', array('class' => 'col-lg-4 control-label')) !!}
		<div class="col-lg-4">
			{!! Form::text('no_hp', null, array('class' => 'form-control')) !!}
				<div class="text-danger">{!! $errors->first('no_hp')!!}</div>
		</div>
		<div class="clear"></div>
</div>
<div class="form-group">
	{!! Form::label('upload', 'Upload CV', array('class' => 'col-lg-4 control-label')) !!}
		<div class="col-lg-4">
			{!! Form::file('upload', null, array('class' => 'form-control')) !!}
				<div class="text-danger">{!! $errors->first('upload')!!}</div>
		</div>
		<div class="clear"></div>
</div>
<div class="form-group">
	<div class="col-lg-4"></div>
		<div class="col-lg-4">
		{!! Form::submit('Submit', array('class' => 'btn btn-raised btn-primary')) !!}
	</div>
	<div class="clear"></div>
</div>
<hr>
{!! Form::close() !!}

@stop