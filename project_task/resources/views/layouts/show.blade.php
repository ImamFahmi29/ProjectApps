@extends('layouts.home')
@section('content')

<h2 align="center">Your CV</h2><hr>
{!! Form::open(['route' => 'user.edit', 'class' => 'form-horizontal', 'role' => 'form']) !!}
<div class="form-group">
	{!! link_to(route('user.detail'), "Create User Detail", ['class' => 'btn btn-primary']) !!}
</div>
<table id="customers">
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Post Code</th>
    <th>No. Hp</th>
    <th>CV</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
@foreach ($details as $detail)
	<tr>
		<td>
			{!! $detail->first_name!!}
		</td>
		<td>
			{!! $detail->address!!}
		</td>
		<td>
			{!! $detail->post!!}
		</td>
		<td>
			{!! $detail->no_hp!!}
		</td>
		<td>
			{!! $detail->upload!!}
		</td>
		<td>
			{!! $detail->status!!}
		</td>
		<td>
			<button class="btn btn-primary Edit">Edit</button>
		</td>
	</tr>

</table>
@endforeach
{!! Form::close() !!}
@stop