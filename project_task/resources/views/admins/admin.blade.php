@extends('layouts.home')
@section('content')
<h2 align="center">Kelola User</h2><hr>
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
             <a href="{{ URL::to( '/cv/'. $detail->upload)  }}" target="_blank"><b>Download CV</b></a>
        </td>
        <td>
            {!! $detail->status!!}
        </td>
        <td>
        	{!! link_to(route('manages.edit',$detail->user_id), 'Edit', ['class' => 'btn btn-primary control-label']) !!}
        	{!! link_to(route('manages.destroy',$detail->user_id), 'Delete', ['class' => 'btn btn-danger control-label']) !!}
        </td>
    </tr>
@endforeach
</table>
<br><br>
 {!! link_to(route('manages.index'), 'Kembali', ['class' => 'btn btn-primary control-label']) !!}
@stop