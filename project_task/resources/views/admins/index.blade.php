@extends("layout.master")
@section("content")
@section("content")


<div align="center">
<h1><b>Admin Page</b></h1>
</div>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
     <div class="col-md-3">
        <a href="{{url('admin/manages-admin')}}" class="btn btn-block btn-lg btn-success" >
            <i class="fa fa-users" id="icone_grande"></i> <br><br>
            <span class="texto_grande"><i class="fa fa-plus-circle"></i> Manage User ({{$count2}})</span></a>
      </div>
      <div class="col-md-3">
        <a href="{{url('admin/manages-list')}}" class="btn btn-block btn-lg btn-danger">
            <i class="fa fa-user" id="icone_grande"></i> <br><br>
            <span class="texto_grande"><i class="fa fa-low-vision"></i> Unread Apllicant ({{$count}})</span></a>
      </div>
      <div class="col-md-3">
        <a class="btn btn-block btn-lg btn-primary" data-toggle="modal" data-target="#mymodal">
            <i class="fa fa-cog fa-spin" id="icone_grande"></i> <br><br>
            <span class="texto_grande"><i class="fa fa-edit"></i> EDIT Usuários</span></a>
      </div>
      <div class="col-md-3">
        <a class="btn btn-block btn-lg btn-warning" data-toggle="modal" data-target="#mymodal">
            <i class="fa fa-pied-piper-alt" id="icone_grande"></i> <br><br>
            <span class="texto_grande"><i class="fa fa-list-ul"></i> LIST Usuários</span></a>
      </div> 
</div>

@stop