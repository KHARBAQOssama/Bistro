@extends('auth.authLayouts.signLayout')
@section('title','Reseting the Password')
@section('content')
<div class="passChange">
    <h4>Forgot Password</h4>
    <div class="subDiv">
        <form action="{{route('password.email')}}" method="post">
            @csrf
            <input name="email"  type="email" placeholder="Please Enter Your Email">
            @error('email')
            <div> {{ $message }}</div>
            @enderror 
            <button>Reset Password</button>
        </form>
    </div>
</div>
@endsection