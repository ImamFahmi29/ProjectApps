@extends("layouts.application")
@section("content")
<h3>Edit User</h3>
{!! Form::model($UserDetail, ['route' => ['user.update', $details->id],'files'=>'true', 'method' => 'put','class' => 'form-horizontal', 'role'=>'form']) !!}
@include('users.detail')
{!! Form::close() !!}
@stop