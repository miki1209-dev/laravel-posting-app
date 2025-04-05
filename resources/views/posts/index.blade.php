<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>投稿一覧</title>
</head>

<body>
	<x-header />
	<main>
		<h1>投稿一覧</h1>
		@if (session('flash_message'))
			<p>{{ session('flash_message') }}</p>
		@endif

		<a href="{{ route('posts.create') }}">新規投稿</a>

		@if ($posts->isNotEmpty())
			@foreach ($posts as $post)
				<article>
					<h2>{{ $post->title }}</h2>
					<p>{{ $post->content }}</p>
					<a href="{{ route('posts.show', $post) }}">詳細</a>
				</article>
			@endforeach
		@else
			<p>投稿がありません</p>
		@endif
	</main>
	<x-footer />
</body>

</html>
