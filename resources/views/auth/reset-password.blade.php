@extends('auth.authLayouts.signLayout')
@section('title','Reseting the Password')
@section('content')
<div class="passChange">
    <h4>Reseting the Password</h4>
    <div class="subDiv">
        <form action="{{ route('password.update')}}" method="post">
            <h3></h3>
            @csrf
            <input name="email"  type="email" placeholder="email">
            <input name="password"  type="password" placeholder="password">
            <input name="password_confirmation"  type="password" placeholder="password_conf">
            <button>Reset Password</button>
        </form>
    </div>
</div>
@endsection