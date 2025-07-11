@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
    <div class="toppage-list">
        <button class="tab-button__recommend">おすすめ</button>
        <button class="tab-button__mylist">マイリスト</button>
    </div>

    <div class="product__contents">
        @foreach ($products as $product)
        <div class="product-contents"></div>
@endsection