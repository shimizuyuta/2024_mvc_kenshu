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
            'description' => 'nullable|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        //画像ファイルの処理
        $imageName = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = $request->file('image')->store('images', 'public');
        }

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
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
            'description' => 'nullable|max:255',
            'image' => 'nullable|string',
        ]);
        
        $id = $request->id;
        $post = Post::findOrFail($id);
        //画像ファイルの処理
        $imageName = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = $request->file('image')->store('images', 'public');
        }
        $post->fill($request->all());
        
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * 特定の投稿を削除します。
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
