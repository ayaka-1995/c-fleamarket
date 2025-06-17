@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
    <div class="toppage-list">
        <button class="tab-button__recommend">おすすめ</button>
        <button class="tab-button__mylist">マイリスト</button>
    </div>

    <div class="product__row">
        <div class="product-item">
            <div class="product-image">商品画像</div>
            <div class="product-name">商品名</div>
        </div>
    
        <div class="product-item">
            <div class="product-image">商品画像</div>
            <div class="product-name">商品名</div>
        </div>
    
        <div class="product-item">
            <div class="product-image">商品画像</div>
            <div class="product-name">商品名</div>
        </div>
    
        <div class="product-item">
            <div class="product-image">商品画像</div>
            <div class="product-name">商品名</div>
        </div>
    </div>
    <div class="product__row">
        <div class="product-item">
            <div class="product-image">商品画像</div>
            <div class="product-name">商品名</div>
        </div>

        <div class="product-item">
            <div class="product-image">商品画像</div>
            <div class="product-name">商品名</div>
        </div>

        <div class="product-item">
            <div class="product-image">商品画像</div>
            <div class="product-name">商品名</div>
        </div>
    </div>
@endsection