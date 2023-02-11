@extends('layouts.dashboardLayout')
@section('title','Dashboard / Profile Editing')

@section('content')

<div class="passChange">
    <h4>Edit Profile Info</h4>
        <div class="subDiv">
            <form action="{{ route('update.profile') }}" method="post">
                @csrf
            <input type="text" name="username" value="{{$user->username}}">
            @error('username')
                <div>{{ $message }}</div>
            @enderror
            <input type="email" name="email" value="{{$user->email}}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="footer">
                <button>save</button>
            </div>
        </form>

        <button><a href="{{ route('password.change') }}">Edit Password</a></button>
    </div>
    
</div>

@endsection

