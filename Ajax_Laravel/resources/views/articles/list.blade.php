@foreach($articles as $article)
<article class="row">
	<hr>
	<h3>{!!$article->title!!}</h3>

		<div class='col-sm-3 col-xs-6 col-md-3 col-lg-3'>
			<a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $article->image }}">
				<img class="img-responsive" alt="" src="/images/{{ $article->image }}" />
				<div class='text-center'>
					<small class='text-muted'>{{ $article->title }}</small>
				</div> <!-- text-center / end -->
			</a>
		</div>

{!! str_limit($article->content, 250) !!}
{!! link_to(route('articles.show', $article->id), 'Read More') !!}

</article>
<hr>
@endforeach