{{-- this page have all the repetitive elenets in ALL pages we will build. Those elements never changes in all pages and tha's because we put thos in this areas --}}
{{-- the only exception is for active elemment but we fix this case in future lesson --}}
<!DOCTYPE html>
<html lang="en">
	<head>

		@include('partials._head')

	</head>

	<body>

		@include('partials._nav')

		<div class="container">

			@include('partials._messages')

			{{-- we create an if statment for login check --}}
			<div class="alert alert-{{ Auth::check() ? 'success' : 'danger' }}">{{ Auth::check() ? 'logged in' : 'logged out' }}</div>

			{{-- content inside change and we have to inject this with yield --}}
			@yield('content')

			{{-- partials for footer --}}
			@include('partials._footer')

		</div>
		<!-- end of .container -->

		@include('partials._javascript')

		@yield('scripts')

	</body>

</html>
