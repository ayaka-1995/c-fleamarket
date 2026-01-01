<header class="header">
    <div class="header__logo">
        {{--ロゴを表示し、クリックするとトップページ(/)へ戻る--}}
        <a href="/"><img src="{{ asset('img/logo.svg') }}" alt="ロゴ"></a>
    </div>
    {{--今表示しているページが「会員登録・ログイン・メール認証画面」じゃない場合だけ、以下の表示をする--}}
    @if( !in_array(Route::currentRouteName(), ['register', 'login', 'verification.notice']) )
    <form class="header_search" action="/" method="get">
        @csrf
        {{--ItemController@index の $request->query('search')とつながる--}}
        <input id="inputElement" class="header_search--input" type="text" name="search" placeholder="なにをお探しですか？">
        <button id="buttonElement" class="header_search--button">
            <img src="{{ asset('img/search_icon.jpeg') }}" alt="検索アイコン" style="height:100%;">
        </button>
    </form>
    <nav class="header__nav">
        <ul>
            @if(Auth::check()){{--ログインしているか？の判定--}}
            {{--ログインの場合--}}
            <li>
                {{--ログアウト処理--}}
                <form action="/logout" method="post">
                    @csrf
                    <button class="header__logout">ログアウト</button>
                </form>
            </li>
            {{--マイページへのリンク--}}
            <li><a href="/mypage">マイページ</a></li>
            @else{{--未ログインの場合--}}
            {{--ログイン・会員登録への導線--}}
            <li><a href="/login">ログイン</a></li>
            <li><a href="/register">会員登録</a></li>
            @endif
            {{--商品出品ページへのリンク--}}
            <a href="/sell">
                <li class="header__btn">出品</li>
            </a>
        </ul>
    </nav>
    @endif
</header>