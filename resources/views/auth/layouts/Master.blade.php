<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/starter-template.css" rel="stylesheet">
    <title>feedback @yield('title')</title>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">зарегистрироваться</a>
                    </li>
                @endguest
                @auth
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">зарегистрироваться</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
<br/>
<div class="py-4">
    <div class="content">
        <div class="justify-content-center">
            @yield('content')
        </div>
    </div>
</div>
</body>

</html>

