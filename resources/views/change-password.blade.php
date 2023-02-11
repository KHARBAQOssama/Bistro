@extends('layouts.dashboardLayout')
@section('title','Dashboard / Changing The Password')

@section('content')
    @if (session('status'))
        <div class="">
            {{ session('status') }}
        </div>
    @endif
    <div class="passChange">
        <h4>Edit Password</h4>
            <div class="subDiv">
<form action="{{ route('update.password') }}" method="post">
    @csrf
    @method('PATCH')
    <input type="password" name="old_password" placeholder="old password" id="">
    @error('old_password')
        <div class="error"> {{ $message }}</div>
    @enderror
    {{-- @if ($errors->any())
    <div class="error">
        
    </div>
    @endif --}}
    <input type="password" name="password" placeholder="new password" id="">
    @error('new_password')
        <div class="error"> {{ $message }}</div>
    @enderror
    <input type="password" name="password_confirmation" placeholder="new password confirmatin" id="">
    <button>change the password</button>
</form>
</div>
    
</div>
@endsection
