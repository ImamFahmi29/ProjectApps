<div class="navbar navbar-fixed-top navbar-custom" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"/>
                <span class="icon-bar"/>
                <span class="icon-bar"/>
            </button>
			<a href="#" class = "navbar-brand" type="">Apps Project</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				@if (Sentinel::check())
					<li><a>Wellcome {!! Sentinel::getUser()->email !!}</a></li>
					<li>{!! link_to(route('logout'), 'Logout') !!}</li>
					
				@else
					<li>{!! link_to(route('register'), 'Register') !!}</li>
					<li>{!! link_to(route('login'), 'Login') !!}</li>
				@endif
				
			</ul>
		</div>
	</div>
</div>
