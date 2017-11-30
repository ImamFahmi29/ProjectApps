@extends("layouts.home")
@section("content")
<div align="center">
<h1><b>Dashboard Admin</b></h1>
<hr><br>
</div>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div align="center" class="container">
     <div class="col-md-3 col-md-offset-3">
        <a href="{{url('admin/manages-admin')}}" class="btn btn-block btn-lg btn-primary" >
            <i class="fa fa-users" id="icone_grande"></i><br>
            <span class="texto_grande"><i class="fa fa-plus-circle"></i> Kelola User ({{$users}})</span></a>
      </div>
      <div class="col-md-3">
        <a href="{{url('admin/manages-list')}}" class="btn btn-block btn-lg btn-primary">
            <i class="fa fa-envelope" id="icone_grande"></i><br>
            <span class="texto_grande"><i class="fa fa-low-vision"></i> Kelola CV ({{$doc}})</span></a>
      </div>
      </center>
</div>
<br>
<hr>
@stop