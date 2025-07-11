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

        <div class="profile-image_wrapper">
            <div class="profile-image">
            <input type="file" name="profile_image" accept="image/*" style="display:none;">
        </div>

        <div class="label_name">
            <label class="select-image__button" for="profile_image">画像を選択する</label>
        </div>
        </div>

        {{-- -ユーザー名 --}}
        <div class="form__group-contents">
            <div class="form__group-title">
                <span class="form__label-item">ユーザー名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <input type="text" name="name" value="{{ old('name') }}" />
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        {{-- -郵便番号 --}}
        <div class="form__group-contents">
            <div class="form__group-title">
                <span class="form__label-item">郵便番号</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <input type="text" name="postal_code" value="{{ old('postal_code') }}">
                </div>
                <div class="form__error">
                    @error('postal_code')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        {{-- -住所 --}}
        <div class="form__group-contents">
            <div class="form__group-title">
                <span class="form__label-item">住所</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <input type="text" name="address" value="{{ old('address') }}">
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        {{-- -建物名 --}}
        <div class="form__group-contents">
            <div class="form__group-title">
                <span class="form__label-item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-text">
                    <input type="text" name="building" value="{{ old('building') }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn-primary">更新する</button>

    </form>
</div>
@endsection