<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coachtech</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__utilities">
                <a class="header__logo" href="/">
                    <img src={{ asset("img/logo.svg") }} alt="coachtech">
                </a>
                @if(Auth::check())
                <input class="search-bar" type="text" placeholder="なにをお探しですか？">

                <nav>
                    <ul class="header-nav">
                        
                        <li class="header-nav__item">
                            <form class="header__form" action="/logout" method="post">
                                @csrf
                                <button class="header-nav__button">ログアウト</button>
                            </form>
                        </li>
                        <li class="header-nav__item">
                                <button class="header-nav__button">マイページ</button>
                        </li>
                        <li class="header-nav__item">
                                <button class="header-nav__button">出品</button>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
    @yield('content')
</main>
</body>

</html>
