@extends('layouts.default')

@section('title', '商品詳細ページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

@include('components.header')
<div class="container">
    <div class="item">
        @if($item->sold())
        <div class="item__img sold">
            <img src="{{ \Storage::url($item->img_url) }}" alt="商品画像">
        </div>
        @else
        <div class="item__img">
            <img src="{{ \Storage::url($item->img_url) }}" alt="商品画像">
        </div>
        @endif
        <div class="item__info" id="scroll__item__info">
            <h2 class="item__name">{{ $item->name}}</h2>
            <p class="item__price">¥{{ number_format($item->price)}}</p>
            <div class="item__form">
                <form action="{{ $item->liked() ? '/item/unlike/'. $item->id : '/item/like/' . $item->id }}"  method="post" class="item_like" id="like__form">
                    @csrf
                    <button><i class="fa-2xl fa-heart {{ $item->liked() ? 'fa-sharp fa-solid' : 'fa-regular' }}"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection