@extends('layout.app')

@section('title', '投稿作成')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="bg-white shadow-md border border-gray-200 rounded-lg mb-5">
        <form action="{{ route('posts.store') }}" method="POST" class="p-5">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    タイトル
                </label>
                <!-- ここでold()を使って前回の入力値を保持する -->
                <input name="title" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" value="{{ old('title') }}">
            </div>

            <!-- コンテンツの編集 -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                    コンテンツ
                </label>
                <textarea name="content" id="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="15">{{ old('content') }}</textarea>
            </div>

            <!-- Typeの選択 -->
            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">タイプ:</label>
                <select name="type" id="type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="本番環境" {{ old('type') == '本番環境' ? 'selected' : '' }}>本番環境</option>
                    <option value="開発環境" {{ old('type') == '開発環境' ? 'selected' : '' }}>開発環境</option>
                    <option value="デモ環境" {{ old('type') == 'デモ環境' ? 'selected' : '' }}>デモ環境</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    投稿する
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
