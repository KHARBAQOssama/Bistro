<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center
        }
        img{
            width: 55%;
        }
        button{
            margin: 1em 0;
            padding: .4em 4em;
            background-color: transparent;
            border: 2px solid #378B71; 
            color: #378B71;
            border-radius: 10px;  
            transition: all .5s ease;          
        }
        a{
            color: #378B71;
            text-decoration: none;
        }
        button:hover{
            background-color: #378B71;
            color: white;        
        }
        button:hover > a{
            color: white;        
        }
    </style>
    <title>UnAuthorized</title>
</head>
<body>
    <img src="{{URL::asset('image/401.png')}}" alt="">
    <button><a href="/home">Home</a></button>
</body>
</html>