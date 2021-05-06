<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SampleQ/A') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="home-screen">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link class="navbar-brand" :to="{ name: 'home' }">Sample Q/A</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            <router-link class="nav-item" tag="li" :to="{ name: 'questions' }"><a class="nav-link">質問一覧</a></router-link>
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a></li>
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <transition name="fade" mode="out-in">
                <router-view></router-view>
            </transition>
        </main>
    </div>

    <!-- Scripts -->
    <script>
        // jsonブレードディレクティブでjson形式データが入ったデータの呼び出し
        window.Auth = @json([     // Authファザード
            'signedIn' => Auth::check(),  // ログインしているか判定
            'user' => Auth::user(),  // ログイン中のユーザー情報
        ]);
        window.Urls = @json([
            'api' => url('/api'),
            'login' => route('login')   // index.jsでログインが必要なページはログインページへ
        ]);
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>