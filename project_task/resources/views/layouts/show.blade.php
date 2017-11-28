@extends('layouts.home')
@section('content')

<table id="customers">
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Post Code</th>
    <th>No. Hp</th>
    <th>CV</th>
    <th>Status</th>
  </tr>
@foreach ($user_details as $user){
	<tr>
		<th>
			{!! $user->first_name!!}
		</th>
		<th>
			{!! $user->address!!}
		</th>
		<th>
			{!! $user->post!!}
		</th>
		<th>
			{!! $user->no_hp!!}
		</th>
		<th>
			{!! $user->upload!!}
		</th>
		<th>
			<button class="btn btn-submit">Unread</button>
		</th>
	</tr>
}
@endforeach
</table>
@stop