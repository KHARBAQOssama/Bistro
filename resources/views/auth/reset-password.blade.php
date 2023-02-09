<form action="{{ route('password.update')}}" method="post">
    <h3>Forgot Password</h3>
    <p>We will send you a reset mail please enter your email</p>
    @csrf
    <input name="email"  type="email" placeholder="email">
    <input name="password"  type="password" placeholder="password">
    <input name="password_confirmation"  type="password" placeholder="password_conf">
    <button>Reset Password</button>
</form>
