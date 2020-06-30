<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Styles -->
    <style>
        html,
        body {
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

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        img {
            width: 400px;
            height: 300px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Get Home Cooked!</title>
</head>

<body>
    <div class="flex-center position-ref full-height bg-btn-green">
        <div class="content">
            <div class="title m-b-md mx-auto flex items-center justify-center">
                <img src="/images/logo.svg" alt="logo">
            </div>

            <div class="font-oxygen text-white text-3xl flex justify-around font-bold">
                @auth
                <a href="{{ url('/stores') }}" class="border-b-4 border-transparent hover:border-white hover:border-double">Go to Stores</a>
                @else
                <a href="{{ route('login') }}" class="border-b-4 border-transparent hover:border-white hover:border-double">Login</a>
                <a href="{{ route('register') }}" class="border-b-4 border-transparent hover:border-white hover:border-double">Register</a>
                @endauth
            </div>
        </div>
    </div>
</body>

</html>