@extends('layouts.home')
@section('content')

<h2 align="center">Your CV</h2><hr>
<table id="customers">
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Post Code</th>
    <th>No. Hp</th>
    <th>CV</th>
    <th>Status</th>
   <!--  <th>Action</th> -->
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
		
	</tr>

</table>
@endforeach
<br><br>
{!! link_to(route('user.detail'), "Create User Detail", ['class' => 'btn btn-primary']) !!}
@stop