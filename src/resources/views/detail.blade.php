@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
@endsection

@section('content')
<div class="all-contents">
    <form action="/purchase/{item->id}" method="POST">
        @csrf
        <div class="row">
            <div class="left-contents">
                <div class="items-image">
                    <img src="{{ asset($item->image_url) }}" alt="商品画像">
                </div>
            </div>

        <div class="right-contents">
            <div class="item-info">
                <h2 class="item-name">{{ $item->name }}</h2>
                <p class="item-price">¥{{ $item->price}} <span class="tax-included">(税込)</span></p>
                <button class="favorite-button" data-favorited="false">
                    <span class="star-icon">&#9733;</span>
                </button>
                <div class="fukidashi"></div>

                <div class="purchase-button-wrapper">
                    <button type="submit" class="purchase-button">購入手続きへ</button>
                </div>
            </div>

                <div class="item-info">
                    <h3 class="item-description">商品説明</h3>
                    <p class="description">{{ $item->description}}</p>
                </div>

                <div class="item-info">
                    <h3 class="info">商品の情報</h3>
                    <p class="category">カテゴリー</p>
                    
                    <p class="condition">コンディション</p>
                    <p class="condition">{{ $item->condition}}</p>
                </div>
    </form>

    <div class="item-info">
        <div class="comment-section">
            <h3 class="comment">コメント({{count($item->comments)}})</h3>

            @foreach($item->comments as $comment)
            <div class="comment-box">
                <div class="user-info">
                    <img src="{{ asset('images/user-icon.png') }}" alt="アイコン" class="user-icon">
                    <strong>{{ $comment->user->name}}</strong>
                </div>
                <div class="comment-content">
                    {{$comment->comment}}
                </div>
            </div>
            @endforeach
        </div>
                        
        <div class="comment-form">
            <h4 class="item-comment">商品コメント</h4>

            <form class="form" action="/item/{{ $item->id}}" method="post">
                @csrf
                <textarea name="body" class="comment-textarea" rows="4" placeholder="ここにコメントを入力してください"></textarea>
                <button type="submit" class="comment-submit-button">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>
@endsection