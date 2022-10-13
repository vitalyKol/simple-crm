
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-lg-2 left_menu">
            <h5 class="text-center left_menu_title">CRM</h5>
            <ul class="left_menu_list">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> Dashboard</a></li>
                <li><a href="{{route('users.index')}}"><i class="fa fa-user" aria-hidden="true"></i> Users</a></li>
                <li><a href="{{route('clients.index')}}"><i class="fa fa-address-card" aria-hidden="true"></i> Clients</a></li>
                <li><a href="{{route('projects.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i> Projects</a></li>
                <li><a href="{{route('tasks.index')}}"><i class="fa fa-tasks" aria-hidden="true"></i> Tasks</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-lg-10 right_block">
            <div class="top_line">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <div class="top_line_login">
                    @if (Route::has('login'))
                        @auth
                            <div>{{ Auth::user()->name }} : <a href="{{ route('logout') }}">Logout</a></div>
                        @else
                            <a href="{{ route('login') }}">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">| Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
            <div class="container content">
                <div class="row">
                    <div class="col">
                        @yield('content')
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
