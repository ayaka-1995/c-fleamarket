@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile-container">
    <h2 class="profile-title">プロフィール設定</h2>

    </div>

    <form class="form" action="/mypage/profile"  method="post">
        @csrf

        <div class="profile-image">
            <div class="button_name">
                <button type="submit" class="image_btn">画像を選択する</button>
            </div>
        </div>
        {{-- -ユーザー名 --}}
        <div class="form_group">
            <label for="name" class="form_group-label">ユーザー名</label>
            <input type="text" name="name" class="form-control">
        </div>

        {{-- -郵便番号 --}}
        <div class="form_group">
            <label for="postal_code" class="form_group-label">郵便番号</label>
            <input type="text" name="postal_code" class="form-control">
        </div>

        {{-- -住所 --}}
        <div class="form_group">
            <label for="address" class="form_group-label">住所</label>
            <input type="text" name="address" class="form-control">
        </div>

        {{-- -建物名 --}}
        <div class="form_group">
            <label for="building" class="form_group-label">建物名</label>
            <input type="text" name="building" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">更新する</button>

    </form>
</div>
@endsection