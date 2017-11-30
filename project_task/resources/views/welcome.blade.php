@extends('layouts.home')
@section('content')
{!! link_to(route('users.index'), "View User Detail", ['class' => 'btn btn-primary']) !!}
@stop