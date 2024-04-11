<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Stylesheet -->
    @vite('resources/css/app.css')
</head>

<body class="">
    <header>
        <!-- 共通のヘッダー内容はここに記述 -->
        @include('layout.header')
    </header>

    <main class="h-85 flex-1 bg-blue-50 p-4 overflow-y-auto">
        <!-- メインコンテンツはここに表示されます -->
        <x-alert-message />
        @yield('content')
    </main>

    <footer>
        <!-- 共通のフッター内容はここに記述 -->
        @include('layout.footer')
    </footer>
</body>

</html>
