<form action="{{route('password.email')}}" method="post">
    <h3>Forgot Password</h3>
    <p>We will send you a reset mail please enter your email</p>
    @csrf
    <input name="email"  type="email">
    <button>Reset Password</button>
</form>

@error('status')
@enderror
@error('email')
@enderror
