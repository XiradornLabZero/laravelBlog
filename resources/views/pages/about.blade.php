{{-- In those page there is only the variable content and we weant inject into main page --}}
@extends('main')

{{-- Title customization. we can use section ad we pass a var inside --}}
@section('title', '| About page')

{{-- section content yielded into main --}}
@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>About Me</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis aspernatur quas quibusdam veniam sunt animi, est quos optio explicabo deleniti inventore unde minus, tempore enim ratione praesentium, cumque, dolores nesciunt?</p>
	</div>
</div>

@endsection

