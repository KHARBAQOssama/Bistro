@extends('layouts.dashboardLayout')
@section('title','Dashboard')

@section('content')
<section>
  @if($user->is_admin)
    <button type="button" data-bs-toggle="modal" data-bs-target="#addForm">
      <a href="#add-recipe">Add Recipe</a>
    </button>
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th class="id">number</th>
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
          @if(count($recipes) == 0)
            </tbody>
          </table>

          <div>
            there is no recipes for the moment . 
            <button type="button" data-bs-toggle="modal" data-bs-target="#addForm">
              <a href="#add-recipe">Add Recipe</a>
            </button>
          </div>
          @else

          <?php $count = 1 ?>
          @foreach ($recipes as $recipe)

                <tr>
                    <td class="id">{{$count}}</td>
                    <td class="ellipsis" title="{{$recipe->name}}">{{$recipe->name}}</td>
                    <td class="ellipsis" title="{{$recipe->price}}">{{$recipe->price}}</td>
                    <td class="ellipsis" title="{{$recipe->description}}">{{$recipe->description}}</td>
                    <td ><img class="recipe-image-table" src="{{URL::asset('image/'.$recipe->image)}}" alt=""></td>
                    <td class="buttons">
                        <button><a href="{{route('recipe.edit',['id' => $recipe->id , 'user'=>$user])}}">update</a></button>
                        <button><a href="{{route('recipe.delete',['id' => $recipe->id])}}">delete</a></button>
                    </td>
                </tr>
                <?php $count++ ?>
            @endforeach
        </tbody>
      </table>
      @endif
    </div>
    



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

    @else
    @if(count($recipes) == 0)
          <div>
            there is no recipes for the moment . 
          </div>
          @else
    <div class="recipes">
        @foreach ($recipes as $recipe)
          <div class="recipe">
                <div class="img-container">
                    <img src="{{URL::asset('image/'.$recipe->image)}}" alt="">
                </div>
                <div class="info">
                    <h4 class="title" title="{{$recipe->name}}">{{$recipe->name}}</h4>
                    <p class="desc">{{$recipe->description}}</p>
                    <div class="footer">
                        <h6 class="price">{{$recipe->price}}</h6>
                        <button class="buy">buy now</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
  @endif
</section>
@endsection

{{-- $2y$10$p1.vV6pnVLbSco6Nn5z/0.EsIJwmBDJDqTDZNE2lJuvnOkLN95QpG --}}