{{-- In those page there is only the variable content and we weant inject into main page --}}
@extends('main')

{{-- Title customization. we can use section ad we pass a var inside --}}
@section('title', '| Home page')

{{-- If i have a element that a don't want in all page but in a specific page i can use this specific
@section('stylesheet')
	<link rel="stylesheets" href="style.css" type="text/css">
@endsection --}}

{{-- section content yielded into main --}}
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="jumbotron">
			<h1>Welcome to My Blog!</h1>
			<p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
			<p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
		</div>
	</div>
</div>
<!-- end of header .row -->

<div class="row">
	<div class="col-md-8">

		@foreach ($posts as $post)

			<div class="post">
				<h3>{{ $post->title }}</h3>
				<p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? ' ...' : '' }}</p>
				<a href="{{ url("blog/$post->slug") }}" class="btn btn-primary">Read More</a>
			</div>

			<hr>
		@endforeach

	</div>

	<div class="col-md-3 col-md-offset-1">
		<h2>Sidebar</h2>
	</div>
</div>
@endsection

{{-- If i have a element that a don't want in all page but in a specific page i can use this specific
@section('scripts')
	<script src="js/scripts.js"></script>

	Just a fast example
	<script type="text/javascript">
		confirm('Caricato del js');
	</script>
@endsection --}}
