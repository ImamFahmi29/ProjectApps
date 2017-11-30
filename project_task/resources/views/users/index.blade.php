@extends('layouts.home')
@section('content')

<h2 align="center">Your CV</h2><hr>
<table id="customers">
  <tr align="center">
    <th>Nama</th>
    <th>Alamat</th>
    <th>Kode Pos</th>
    <th>No. Handphone</th>
    <th>CV</th>
    <th>Status</th>
    <th>Aksi</th>
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
			<button type="submit" class="btn btn-primary">Edit</button>
		</td>
	</tr>

</table>
@endforeach
@stop