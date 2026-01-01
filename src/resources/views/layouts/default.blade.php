<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- IE互換モード対策}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF対策用トークン（POST通信で使用）--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{--Font Awesome（アイコン用）--}}
    <script src="https://kit.fontawesome.com/42694f25bf.js" crossorigin="anonymous"></script>
    {{--郵便番号から住所自動入力(ajaxzip) --}}
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
    {{--トースト通知用css--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    @yield('css')
</head>

<body>
    @yield('content')
    {{--jQuery--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- トースト通知用JS--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- トーストの表示設定--}}
    <script>//Laravelのセッションのセッションがあれば、画面右下に成功メッセージを出す
        toastr.options = {
            "closeButton" : true,//×ボタンを表示
            "progressBar" : true,//時間バーを表示
            "positionClass" : "toast-bottom-right",//右下に表示
        }

        //もしSessionにflashSuccessがあったら、その内容を成功メッセージとしてトースト表示する（Blade と JavaScriptの合体技)
        @if(Session::has('flashSuccess'))
        toastr.success("{{ session('flashSuccess') }}");
        @endif
    </script>
</body>
</html>