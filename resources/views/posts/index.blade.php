@extends('layout.app')

@section('title', '投稿一覧')

@section('content')
<div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <div class="max-w-lg w-96">
                <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5">
                    <div class="p-5">
                        <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 h-16 overflow-hidden">{{ $post->title }}</h5>
                        <!-- type ラベル表示 -->
                        <div class="mb-3">
                            <span class="inline-block px-3 py-1 text-sm font-semibold text-white rounded-full {{ $post->type == '本番環境' ? 'bg-green-500' : ($post->type == '開発環境' ? 'bg-blue-500' : 'bg-yellow-500') }}">
                                {{ $post->type }}
                            </span>
                        </div>
                        <p class="font-normal text-gray-700 mb-3 h-20 overflow-hidden">{{ $post->content }}</p>
                        <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center">
                            続きを読む
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if ($posts->isEmpty())
        <p>投稿がありません。</p>
    @endif
</div>
@endsection
