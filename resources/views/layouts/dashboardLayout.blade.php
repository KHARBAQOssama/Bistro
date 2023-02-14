<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{URL::asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/alertStyle.css')}}">
    <title>@yield('title')</title>
</head>
<body>
  <div id="alert" class="alert hide">
    <span class="fas fa-exclamation-circle"></span>
    <span id="msg" class="msg"></span>
    <div id="close-btn" class="close-btn">
       <span class="fas fa-times"></span>
    </div>
  </div>
  <script src="{{URL::asset('js/alert.js')}}"></script>


    <nav>
        <a href="/home"><img src="{{URL::asset('image/logo.png')}}" height="40" alt=""></a>
        <div class="nav">
          <img src="{{URL::asset('image/profile.png')}}" height="25" alt="">
          <div class="navinfo">
            <h6 title="{{$user->username}}">{{$user->username}}</h6>
            <p title="{{$user->email}}">{{$user->email}}</p>
          </div>
          <div>
              <button><a href="{{route('edit-profile')}}"><i class="bi bi-pen"></a></i></button>
              <button><a href="{{route('logout')}}" id="logout"><i class="bi bi-box-arrow-right"></i></a></button>
          </div>
          
        </div>
      </nav>



    @yield('content')
    @yield('sidebar')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
      document.getElementById('logout').addEventListener('click',function(){
          window.location.reload(true);
      })
    </script>

    @if (session('message'))
    <script>
        showAlert("{{ session('message') }}");
    </script>
    @endif
    @if (session('error'))
    <script>
        showAlert("{{ session('error') }}");
    </script>
    @endif
</body>
</html>