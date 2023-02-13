@extends('auth.authLayouts.signLayout')
@section('title','Reseting the Password')
@section('content')
<div class="passChange">
    <h4>Reseting the Password</h4>
    <div class="subDiv">
        @if (session('message'))
            <div class="">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('reset.password.post') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input name="email"  type="email" placeholder="email">
            <input name="password"  type="password" placeholder="password">
            <input name="password_confirmation"  type="password" placeholder="password_conf">
            <button>Reset Password</button>
        </form>
    </div>
</div>
@endsection