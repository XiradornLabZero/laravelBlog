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
		<div class="post">
			<h3>Post Title</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis amet tenetur eum, consequuntur assumenda officiis quidem omnis placeat. Sequi ex fugiat reiciendis at eligendi inventore ad, odio magnam velit doloribus...</p>
			<a href="#" class="btn btn-primary">Read More</a>
		</div>

		<hr>

		<div class="post">
			<h3>Post Title</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis amet tenetur eum, consequuntur assumenda officiis quidem omnis placeat. Sequi ex fugiat reiciendis at eligendi inventore ad, odio magnam velit doloribus...</p>
			<a href="#" class="btn btn-primary">Read More</a>
		</div>

		<hr>

		<div class="post">
			<h3>Post Title</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis amet tenetur eum, consequuntur assumenda officiis quidem omnis placeat. Sequi ex fugiat reiciendis at eligendi inventore ad, odio magnam velit doloribus...</p>
			<a href="#" class="btn btn-primary">Read More</a>
		</div>

		<hr>

		<div class="post">
			<h3>Post Title</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis amet tenetur eum, consequuntur assumenda officiis quidem omnis placeat. Sequi ex fugiat reiciendis at eligendi inventore ad, odio magnam velit doloribus...</p>
			<a href="#" class="btn btn-primary">Read More</a>
		</div>

		<hr>
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