<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 投稿の一覧を表示します。
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * 新しい投稿を作成するフォームを表示します。
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * 新しく作成された投稿をDBに保存します。
     */
    public function store(Request $request)
    {
    }

    /**
     * 特定の投稿を表示します。
     */
    public function show(Request $request)
    {
        return view('posts.show');
    }

    /**
     * 特定の投稿を編集するフォームを表示します。
     */
    public function edit(Request $request)
    {
        return view('posts.edit');
    }

    /**
     * 特定の投稿を更新します。
     */
    public function update(Request $request)
    {
    }

    /**
     * 特定の投稿を削除します。
     */
    public function destroy(Request $request)
    {
    }
}
