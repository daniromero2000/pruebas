<nav class="navbar navbar-inverse">
	<div class="container-fluid">

		@unless (Auth::guest())
		<div class="col-sm-3 collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-left">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Project <span
							class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/projects') }}">List</a></li>
						<li><a href="{{ url('/projects/create') }}">Create</a></li>
					</ul>
				</li>
				@if(App\Project::all()->count() > 0)
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Issue <span
							class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/issues') }}">List</a></li>
						<li><a href="{{ url('/issues/create') }}">Create</a></li>
					</ul>
				</li>
				@endif
			</ul>
		</div>
		@endunless
	</div>
</nav>
@if($errors->any())
<div class="row">
	<div class="pull-right alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{$errors->first()}}
	</div>
</div>
@endif