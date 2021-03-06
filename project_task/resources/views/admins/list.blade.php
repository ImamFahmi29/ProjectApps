@extends('layouts.home')
@section('content')
<h2 align="center">Daftar CV</h2><hr>
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
            {{$detail->status}}         
        </td>
        <td>            
            {!! link_to(route('change', $detail->user_id), 'Terima', ['class' => 'btn btn-success'])!!}                  
            {!! link_to(route('reject', $detail->user_id), 'Tolak', ['class' => 'btn btn-danger']) !!}                  
        </td>
    </tr>
@endforeach
</table>
<br>
{!! link_to(route('manages.index'), 'Back', ['class' => 'btn btn-primary']) !!}
@stop