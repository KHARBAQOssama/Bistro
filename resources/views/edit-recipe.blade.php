@extends('layouts.dashboardLayout')
@section('title','Editing')

@section('content')
<nav>
    <img src="{{URL::asset('image/logo.png')}}" height="40" alt="">
    <div class="dropdown">
      <img src="{{URL::asset('image/profile.png')}}" height="25" alt="">
      <h6>{{$user->username}}</h6>
      <button><i class="bi bi-caret-down-fill"></i></button>
      <div class="list">
        <ul>
          <li><i class="bi bi-at"></i> {{$user->email}}</li>
          <li><a href="">Edit Profile</a></li>
          <li><a href="{{route('logout')}}">logout <i class="bi bi-box-arrow-right"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
<section>
<form action="{{ route('recipe.update') }}" method="post" enctype="multipart/form-data" style="" class="editing">
    <h4>Editing The Recipe</h4>
    @csrf
            <input type="text" name="name" value="{{$recipe->name}}" placeholder="name">
            @error('name')
				<div class="error">{{ $message }}</div>
		    @enderror
            <input type="hidden" name="id" value="{{$recipe->id}}">
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
            <input type="number" name="price" value="{{$recipe->price}}" placeholder="price">
            @error('price')
            <div class="error">{{ $message }}</div>
            @enderror
            <textarea type="text" rows="5" name="description" value="" placeholder="description">{{$recipe->description}}</textarea>
            <div class="image">
            <input type="file" name="image">
            @error('image')
            <div class="error">{{ $message }}</div>
            @enderror
                <img src="{{URL::asset('image/'.$recipe->image)}}" alt="">
            </div>
<button>save</button>
</form>
</section>

            
@endsection
            

            

            
