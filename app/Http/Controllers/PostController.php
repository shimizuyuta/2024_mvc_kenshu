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
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * 新しい投稿を作成するフォームを表示します。
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * 新しく作成された投稿をストレージに保存します。
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable|max:255',
            'type' => 'required|in:本番環境,開発環境,デモ環境',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->description,
            'type' => $request->type
        ]);

        if ($post) {
            return redirect()->route('posts.index')->with('success', '投稿が正常に追加されました。');
        } else {
            return back()->with('error', '投稿の保存に失敗しました。')->withInput();
        }
    }

    /**
     * 特定の投稿を表示します。
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * 特定の投稿を編集するフォームを表示します。
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        return view('posts.edit',['post' => $post]);
    }

    /**
     * 特定の投稿を更新します。
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'nullable|max:255',
            'type' => 'required|in:本番環境,開発環境,デモ環境',
        ]);
        
        $id = $request->id;
        $post = Post::findOrFail($id);
        $post->fill($request->all());
        
        if($post->save()) {
            return redirect()->route('posts.index')->with('success', '投稿が正常に更新されました。');
        } else {
            return back()->with('error', '投稿の更新に失敗しました。')->withInput();
        }
    }

    /**
     * 特定の投稿を削除します。
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        if ($post->delete()) {
            return redirect()->route('posts.index')->with('success', '投稿が正常に削除されました。');
        } else {
            return back()->with('error', '投稿の削除に失敗しました。');
        }    
    }
}
