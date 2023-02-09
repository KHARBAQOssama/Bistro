@extends('layouts.dashboardLayout')
@section('title','Dashboard')

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
    <button type="button" data-bs-toggle="modal" data-bs-target="#addForm">
      <a href="#add-recipe">Add Recipe</a>
    </button>
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th class="id">id</th>
            <th>name</th>
            <th>Price</th>
            <th>description</th>
            <th>image</th>
            <th>events</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
          @foreach ($recipes as $recipe)
                <tr>
                    <td class="id">{{$recipe->id}}</td>
                    <td class="ellipsis">{{$recipe->name}}</td>
                    <td class="ellipsis">{{$recipe->price}}</td>
                    <td class="ellipsis" title="{{$recipe->description}}">{{$recipe->description}}</td>
                    <td ><img class="recipe-image-table" src="{{URL::asset('image/'.$recipe->image)}}" alt=""></td>
                    <td class="buttons">
                        <button><a href="{{route('recipe.edit',['id' => $recipe->id , 'user'=>$user])}}">update</a></button>
                        <button><a href="{{route('recipe.delete',['id' => $recipe->id])}}">delete</a></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="recipes">
        @foreach ($recipes as $recipe)
          <div class="recipe">
                <div class="img-container">
                    <img src="{{URL::asset('image/'.$recipe->image)}}" alt="">
                </div>
                <div class="info">
                    <h4 class="title">{{$recipe->name}}</h4>
                    <p class="desc">{{$recipe->description}}</p>
                    <div class="footer">
                        <h6 class="price">{{$recipe->price}}</h6>
                        <button class="buy">buy now</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('add.recipe')}}" method="post" enctype="multipart/form-data" id="add-recipe">
        @csrf
        <h4>ADD A RECIPE</h4>
            <input type="text" name="name" placeholder="name">
            @error('name')
				<div class="error">{{ $message }}</div>
		    @enderror
            <textarea type="text" name="description" placeholder="description"></textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
            <input type="number" name="price" placeholder="price">
            @error('price')
            <div class="error">{{ $message }}</div>
            @enderror
            <input type="file" name="image" accept="image/*">
            <input type="hidden" name="publisher" value="{{ $user->id }}">
            @error('image')
            <div class="error">{{ $message }}</div>
            @enderror
            <button>submit</button>
        </form>
    </div>
  </div>
</div>

@endsection
