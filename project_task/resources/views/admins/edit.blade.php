@extends("layouts.home")
@section("content")
<h3>Edit Article</h3>
{!! Form::model($user, ['route' => ['manages.update', $user->user_id],'files'=>'true', 'method' => 'put','class' => 'form-horizontal', 'role'=>'form']) !!}
@include('users.detail')
{!! Form::close() !!}
@stop