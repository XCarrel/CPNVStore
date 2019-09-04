<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            CPNVStore
        </div>
        <h1>Liste d'applications</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Utilisateurs</th>
                <th>Plateformes</th>
            </tr>
            @foreach ($apps as $app)
                <tr>
                    <td>{{ $app->name }}</td>
                    <td>{{ $app->category->name }}</td>
                    <td>
                        @foreach ($app->users as $user)
                            {{ $user->firstname }} {{ $user->lastname }},
                        @endforeach
                    </td>
                    <td>
                        @foreach ($app->platforms as $platform)
                            {{ $platform->name }} ({{ $platform->pivot->minversion }}),
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
        <h1>Liste d'utilisateurs</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Applications</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                    <td>
                        @foreach ($user->applications as $app)
                            {{ $app->name }},
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
        <h1>Liste de catégories</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Applications</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        @foreach ($category->applications as $app)
                            {{ $app->name }},
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>
