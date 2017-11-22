@extends("layouts.application")


	<!-- {!! Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) !!}
	{!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info','hide']) !!}	
	{!! link_to(route('articles.edit', $article->id), 'Edit', ['class'=> 'btn btn-raised btn-warning','hide']) !!}
	{!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger','hide', "onclick" => "return confirm('are you sure?')")) !!}
	{!! Form::close() !!} -->
<!-- 	<h3>Give Comments</h3>
		<div class="col-sm-12 col-md-7 col-lg-7">
			{!! Form::open(['route' => 'comments.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
	<div class="form-group">
	
		<div class="col-lg-2">
			{!! Form::label('article_id', 'Title', array('class' => 'col-lg-3 control-label')) !!}
		</div>
		<div class="col-lg-10">
			{!! Form::text('article_id', $value = $article->id, array('class'=> 'form-control', 'readonly','hidden')) !!}
		</div>
		
	
</div>
<div class="form-group">
	<div clas="rows">
		<div class="col-md-2">
			{!! Form::label('content', 'Comment', array('class' => 'col-md-1 control-label')) !!}
		</div>
		<div class="col-md-10">
			{!! Form::textarea('comment', null, array('class' => 'form-control', 'rows' => 3, 'autofocus' => 'true')) !!}
			{!! $errors->first('content') !!}
		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="form-group">
	<div clas="rows">
		<div class="col-sm-2">
			{!! Form::label('user', 'User', array('class' => 'col-lg-3 control-label')) !!}
		</div>
		<div class="col-sm-10">
			<input type="email" name="user" id="user"  class="form-control" placeholder="Input Email">
		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="form-group">
	<div class="rows">
		<div class="col-md-1">
			{!! Form::submit('Save', array('class' => 'btn btn-raised btn-primary')) !!}
		</div>
		<div class="clear"></div>
	</div>
</div>

</div> -->
	<!-- <div class="col-sm-12 col-md-5 col-lg-5">
		@foreach($comments as $comment)
			<div style="padding: 10px;outline: 2px solid #008B8B">
				<p>{!! $comment->comment !!}</p>
				<b><i>{!! $comment->user !!}</i></b>
			</div>
		@endforeach
	</div>
	
</div> -->
@section("content")
    <div class="form-group">
	<h3>{!! $article->title !!}</h3>
	<div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
		<a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $article->image }}">
			<img class="img-responsive" alt="" src="/images/{{ $article->image }}" />
			<div class='text-center'>
				<small class='text-muted'>{{ $article->title }}</small>
			</div> <!-- text-center / end -->
		</a>
	</div>
	<p align="justify">{!! $article->content !!}</p>
</div>
	<!-- <i>By {!! $article->author !!}</i> -->
    <div class="col-md-8 col-md-offset-2">
        <h2 class="text-center">Comments</h2>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <a href="#" class="add-modal"><li>Add a Comment</li></a>
                </ul>
            </div>
        
            <div class="panel-body">
                   <table class="table table-striped table-bordered table-hover" id="postTable" style="visibility: hidden;">
  @foreach($comments as $indexKey =>$comment)
  <tr class="item{{$comment->id}}">
    <!-- <td class="col1">{{ $indexKey+1 }} </td> -->
    <td>{{ $comment->content}}
    <br/>
     By : {{$comment->user}}
   </td>
    <td> <button class="delete-modal btn btn-danger" data-id="{{$comment->id}}" data-user="{{$comment->user}}" data-content="{{$comment->comment}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
              </td>
  </tr>
  @endforeach
</table>
</div>
</div>
</div>
<!--add Modal -->
<div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                      <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
                      {{ Form::hidden('article_id',  $value = $article->id, array('id' => 'id_add')) }}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">User:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user_add" name="user" autofocus>
                                <!-- {!! $errors->first('user') !!} -->
                                <small>First name or Last name</small>
                                <p class="errorUser text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Comment:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_add" cols="40" rows="5" name="content"></textarea>
                                <!-- {!! $errors->first('comment') !!} -->
                                <small>Min: 2, Max: 128, only text</small>
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">User:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="title_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Comment:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following comment?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Comment:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="title_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop