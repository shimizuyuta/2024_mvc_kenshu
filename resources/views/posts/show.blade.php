@extends('layout.app')

@section('title', '投稿詳細')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="bg-white shadow-md border border-gray-200 rounded-lg mb-5">
        <div class="p-5">
            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">{{ $post->title }}</h5>
            <div class="mb-3">
                <span class="inline-block px-3 py-1 text-sm font-semibold text-white rounded-full {{ $post->type == '本番環境' ? 'bg-green-500' : ($post->type == '開発環境' ? 'bg-blue-500' : 'bg-yellow-500') }}">
                    {{ $post->type }}
                </span>
            </div>
            <p class="font-normal text-gray-700 mb-3">{{ $post->content }}</p>
            <a href="{{ route('posts.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2">
                一覧に戻る
            </a>
            <a href="{{ route('posts.edit', $post->id) }}" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                編集する
            </a>
        </div>
    </div>
</div>
@endsection
