@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="toppage-list">
        <button class="tab-button__recommend">おすすめ</button>
        <button class="tab-button__mylist">マイリスト</button>
    </div>

    <div class="item-grid">
        @foreach ($items as $item)
        <div class="item-cards">
            <a href="/item/{{ $item->id }}" class="item-link"><img src="{{ asset($item->image_url) }}" alt="商品画像" class="img-content" />
                <div class="items-name">
                    <p>{{ $item->name }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection