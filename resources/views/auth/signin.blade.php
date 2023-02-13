@extends('auth.authLayouts.signLayout')
@section('title','Sign Up')
@section('content')
<div class="container" id="container">
	<div class="form-container sign-container">
		<form action="{{ route('login') }}" method="post">
      @csrf
			<h1>Sign in</h1>
			<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
			@error('email')
				<div class="error">{{ $message }}</div>
			@enderror
			<input type="password" name="password" placeholder="Password" />
			@error('password')
				<div class="error">{{ $message }}</div>
			@enderror
			<a href="{{ route('forget.password.get') }}" class="black-link">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1 class="mb-3">Hello, Friend!</h1>
				<button class="ghost" id="signUp"><a href="{{ route('registerPage') }}">Sign Up</a> </button>
			</div>
		</div>
	</div>
</div>
@endsection