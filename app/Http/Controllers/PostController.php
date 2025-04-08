<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
	// 投稿一覧ページ
	public function index()
	{
		$posts = Auth::user()->posts()->orderBy('created_at', 'desc')->get();
		// $posts = Post::orderBy('created_at', 'desc')->get();
		return view('posts.index', compact('posts'));
	}

	// 投稿詳細ページ
	public function show(Post $post) //Post $post（ルートモデルバインディングという書き方らしい）
	{
		return view('posts.show', compact('post'));
	}

	// 投稿作成ページ
	public function create()
	{
		return view('posts.create');
	}

	// 投稿作成機能
	public function store(PostRequest $request)
	{
		$post = new Post();
		$post->title = $request->input('title');
		$post->content = $request->input('content');
		$post->user_id = Auth::id();
		$post->save();

		return redirect()->route('posts.index')->with('flash_message', '投稿が完了しました。');
	}

	//投稿編集ページ
	public function edit(Post $post)
	{
		// dump($post);
		// dump($post->user_id);
		// dump(Auth::id());
		if ($post->user_id !== Auth::id()) {
			return redirect()->route('posts.index')->with('error_message', '不正なアクセスです');
		}

		return view('posts.edit', compact('post'));
	}

	//投稿更新機能
	public function update(PostRequest $request, Post $post)
	{
		// dd($request);
		// dd($post->id);
		// dd($post->user_id);
		if ($post->user_id !== Auth::id()) {
			return redirect()->route('posts.index')->with('error_message', '不正なアクセスです');
		}

		$post->title = $request->input('title');
		$post->content = $request->input('content');
		$post->save();

		return redirect()->route('posts.show', $post->id)->with('flash_message', '投稿を編集しました');
	}

	//投稿削除機能
	public function destroy(Post $post)
	{
		if ($post->user_id !== Auth::id()) {
			return redirect()->route('posts.index')->with('error_message', '不正なアクセスです');
		}
		$post->delete();

		return redirect()->route('posts.index')->with('flash_message', '投稿を削除しました');
	}
}
