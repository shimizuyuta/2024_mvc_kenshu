@extends('layout.app')

@section('title', '投稿修正')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="bg-white shadow-md border border-gray-200 rounded-lg mb-5">
        <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST" class="p-5">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    タイトル
                </label>
                <input name="title" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" value="{{ $post->title }}">
            </div>

            <!-- コンテンツの編集 -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                    コンテンツ
                </label>
                <textarea name="content" id="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="15">{{ $post->content }}</textarea>
            </div>

            <!-- Typeの選択 -->
            <div class="mb-4">
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">タイプ:</label>
                <select name="type" id="type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="本番環境" {{ $post->type == '本番環境' ? 'selected' : '' }}>本番環境</option>
                    <option value="開発環境" {{ $post->type == '開発環境' ? 'selected' : '' }}>開発環境</option>
                    <option value="デモ環境" {{ $post->type == 'デモ環境' ? 'selected' : '' }}>デモ環境</option>
                </select>
            </div>

            <!-- 更新ボタン -->
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
