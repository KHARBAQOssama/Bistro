@extends('auth.authLayouts.signLayout')
@section('title','Sign Up')
@section('content')
<div class="container" id="container">
	<div class="form-container sign-container">
		<form action="{{ route('signup') }}" method="post" class="">
      @csrf
			<h1>Create Account</h1>
			<input type="text" name="username" placeholder="Name" value="{{ old('username') }}"/>
			@error('username')
				<div class="error">{{ $message }}</div>
			@enderror
			<input type="email" name="email" placeholder="Email" value="{{ old('email') }}"/>
			@error('email')
				<div class="error">{{ $message }}</div>
			@enderror
			<input type="password" name="password" placeholder="Password" />
			@error('password')
				<div class="error">{{ $message }}</div>
			@enderror
			<input type="password" name="password_confirmation" placeholder="Repeat The Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1 class="mb-3">Welcome Back!</h1>
				<button class="ghost" id="signIn"><a href="{{ route('signInPage') }}">Sign In</a></button>
			</div>
		</div>
	</div>
</div>
@endsection