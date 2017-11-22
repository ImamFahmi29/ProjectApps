<div class="col-md-3">
			@foreach($comments as $comment)
				<p>{!! $comment->content !!}</p>
				<i>{!! $comment->user !!}</i>
			@endforeach
</div>