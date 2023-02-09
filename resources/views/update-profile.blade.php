<form action="{{ route('update.profile') }}" method="post">
    <input type="text" name="username" value="{{$user->username}}">
    <input type="email" name="email" value="{{$user->email}}">
    <button>save</button>
</form>

    <button><a href="{{ route('password.change')}}">change the password</a></button>