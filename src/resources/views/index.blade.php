@extends('layouts.default')

@section('title', 'トップページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

@include('components.header')

{{-- ItemController@index / search から渡されたから商品一覧を表示する画面 --}}
    <div class="border">
        <ul class="border__list">
            {{-- おすすめ商品タブ（検索ワードがあれば保持）--}}
            <li><a href="{{ route('items.list', ['tab' => 'recommend', 'search'=>$search ?? '']) }}">おすすめ</a></li>
            {{-- ログイン時のみマイリストタブを表示 --}}
            @if(!auth()->guest())
            <li><a href="{{ route('items.list', ['tab' => 'mylist', 'search'=>$search ?? '']) }}">マイリスト</a></li>
            @endif
        </ul>
    </div>

    <div class="container">
        <div class="items">
            {{--$itemsに入っている商品データを1件ずつ$itemとして取り出す--}}
            @foreach ($items as $item)
            <div class="item">
                {{--商品詳細ページへのリンク、/item/商品IDに遷移する--}}
                <a href="/item/{{$item->id}}">
                    {{-- 売却済みかどうかで表示を分岐 --}}
                    @if($item->sold())
                    <div class="item__img--container sold">{{--売却済み商品の画像用コンテナ--}}
                        <img src="{{ asset($item->img_url) }}" class="item__img" alt="商品画像">
                    </div>
                    @else
                    <div class="item__img--container">{{--通常商品の画像用コンテナ--}}
                        <img src="{{ asset($item->img_url) }}" class="item__img" alt="商品画像">
                    </div>
                    @endif
                    {{--商品名を表示--}}
                    <p class="item__name">{{ $item->name}}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection