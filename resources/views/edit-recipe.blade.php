@extends('layouts.dashboardLayout')
@section('title','Dashboard / Recipe Editing')

@section('content')
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
            

            

            
