@extends('layouts.default')

<!--タイトル-->
@section('title', 'マイページ')

<!--css読み込み-->
@section('css')
<link rel="stylesheet" href="{{ asset('/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('/css/mypage') }}">
@endsection

<!--本体-->
@section('content')

@include('components.header')