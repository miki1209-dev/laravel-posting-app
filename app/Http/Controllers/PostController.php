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
		return view('posts.index', compact('posts'));
	}

	// 投稿詳細ページ
	public function show(Post $post) //Post $post（ルートモデルバインディングという書き方らしい）
	{
		dump($post->id);
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
}
