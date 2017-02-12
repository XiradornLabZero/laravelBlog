{{-- In those page there is only the variable content and we weant inject into main page --}}
@extends('main')

{{-- Title customization. we can use section ad we pass a var inside --}}
@section('title', '| Contact Page')

{{-- section content yielded into main --}}
@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Contact Me</h1>
		<hr>
		<form action="{{ url('contact') }}" method="POST">
			<div class="form-group">
				<label name="email">Email:</label>
				<input id="email" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label name="subject">Subject:</label>
				<input id="subject" name="subject" class="form-control">
			</div>

			<div class="form-group">
				<label name="message">Message:</label>
				<textarea id="message" name="message" class="form-control">Type your message here...</textarea>
			</div>

			{{ csrf_field() }}

			<input type="submit" value="Send Message" class="btn btn-success">
		</form>
	</div>
</div>

@endsection
