<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{URL::asset('css/sign.css')}}">
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
@yield('content') 

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