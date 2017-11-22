@extends("layouts.application")
@section("content")
<div class="row">
	<div class="col-lg-3">
		<h2 class="pull-left">List Articles</h2>
	</div>
	<div class="col-lg-9">
		<br>
		<!-- {!! link_to(route("articles.create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!} -->
	</div>
</div>
@include('articles.list')
@stop